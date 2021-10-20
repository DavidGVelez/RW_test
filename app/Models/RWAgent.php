<?php

namespace App\Models;


use RefineriaWeb\RWRealEstate\Models\Agent;

class RWAgent extends Agent
{

  public $appends = [
    'full_name'
  ];

  public function getFullNameAttribute()
  {
    return $this->attributes['name'] . ' ' . $this->attributes['surname'];
  }
}
