<?php

namespace App\Contact;

use Illuminate\Database\Eloquent\Model;

class Masteral extends Model
{
    protected $table = 'masters';
    protected $fillable = ['contact_id', 'msInstitute', 'msCountry', 'msField', 'msGrad', 'msScholarship'];
    public $timestamps = false;
}
