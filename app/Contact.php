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
    protected $dates = ['deleted_at'];
}
