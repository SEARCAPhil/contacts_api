<?php

namespace App\Contact;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    protected $table = 'gender';
    protected $fillable = ['genderName'];
    public $timestamps = false;
}
