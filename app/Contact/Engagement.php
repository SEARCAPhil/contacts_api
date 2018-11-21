<?php

namespace App\Contact;

use Illuminate\Database\Eloquent\Model;

class Engagement extends Model
{
    protected $table = 'engagement';
    protected $fillable = ['contact_id', 'engageFrom', 'engageTo', 'researchTitle', 'engagement'];
    public $timestamps = false;
}
