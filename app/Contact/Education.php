<?php

namespace App\Contact;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'education';
    protected $fillable = ['contract_id', 'institution', 'country', 'field', 'grad', 'scholarship'];
    public $timestamps = false;
}
