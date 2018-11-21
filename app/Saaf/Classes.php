<?php

namespace App\Saaf;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $table = 'saafclass';
    protected $fillable = ['saafclass'];
    public $timestamps = false;
}
