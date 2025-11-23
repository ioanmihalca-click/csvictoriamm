<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class PerformanceAthlete extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'photo_url',
        'background_color',
        'is_active',
        'order',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    /**
     * Boot method pentru a gestiona clean-up-ul fișierelor
     */
    protected static function booted(): void
    {
        // Șterge imaginea anterioară când se actualizează cu una nouă
        static::updating(function (PerformanceAthlete $athlete) {
            if ($athlete->isDirty('photo_url') && $athlete->getOriginal('photo_url')) {
                $oldPhotoPath = $athlete->getOriginal('photo_url');
                if ($oldPhotoPath && Storage::disk('public')->exists($oldPhotoPath)) {
                    Storage::disk('public')->delete($oldPhotoPath);
                }
            }
        });

        // Șterge imaginea când se șterge sportivul
        static::deleting(function (PerformanceAthlete $athlete) {
            if ($athlete->photo_url && Storage::disk('public')->exists($athlete->photo_url)) {
                Storage::disk('public')->delete($athlete->photo_url);
            }
        });
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }

    /**
     * Accessor pentru URL imagine - FIX pentru afișare și editing
     */
    public function getPhotoUrlAttribute($value)
    {
        if (!$value) {
            return null;
        }

        // Pentru afișarea pe site (URL complet)
        if (request()->is('admin/*') === false) {
            // Dacă nu suntem în admin, returnează URL complet pentru site
            if (str_starts_with($value, 'http')) {
                return $value;
            }
            return config('app.url') . '/storage/' . $value;
        }

        // Pentru Filament admin - returnează path-ul relativ
        // Aceasta permite FileUpload să recunoască fișierul existent
        return $value;
    }
}
