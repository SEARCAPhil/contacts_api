<?php

namespace App\Contact;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $table = 'training';
    protected $fillable = [
        'contact_id',
        'saaftype_id',
        'notes',
        'dateStarted',
        'dateEnded',
        'venue',
        'sponsor',
        'supervisor',
        'supervisorDesignation',
        'trainingType',
        'organizingAgency',
        'hostUniversity',
    ];
    public $timestamps = false;
}
