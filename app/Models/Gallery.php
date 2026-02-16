<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = ['photo_url', 'alt_text'];

    protected static function booted(): void
    {
        static::updating(function (Gallery $gallery) {
            if ($gallery->isDirty('photo_url') && $gallery->getOriginal('photo_url')) {
                $oldPath = $gallery->getOriginal('photo_url');
                if ($oldPath && Storage::disk('public')->exists($oldPath)) {
                    Storage::disk('public')->delete($oldPath);
                }
            }
        });

        static::deleting(function (Gallery $gallery) {
            if ($gallery->photo_url && Storage::disk('public')->exists($gallery->photo_url)) {
                Storage::disk('public')->delete($gallery->photo_url);
            }
        });
    }

    /**
     * Accessor pentru URL imagine - returnează URL complet pe site, path relativ în admin
     */
    public function getPhotoUrlAttribute(?string $value): ?string
    {
        if (! $value) {
            return null;
        }

        if (request()->is('admin/*') === false) {
            if (str_starts_with($value, 'http')) {
                return $value;
            }

            return config('app.url').'/storage/'.$value;
        }

        return $value;
    }
}
