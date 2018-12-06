<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $table = 'training';
    protected $fillable = [
        'trainingId',
        'title',
        'organizingAgency',
        'name',
        'birthDate',
        'birthPlace',
        'country',
        'gender',
        'civilStatus',
        'religion',
        'officeHomeAddress',
        'contactNumber',
        'faxNo',
        'email',
        'notes',
        'attachments',
        'bsDegree',
        'bsAwardDate',
        'bsInstitution',
        'msDegree',
        'msAwardDate',
        'msInstitution',
        'phdDegree',
        'phdAwardDate',
        'phdInstitution',
        'fieldOfSpecialization',
        'currentPositionTitle',
        'organization',
        'immediateSupervisor',
        'supervisorDesignation',
        'courseAttended',
        'dateStarted',
        'dateEnded',
        'venue',
        'sponsor',
    ];

    public $timestamps = false;
}
