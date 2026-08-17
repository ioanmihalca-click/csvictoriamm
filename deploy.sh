#!/usr/bin/env bash
#
# Deploy pe Hostinger (shared, SSH). Rulează PE SERVER, din rădăcina aplicației:
#   cd ~/domains/csvictoriamm.ro/public_html && ./deploy.sh
#
# Prima instalare (o singură dată, manual): clonează repo-ul direct în
# public_html, `cp .env.example .env` și completează (APP_ENV=production,
# APP_DEBUG=false, APP_URL=https://csvictoriamm.ro, DB_* din hPanel,
# QUEUE_CONNECTION=sync, MARKDOWN_RESPONSE_ENABLED=true),
# `php artisan key:generate`, apoi `./deploy.sh`. Pe DB gol, tot o singură dată:
#   php artisan db:seed --force        # conținut demo
#   php artisan make:filament-user     # userul de admin
# Parola se tastează interactiv — nu stă în niciun fișier.

set -Eeuo pipefail
cd "$(dirname "$0")"

PHP="${PHP_BIN:-/opt/alt/php84/usr/bin/php}"
[ -x "$PHP" ] || PHP=php
COMPOSER="$(command -v composer2 || command -v composer)"

# fetch + reset, nu pull: copia de pe server e doar de deploy — orice modificare
# locală a fișierelor urmărite (ex. package-lock.json rescris de un npm install
# rulat manual) se aruncă, altfel npm ci pică pe lock desincronizat
git fetch origin main

# Codul nou rulează pe schema veche între `reset` și `migrate` (conținutul
# editorial vine din tabele care poate nu există încă) → mentenanță pe durata
# deploy-ului. Trap-ul e obligatoriu: cu `set -e`, o eroare la build ar lăsa
# altfel site-ul blocat în mentenanță.
trap '"$PHP" artisan up >/dev/null 2>&1 || true' EXIT
"$PHP" artisan down --render=errors::503 --retry=30 || true

git reset --hard origin/main

# vite 8 cere Node ^20.19 || >=22.12; sub aceste versiuni npm sare în tăcere
# peste binding-urile native opționale (rolldown) și build-ul crapă criptic
node -e 'const [M,m]=process.versions.node.split(".").map(Number); process.exit(M>22||(M===22&&m>=12)||(M===20&&m>=19)?0:1)' \
    || { echo "Node $(node -v) e prea vechi pentru vite 8 (cere ^20.19 sau >=22.12)."; exit 1; }

"$PHP" "$COMPOSER" install --no-dev --optimize-autoloader --no-interaction --no-progress

# CloudLinux (LVE) limitează thread-urile per cont; rolldown/rayon ar porni
# câte un thread per core al gazdei și moare cu EAGAIN („Resource temporarily
# unavailable") — plafonăm explicit
export RAYON_NUM_THREADS=2 TOKIO_WORKER_THREADS=2 UV_THREADPOOL_SIZE=2

npm ci --no-audit --no-fund
npm run build
rm -f public/hot # rămas din dev, ar trimite browserul la serverul Vite

"$PHP" artisan migrate --force

# `artisan storage:link` pică pe Hostinger: symlink() ȘI exec() sunt în
# disable_functions, iar PHP 8 scoate funcțiile dezactivate din tabela de funcții
# → fatal „Call to undefined function exec()" (Filesystem::link, fallback-ul cu `ln -s`).
# Din shell nu există restricția, deci facem legătura noi. E relativă, ca să nu depindă
# de calea absolută a contului, și supraviețuiește la `git reset` (public/storage e neurmărit).
if [ -L public/storage ]; then
    : # există deja
elif [ -e public/storage ]; then
    echo "public/storage există și NU e symlink — verifică manual înainte de deploy." >&2
    exit 1
else
    ln -s ../storage/app/public public/storage
fi

"$PHP" artisan optimize:clear
"$PHP" artisan optimize
"$PHP" artisan markdown-response:clear || true

"$PHP" artisan up

echo "Gata. Verifica: / · /blog · /admin · /robots.txt · /sitemap.xml"
