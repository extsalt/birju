<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'url', 'post_id'
    ];

    public function getUrlAttribute($value)
    {
        return asset($value);
    }
}
