<?php

namespace App\Models;

use RefineriaWeb\RWRealEstate\Models\Property;

class RWProperty extends Property
{

    public $appends = [
        'property_type'
    ];

    public function features()
    {
        return $this->hasOne(RWPropertyFeature::class, 'property_id', 'id');
    }

    public function getPropertyTypeAttribute()
    {
        return $this->hasOne(RWPropertyType::class, 'id', 'properties_type_id')->first()->type;
    }
}
