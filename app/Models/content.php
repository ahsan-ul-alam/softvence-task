<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class content extends Model
{
    protected $table = 'contents';

    protected $fillable = [
        'title',
        'content_source',
        'content_url',
        'content_length',
        'module_id',
    ];

    public function module()
    {
        return $this->belongsTo(module::class);
    }

}
