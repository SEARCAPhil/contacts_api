<?php

namespace App\Saaf;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'saaftype';
    protected $fillable = ['saafclass_id', 'saaftype'];
    public $timestamps = false;
}
