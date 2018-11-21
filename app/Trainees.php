<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trainees extends Model
{
    protected $table = 'trainees';
    protected $fillable = ['contact_id'];
    public $timestamps = false;
}
