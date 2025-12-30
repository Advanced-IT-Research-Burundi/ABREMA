<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produit extends Model
{
    use HasFactory;



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'designation_commerciale',
        'dci',
        'dosage',
        'forme',
        'conditionnement',
        'category',
        'nom_laboratoire',
        'pays_origine',
        'titulaire_amm',
        'pays_titulaire_amm',
        'num_enregistrement',
        'date_amm',
        'date_expiration',
        'statut_amm',
        'user_id',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'id' => 'integer',
            'user_id' => 'integer',
            'date_amm' => 'date',
            'date_expiration' => 'date',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            // get last id and increment it by 1
            $model->user_id = auth()->id();
        });
    }
    public function getIsExpiredAttribute(): bool
    {
        return $this->date_expiration && $this->date_expiration->isPast();
    }

    public function getIsNearExpirationAttribute(): bool
    {
        if (!$this->date_expiration || $this->is_expired) {
            return false;
        }
        return $this->date_expiration->diffInMonths(now()) <= 6;
    }

    public function getIsTooOldAttribute(): bool
    {
        return $this->created_at->diffInYears(now()) >= 5;
    }

    public function scopeActive($query)
    {
        return $query->where(function ($q) {
            $q->whereNull('date_expiration')
              ->orWhere('date_expiration', '>', now());
        })->where('created_at', '>', now()->subYears(5));
    }
}
