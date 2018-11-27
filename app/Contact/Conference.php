<?php

namespace App\Contact;

use Illuminate\Database\Eloquent\Model;

class Conference extends Model
{
    protected $table = 'conference';
    protected $fillable = [
        'title',
        'venue',
        'date'
    ];
    public $timestamps = false;
}
