<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use SoftDeletes;

    protected $table = 'contact';
    protected $fillable = [
        'affiliateCode',
        'prefix', 
        'lastname',
        'firstname',
        'middleinit',
        'nickname',
        'gender',
        'birthdate',
        'spouse',
        'children',
        'hobbies',
        'nationality',
        'specialization',
        'homeAddress',
        'homeCountry',
        'homeZipCode',
        'officeCountryCode',
        'homeCountryCode',
        'homeAreaCode',
        'civilStat',
        'position',
        'dept',
        'others',
        'rank',
        'suffix'
    ];
    public $timestamps = false;
    protected $dates = ['deleted_at'];
}
