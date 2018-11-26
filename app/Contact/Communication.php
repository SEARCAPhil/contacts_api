<?php

namespace App\Contact;

use Illuminate\Database\Eloquent\Model;

class Communication extends Model
{
   protected $table = 'communication';
   protected $fillable = [
       'type',
       'value',
       'contact_id'
   ];
   public $timestamps = false;
}
