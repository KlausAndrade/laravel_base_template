<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    protected $guarded = [];

    public function image()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
