<?php

namespace App\Http\Controllers;

use App\Http\Repositories\RWLocationRepository;
use App\Models\RWProperty;
use App\Http\Repositories\RWPropertyRepository;
use App\Models\RWLocation;
use Illuminate\Http\Request;

class ViewController extends Controller
{

  protected $properties;
  protected $location;

  public function __construct(RWProperty $property, RWLocation $location)
  {
    $this->properties = new RWPropertyRepository($property);
    $this->locations = new RWLocationRepository($location);
  }


  public function home()
  {
    $quantity = 10;

    $properties = $this->properties->get_random_properties($quantity);

    return view('vendor.rw-real-estate.home', compact('properties'));
  }

  public function properties()
  {
    $locations = $this->locations->get_all_order_by_field('name');
    $properties = $this->properties->all()->take(20);

    return view('vendor.rw-real-estate.properties', compact('locations', 'properties'));
  }
}
