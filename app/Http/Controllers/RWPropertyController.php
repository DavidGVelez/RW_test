<?php

namespace App\Http\Controllers;

use App\Models\RWProperty;
use App\Http\Repositories\RWPropertyRepository;
use Illuminate\Http\Request;

class RWPropertyController extends Controller
{

    protected $repository;

    public function __construct(RWProperty $property)
    {
        $this->repository = new RWPropertyRepository($property);
    }


    public function index()
    {

        $quantity = 10;

        $properties = $this->repository->get_random_properties($quantity);

        return view('vendor.rw-real-estate.home', compact('properties'));
    }
}
