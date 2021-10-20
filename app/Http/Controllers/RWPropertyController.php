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

    public function apply_filters(Request $request)
    {
        return $this->repository->get_filtered_data($request);
    }
}
