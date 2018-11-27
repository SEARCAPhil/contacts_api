<?php

namespace App\Saaf;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $table = 'saafclass';
    protected $fillable = ['saafclass', 'saafclass_parent_id'];
    public $timestamps = false;
}
