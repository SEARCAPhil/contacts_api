<?php

namespace App\Contact;

use Illuminate\Database\Eloquent\Model;

class Prefix extends Model
{
    protected $table = 'prefix';
    protected $fillable = ['prefix'];
    public $timestamps = false;
}
