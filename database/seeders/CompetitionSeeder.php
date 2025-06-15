<?php

namespace Database\Seeders;

use App\Models\Competition;
use Illuminate\Database\Seeder;

class CompetitionSeeder extends Seeder
{
    public function run(): void
    {
        $competitions = [
            [
                'title' => 'AMC 4 Baia Mare',
                'location' => 'Baia Mare',
                'date' => '2025-05-24',
                'description' => 'Sportivii de la Club Sportiv Victoria Maramureș au demonstrat încă o dată o bună pregătire în kickboxing! Echipa noastră a participat la competiția AMC 4, organizată la Baia Mare de maestrul Kenzo Ionuț de la ALPHA Mixed Martial Arts Academy Baia Mare.',
                'results' => '<h4>Rezultatele obținute:</h4><ul><li><strong>K1:</strong><ul><li>Alexandru Tăut - Medalie de Aur</li><li>Sergiu Ciotos - Medalie de Argint</li><li>Luis Pintea - Medalie de Aur</li></ul></li><li><strong>K1 Light Contact:</strong><ul><li>Timeea Benzar - Medalie de Aur</li><li>Vladimyr Benzar - Medalie de Aur (2 meciuri)</li><li>Zon Kristina - Medalie de Aur</li><li>Darius Boros - Medalie de Aur</li><li>Iosif Dana - Medalie de Aur</li><li>David Stenczel - Medalie de Aur</li><li>Nemzet Alexandru - Medalie de Aur</li></ul></li></ul>',
                'image_url' => 'https://csvictoriamm.ro/storage/blog-images/01JW3F783HE2R90YRCX4S68TM2.jpg',
                'details_url' => 'https://csvictoriamm.ro/blog/victoria-maramures-la-competitia-amc-4-baia-mare',
                'is_active' => true,
                'order' => 1
            ],
            [
                'title' => 'Campionatul National de Freestyle Kickboxing',
                'location' => 'Brazii de Sus, Ploiesti',
                'date' => '2025-02-22',
                'description' => 'Am participat la prima competiție din acest an, Campionatul Național de Freestyle Kickboxing desfășurată lângă Ploiești, în localitatea Brazii de Sus. Competiția a fost organizată de către Federația de Freestyle Kickboxing, condusă de dl. președinte Adrian Dejanu.',
                'results' => '<h4>Rezultatele noastre:</h4><ul><li><strong>2 Medalii de Aur:</strong> Kristina Zon (K1 LIGHT, 13-14 ANI, FETE, -70 KG), Sergiu-Ioan Ciontoș (K1 Light 13-14 ANI, BĂIEȚI, -65 KG)</li><li><strong>8 Medalii de Argint:</strong> Timeea Benzar, Alexandru Tăut, Vladimyr Benzar, Sergiu-Ioan Ciontoș, Ramona Rozovlean, Kristina Zon, Daria Curac, Rafael Ember</li></ul>',
                'notes' => 'Un rezultat remarcabil a fost obținut de Sergiu-Ioan Ciontoș, care deși cântărește 45 kg, a concurat cu succes la categorii superioare de greutate, demonstrând că tehnica este mai importantă decât greutatea.',
                'image_url' => 'https://csvictoriamm.ro/storage/blog-images/01JMS7WC2DK2F3ZBWAF0P50TED.jpg',
                'details_url' => 'https://csvictoriamm.ro/blog/cs-victoria-maramures-2-medalii-de-aur-si-8-de-argint-la-campionatul-national-de-freestyle-kickboxing',
                'is_active' => true,
                'order' => 2
            ],
            [
                'title' => 'Cupa Maramureșului de Kickboxing',
                'location' => 'Baia Mare',
                'date' => '2024-11-09',
                'description' => 'Clubul Sportiv Victoria Maramureș a participat la "Cupa Maramureșului", organizată la Baia Mare de maestrul Oliver Polgar și ACS Kickboxing Baia Mare. Lotul nostru, format din 17 sportivi, a concurat în probele de Kick Light și K1.',
                'results' => '<h4>Rezultatele obținute:</h4><ul><li>Kick Light: 13 medalii de aur</li><li>Super Fight (K1): 1 medalie de aur, 2 de argint</li><li>"Centura Maramureșului" (K1): Vicecampion, Sergiu Ioan Ciontoș</li></ul>',
                'team_composition' => '<h4>Componența echipei:</h4><ul><li><strong>Echipa Kick Light:</strong> Timeea Benzar, Emanuela Recalo, Ramona Rozovlean, Kristina Zon, Darius Boroș, Curac Daria, Elena Scopeti, Alexandru Aldea, Anton Corjuc, Dumitru Iurcia, Marcu Pava, Alexandru Nemzet și Eric Balasz.</li><li><strong>Super Fight K1:</strong> Alexandru Tăut, Vladimyr Benzar și Rafael Ember.</li></ul>',
                'notes' => 'Suntem mândri de performanța lui Sergiu Ioan Ciontoș, care a luptat cu înverșunare într-o piramidă de 8 sportivi în cadrul competiției "Centura Maramureșului", reușind să câștige două meciuri împotriva unor adversari foarte bine pregătiți.',
                'image_url' => 'https://csvictoriamm.ro/storage/blog-images/01JC9ANFSXHF86H3CTG5WYMW4W.jpg',
                'details_url' => 'https://csvictoriamm.ro/blog/cs-victoria-maramures-a-participat-la-cupa-maramuresului-de-kickboxing',
                'is_active' => true,
                'order' => 3
            ],
            [
                'title' => 'Cupa României 2024',
                'location' => 'Cornu, Prahova',
                'date' => '2024-10-12',
                'description' => 'Am participat la Cupa României, organizată de Federația Română de Freestyle Kickboxing și Muay Boran (www.frfk.ro), eveniment la care au participat aproximativ 45 de cluburi și 400 de sportivi.',
                'results' => '<h4>Rezultatele noastre:</h4><ul><li><strong>Timeea Benzar:</strong><ul><li>Aur - K1, 9-10 ani, Fete, -35 Kg</li><li>Aur - K1 Light, 9-10 ani, Fete, -30 Kg</li></ul></li><li>Alex Taut și Vladimyr Benzar - Aur (ex-aequo) - K1, 11-12 ani, Băieți, -35 Kg</li><li>Sergiu-Ioan Ciontos - Aur - K1 Light, 11-12 ani, Băieți, -45 Kg</li><li>Ramona Rozovlean - Bronz - K1 Light, 12-14 ani, Fete, -60 Kg</li><li>Daria Curac - Argint - K1 Light, 15-16 ani, Fete, -55 Kg</li><li>Rafael Ember - Argint - K1, 15-16 ani, Băieți, -80 Kg</li></ul>',
                'notes' => 'Notă specială: Alex Taut și Vladimyr Benzar au ajuns amândoi în Finală la categoria lor, dar din dovadă de prietenie și respect reciproc nu au luptat. Îi considerăm pe amândoi campionii acestei categorii.',
                'image_url' => 'https://res.cloudinary.com/dadjiwkkf/image/upload/v1728897518/IMG_20241012_173626_yl79yr.webp',
                'details_url' => 'https://csvictoriamm.ro/blog/cs-victoria-maramures-la-cupa-romaniei-4-medalii-de-aur-3-de-argint-si-1-de-bronz-la-freestyle-kickboxing',
                'is_active' => true,
                'order' => 4
            ],
            [
                'title' => 'GRAND PRIX JUDGEMENT DAY 2024',
                'location' => 'Brasov',
                'date' => '2024-06-22',
                'description' => 'Am participat la competitia GRAND PRIX JUDGEMENT DAY 2024 organizata de Federatia Romana de Freestyle Kickboxing si Muay Boran. O competitie puternica si foarte bine organizata.',
                'results' => '<h4>Rezultatele noastre:</h4><ul><li>Timeea Benzar - argint K1 Light, 9-10 ani, fete, -30 Kg</li><li>Alexandru Taut - Aur K1, 9-10 ani, baieti -35 Kg</li><li>Vladimyr Benzar - Bronz K1, 11-12 ani, baieti -35 KG</li><li>Sergiu Ioan Ciontos - Aur K1 Light, 11-12 ani, baieti -40 Kg</li><li>Ramona Rozovlean - Argint K1 Light, 13-14 ani, fete -60 Kg</li><li>Daria Curac - Argint K1 Light, 15-16 ani, fete -55Kg</li><li>Anton Corjuc - Argint K1 Light, 15-16 ani, baieti -50 Kg</li><li>Alexandru Nemzet - Argint K1 Light, 15-16 ani, baieti -75 KG</li></ul>',
                'image_url' => 'https://res.cloudinary.com/dadjiwkkf/image/upload/v1727118170/tkdoe7k7qe3gzuveohim.jpg',
                'details_url' => 'https://www.facebook.com/victoriamaramures/posts/pfbid026VHiNW77MwxZWj4TuZKcBvAx9uVeTQ8XDZVKzYyBzVAq3qDecmtnzqxTRDFzqc6ol',
                'is_active' => true,
                'order' => 5
            ],
            [
                'title' => 'Campionatul National de Freestyle Kickboxing',
                'location' => 'Brazi, Prahova',
                'date' => '2024-03-16',
                'description' => 'Am participat la Campionatul National de Freestyle Kickboxing, organizat de Federatia Romana de Freestyle Kickboxing. Evenimentul a adunat aproximativ 500 de sportivi.',
                'results' => '<h4>Rezultatele noastre:</h4><ul><li>3 Medalii de Aur: Timeea Benzar, Giorgio Curac, Alexandru Nemzet</li><li>2 medalii de Argint: Sergiu-Ioan Ciontos, Alexandru Szalontai</li><li>3 medalii de Bronz: Alexandru Tăut, Vladimyr Benzar, Anton Corjuc</li></ul>',
                'image_url' => 'https://res.cloudinary.com/dadjiwkkf/image/upload/w_1000,ar_16:9,c_fill,g_auto,e_sharpen/v1726501543/fex8gc7loqckv6cjjmsy.jpg',
                'details_url' => 'https://www.facebook.com/victoriamaramures/posts/pfbid05igLGKFssUGAgFXpbh6EGG4ugHKfTZKRZ3xY113LpydLt8MRBP5ZFazJmhRdHSXpl',
                'is_active' => true,
                'order' => 6
            ],
            [
                'title' => 'GRAND PRIX JUDGEMENT DAY',
                'location' => 'Ploiesti',
                'date' => '2023-11-19',
                'description' => 'Am participat la competiția internațională GRAND PRIX JUDGEMENT DAY cu un lot format din 5 sportivi.',
                'results' => '<h4>Rezultatele noastre:</h4><ul><li>Timeea Benzar: Aur la proba K1 Light -30kg 9-10 ani, Argint la proba Kick Light -30 kg 9-10 ani</li><li>Alexandru Tăut: Aur la proba K1 - 30kg 9-10 ani</li><li>Vladimyr Benzar: Argint la proba K1 -35kg 11-12 ani</li><li>Sergiu-Ioan Ciontoș: Bronz la proba K1Light -45kg 11-12 ani</li><li>Anton Corjuc: Argint la proba K1 - 50kg 15-16 ani</li></ul>',
                'image_url' => 'https://res.cloudinary.com/dadjiwkkf/image/upload_v1726501474/nk1hkid9zco5rcdbjsfj.jpg',
                'details_url' => 'https://www.facebook.com/victoriamaramures/posts/pfbid026doBnLmMRTtpWL2sbi2Jwx39Goo4GkaMnnsNzZRPz6uksB6PW3jdXSMTqpWPPkPfl',
                'is_active' => true,
                'order' => 7
            ],
            [
                'title' => 'Cupa Maramuresului',
                'location' => 'Baia Mare',
                'date' => '2023-11-11',
                'description' => 'Am participat la Cupa Maramureșului, organizata la Baia Mare de dnul Polgar Oliver Polgar (ACS Kickbox). Felicitari sportivilor nostri pentru meciurile foarte bune!',
                'notes' => 'Mulțumim părinților pentru toată susținerea acordată, mulțumim dnului primar Alexa Fircan si primariei Poienile de sub Munte pentru ca ne sustine inca de la început, mulțumim primariei Petrova pt ca ne pune la dispozitie sala de antrenament.',
                'image_url' => 'https://res.cloudinary.com/dadjiwkkf/image/upload_v1727117904/401616708_334424075864842_4310761090375986039_n_qxj1fi.webp',
                'details_url' => 'https://www.facebook.com/victoriamaramures/posts/pfbid0v524sAwvLfCiRyJZTKN6EW2hZ7AJEUxERtwDYQyGinUqJzQ1eAL9mbez4MrRKWPtl',
                'is_active' => true,
                'order' => 8
            ],
            [
                'title' => 'CUPA ROMANIEI DE FREESTYLE KICKBOXING',
                'location' => 'Ploiesti',
                'date' => '2023-10-14',
                'description' => 'Am participat la CUPA ROMANIEI DE FREESTYLE KICKBOXING cu un lot format din 5 sportivi.',
                'results' => '<h4>Rezultatele noastre:</h4><ul><li>Alexandru Tăut: Cupa Romaniei de Freestyle Kickboxing, proba K1 -30kg 9-10 ani</li><li>Timeea Benzar: Argint la proba K1 Light -25kg 9-10 ani, Argint la proba Kick Light -25 kg 9-10 ani</li><li>Vladimyr Benzar: Argint la proba K1 -35kg 11-12 ani</li><li>Sergiu-Ioan Ciontoș: Argint la proba K1Light -45kg 11-12 ani</li><li>Anton Corjuc: Bronz la proba K1 - 55kg 15-16 ani</li></ul>',
                'image_url' => 'https://res.cloudinary.com/dadjiwkkf/image/upload_v1726502140/qn0b4shpiakxagfmcahx.jpg',
                'details_url' => 'https://www.facebook.com/victoriamaramures/posts/pfbid041T4Eqoun2fp51jbzz5PdZhy27ZnVJtGQhd5S3Utqv2FJwcsfaD1GqJrPR3PYYjQl',
                'is_active' => true,
                'order' => 9
            ],
            [
                'title' => 'Campionatul National de Freestyle Kickboxing K1',
                'location' => 'Alba Iulia',
                'date' => '2023-04-30',
                'description' => 'Am participat la Campionatul National de Freestyle Kickboxing K1 (probe de ring) cu un lot format din cinci sportivi. Am intalnit luptatori cu experienta, foarte bine pregatiti.',
                'results' => '<h4>Rezultatele noastre:</h4><ul><li>Anton Corjuc - vicecampion national (15-16 ani, baieti -50 kg)</li><li>Alexandru Tăut - medalie de bronz (8-9 ani, baieti -30 kg)</li></ul>',
                'notes' => 'Suntem un club tânăr, in formare, iar această competitie ne-a adus un plus de experiență.',
                'image_url' => 'https://res.cloudinary.com/dadjiwkkf/image/upload_v1727117658/343929636_647152483915278_2981896038198312159_n_i31wad.webp',
                'details_url' => 'https://www.facebook.com/victoriamaramures/posts/pfbid02H7Yw6Bs9oDLTojpCDhXp5FNmCC6Y6S8eVKXWBDgM4no1cgdqaph7zt6EKioo2ad4l',
                'is_active' => true,
                'order' => 10
            ],
            [
                'title' => 'Campionatul National de Freestyle Kickboxing - Probe de Tatami',
                'location' => 'Ploiesti',
                'date' => '2023-03-11',
                'description' => 'Am participat cu 5 sportivi. Am obtinut următoarele rezultate în cea mai disputată proba de tatami - Freestyle K1 Light:',
                'results' => '<h4>Rezultatele noastre:</h4><ul><li>Timeea Benzar - aur</li><li>Tăut Alexandru - bronz</li><li>Vladimyr Benzar - argint</li><li>Ciontoş Sergiu-Ioan - argint</li><li>Anton Corjuc - argint</li></ul>',
                'notes' => 'Sportivii nostri au facut meciuri foarte frumoase, unele din ele în fața unor adversari mult mai experimentați. Felicitări, ați dat dovadă de toate calitățile pe care trebuie sa le aiba un sportiv de performanță in acest sport de contact. Drumul nostru este abia la început.',
                'image_url' => 'https://res.cloudinary.com/dadjiwkkf/image/upload_v1727117545/335007122_6067910739930979_3187511036522481575_n_bwmcnu.webp',
                'details_url' => 'https://www.facebook.com/victoriamaramures/posts/pfbid02pzoi7xnusxfHUki7qTaqWyUcvi4MhHNPKdS616mD38q7NeqJTySJ3ghPscRaFH2Dl',
                'is_active' => true,
                'order' => 11
            ],
            [
                'title' => 'Cupa Maramuresului',
                'location' => 'Baia Mare',
                'date' => '2022-11-12',
                'description' => 'Am participat la "Cupa Maramuresului" organizata la Baia-Mare de dnul Oliver Polgar (ACS Kickbox) si Alexandru Stan (Fit Expert Baia-Mare).',
                'notes' => 'Felicitari si respect tuturor sportivilor participanti! Felicitari sportivilor nostri pentru curaj si determinare!',
                'image_url' => 'https://res.cloudinary.com/dadjiwkkf/image/upload_v1726502566/z0qnzc4mcmkmez560i4t.webp',
                'details_url' => 'https://www.facebook.com/victoriamaramures/posts/pfbid02u49t4iFEX1SWFf4jZhjvvaKtJqaa3P2Zw8edQmBZTyeFvAg7T6dPeW357mersuyQl',
                'is_active' => true,
                'order' => 12
            ]
        ];

        foreach ($competitions as $competition) {
            Competition::create($competition);
        }
    }
}
