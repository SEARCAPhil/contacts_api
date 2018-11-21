<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'country';
    protected $fillable = ['countryCode', 'countryName', 'lastrank'];
    public $timestamps = false;
}
