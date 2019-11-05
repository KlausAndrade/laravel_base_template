<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Amenity extends Model
{
    protected $hidden = ['pivot'];

    public function house()
    {
        return $this->belongsToMany(House::class);
    }
}
