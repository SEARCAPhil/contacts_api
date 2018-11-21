<?php

namespace App\Contact;

use Illuminate\Database\Eloquent\Model;

class TrainAff extends Model
{
    protected $table = 'trainaff';
    protected $fillable = [
        'contact_id',
        'saaftype_id',
        'trainingTitle',
        'dateTrain',
        'venueTrain',
        'hostUniv',
        'yearStart',
        'yearComplete',
    ];
    public $timestamps = false;
}
