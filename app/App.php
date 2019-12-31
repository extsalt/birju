<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class App extends Model
{
    protected $fillable = [
        'name', 'photo', 'app_id', 'app_secret', 'user_id', 'active'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($app) {
            $app->app_id = Str::random(10);
            $app->app_secret = Str::random(30);
        });
    }

    public function getPhotoAttribute($value)
    {
        return asset($value);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
