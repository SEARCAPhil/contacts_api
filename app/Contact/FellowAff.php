<?php

namespace App\Contact;

use Illuminate\Database\Eloquent\Model;

class FellowAff extends Model
{
    protected $table = 'fellowaff';
    protected $fillable = [
        'contact_id', 
        'saaftype_id', 
        'dateFrom',
        'dateTo',
    ];

    public $timestamps = false;
}
