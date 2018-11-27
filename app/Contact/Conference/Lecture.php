<?php

namespace App\Contact\Conference;

use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    protected $table = 'lecture';
    protected $fillable = [
        'conference_id',
        'paperTitle',
        'lectureTitle',
        'dateStarted',
        'dateEnded',
        'lectureVenue'
    ];
    public $timestamps = false;
}
