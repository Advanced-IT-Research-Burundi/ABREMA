<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'image',
        'itemable_type',
        'itemable_id',
    ];

    /**
     * Polymorphic parent (the model this item represents).
     */
    public function itemable()
    {
        return $this->morphTo();
    }
}
