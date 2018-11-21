<?php

namespace App\Contact;

use Illuminate\Database\Eloquent\Model;

class Bachelor extends Model
{
    protected $table = 'bachelor';
    protected $fillable = ['contact_id', 'bsInstitute', 'bsCountry', 'bsField', 'bsGrad', 'bsScholarship'];
    public $timestamps = false;
}
