<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'app_id', 'body'
    ];

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
}
