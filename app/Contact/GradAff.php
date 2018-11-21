<?php

namespace App\Contact;

use Illuminate\Database\Eloquent\Model;

class GradAff extends Model
{
    protected $table = 'gradaff';
    protected $fillable = [
        'contact_id', 
        'saaftype_id', 
        'hostUniv',
        'fieldStudy',
        'thesisTitle',
        'yearStart',
        'yearComplete',
        'funding',
        'remarks',
    ];

    public $timestamps = false;
}
