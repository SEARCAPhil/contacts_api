<?php

namespace App\Contact;

use Illuminate\Database\Eloquent\Model;

class AssocAff extends Model
{
    protected $table = 'assocaff';
    protected $fillable = [
        'contact_id', 
        'saaftype_id', 
        'researchTitle', 
        'yearStart', 
        'yearComplete', 
        'paperTitle', 
        'confTitle', 
        'dateConf', 
        'venueConf', 
        'lectureTitle', 
        'dateLect',
        'venueLect',
    ];

    public $timestamps = false;
}
