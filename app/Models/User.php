<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; 
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable 
{
    use HasFactory, SoftDeletes, HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
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
            'email_verified_at' => 'timestamp',
        ];
    }

    /* --- RELATIONS --- */

    public function colis()
    {
        return $this->hasMany(Colis::class);
    }

    public function AvisPublic()
    {
        return $this->hasMany(AvisPublic::class);
    }

    public function EquipeDirection()
    {
        return $this->hasMany(EquipeDirection::class);
    }

    public function Partenaire()
    {
        return $this->hasMany(Partenaire::class);
    }

    public function Produit()
    {
        return $this->hasMany(Produit::class);
    }

    public function Slider()
    {
        return $this->hasMany(Slider::class);
    }

    public function ImageLabo()
    {
        return $this->hasMany(ImageLabo::class);
    }

    public function TexteReglementaire()
    {
        return $this->hasMany(TexteReglementaire::class);
    }

    public function notification()
    {
        return $this->hasMany(Notification::class);
    }

    public function publication()
    {
        return $this->hasMany(Publication::class);
    }

    public function PointEntree()
    {
        return $this->hasMany(PointEntree::class);
    }
    public function actualites()
    {
        return $this->hasMany(Actualite::class);
    }
}
