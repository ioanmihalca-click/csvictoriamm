<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Competition extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'location',
        'date',
        'description',
        'results',
        'team_composition',
        'notes',
        'image_url',
        'details_url',
        'is_active',
        'order'
    ];

    protected $casts = [
        'date' => 'date',
        'is_active' => 'boolean',
    ];

    /**
     * Boot method pentru a gestiona clean-up-ul fișierelor
     */
    protected static function booted(): void
    {
        // Șterge imaginea anterioară când se actualizează cu una nouă
        static::updating(function (Competition $competition) {
            if ($competition->isDirty('image_url') && $competition->getOriginal('image_url')) {
                $oldImagePath = $competition->getOriginal('image_url');
                if ($oldImagePath && Storage::disk('public')->exists($oldImagePath)) {
                    Storage::disk('public')->delete($oldImagePath);
                }
            }
        });

        // Șterge imaginea când se șterge competiția
        static::deleting(function (Competition $competition) {
            if ($competition->image_url && Storage::disk('public')->exists($competition->image_url)) {
                Storage::disk('public')->delete($competition->image_url);
            }
        });
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderByDesc('date');
    }

    /**
     * Accessor pentru URL imagine - FIX pentru afișare și editing
     */
    public function getImageUrlAttribute($value)
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
