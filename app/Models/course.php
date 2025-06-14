<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'thumbnail',
        'price',
        'video',
        'status',
        'duration',
        'level',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(category::class);
    }

    public function module()
    {
        return $this->hasMany(module::class);
    }
}
