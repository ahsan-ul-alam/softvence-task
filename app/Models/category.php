<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table = 'categories';

    protected $fillable = ['name', 'slug', 'description'];

    public function course()
    {
        return $this->hasMany(course::class);
    }
}
