<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AffType extends Model
{
    protected $table = 'afftype';
    protected $fillable = ['afftypeName'];
    public $timestamps = false;
}
