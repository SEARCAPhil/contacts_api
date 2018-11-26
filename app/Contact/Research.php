<?php

namespace App\Contact;

use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
    protected $table = 'research';
    protected $fillable = [
        'contact_id',
        'saaftype_id',
        'title',
        'dateStarted',
        'dateEnded',
    ];
    public $timestamps = false;
}
