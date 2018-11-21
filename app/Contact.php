<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
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
        'officeMobile',
        'homeMobile',
        'officePhone',
        'homePhone',
        'officeEmail',
        'homeEmail',
        'homeAddress',
        'homeCountry',
        'officeAddress',
        'officeCountry',
        'homeZipCode',
        'officeZipCode',
        'officeFax',
        'homeFax',
        'officeCountryCode',
        'homeCountryCode',
        'officeAreaCode',
        'homeAreaCode',
        'status',
        'civilStat',
        'position',
        'dept',
        'company',
        'others',
        'sector',
        'contactMeans',
        'mailMeans',
        'rank',
        'suffix'
    ];
    public $timestamps = false;
}
