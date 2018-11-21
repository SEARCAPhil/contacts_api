<?php

namespace App\Contact;

use Illuminate\Database\Eloquent\Model;

class Doctoral extends Model
{
    protected $table = 'doctor';
    protected $fillable = ['contact_id', 'phdInstitute', 'phdCountry', 'phdField', 'phdGrad', 'phdScholarship'];
    public $timestamps = false;
}
