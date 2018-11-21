<?php

namespace App\Contact;

use Illuminate\Database\Eloquent\Model;

class Employment extends Model
{
    protected $table = 'employment';
    protected $fillable = ['contact_id', 'companyName', 'companyAddress', 'position', 'employedFrom', 'employedTo'];
    public $timestamps = false;
}
