<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use SoftDeletes;

    protected $table = 'contact';
    protected $primaryKey = 'contact_id';
    protected $fillable = [
        'affiliateCode',
        'prefix', 
        'lastname',
        'firstname',
        'middleinit',
        'nickname',
        'gender',
        'birthdate',
        'spouse',
        'children',
        'hobbies',
        'nationality',
        'specialization',
        'homeAddress',
        'homeCountry',
        'homeZipCode',
        'officeCountryCode',
        'homeCountryCode',
        'homeAreaCode',
        'civilStat',
        'position',
        'dept',
        'others',
        'rank',
        'suffix',
        'photo',
    ];
    public $timestamps = false;
    protected $dates = ['deleted_at'];

    public function communications () {
        return $this->hasMany(Contact\Communication::class, 'contact_id');
    }
    
    public function conferences () {
        return $this->hasMany(Contact\Conference::class, 'contact_id')->with(['lectures']);
    }

    public function educationalBackgrounds () {
        return $this->hasMany(Contact\Education::class, 'contact_id');
    }

    public function research () {
        return $this->hasMany(Contact\Research::class, 'contact_id');
    }

    public function trainings () {
        return $this->hasMany(Contact\Training::class, 'contact_id');
    }

    public function employments () {
        return $this->hasMany(Contact\Employment::class, 'contact_id');
    }

    public function fellowships () {
        return $this->hasMAny(Contact\FellowAff::class, 'contact_id')->leftJoin('saafclass', 'fellowaff.saaftype_id', '=', 'saafclass.saafclass_id');
    }

    public function engagements () {
        return $this->hasMany(Contact\Engagement::class, 'contact_id')->leftJoin('research', 'research.research_id', '=', 'engagement.researchId')->leftJoin('afftype', 'engagement.type', '=', 'afftype.type_id');
    }
}
