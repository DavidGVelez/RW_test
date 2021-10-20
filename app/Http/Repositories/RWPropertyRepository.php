<?php

namespace App\Http\Repositories;

use Illuminate\Support\Facades\DB;

class RWPropertyRepository extends BaseRepository
{

  public function get_random_properties($quantity)
  {
    return $this->model->get()->random($quantity);
  }

  public function get_filtered_data($data)
  {

    $query = DB::table('properties')
      ->select('*', 'properties.name as name', 'locations.name as location')
      ->where(function ($filter) use ($data) {
        if (isset($data->price_from)) {
          $filter->where('price', '>=', $data->price_from);
        }
        if (isset($data->price_to)) {
          $filter->where('price', '<=', $data->price_to);
        }
        //This could be <= depending on if you want exact rooms or from n rooms
        if (isset($data->rooms)) {
          $filter->where('bedrooms', '=', $data->rooms);
        }
        //This could be <= depending on if you want exact bathrooms or from n bathrooms
        if (isset($data->bathrooms)) {
          $filter->where('bathrooms', '=', $data->bathrooms);
        }
        if (isset($data->property_type)) {
          $filter->where('properties_type_id', '=', $data->property_type);
        }
        if (isset($data->location)) {
          $filter->where('location_id', '=', $data->location);
        }
        if (isset($data->garaje)) {
          $filter->where('garaje', '=', 1);
        }
        if (isset($data->garden)) {
          $filter->where('garden', '=', 1);
        }
        if (isset($data->private_pool)) {
          $filter->where('private_pool', '=', 1);
        }
        if (isset($data->community_pool)) {
          $filter->where('community_pool', '=', 1);
        }
        if (isset($data->reference)) {
          $filter->where('reference', '=', $data->reference);
        }
      })
      ->join('locations', 'properties.location_id', '=', 'locations.id')
      ->join('properties_types', 'properties.properties_type_id', '=', 'properties_types.id')
      ->join('properties_features', 'properties.id', '=', 'properties_features.property_id')
      ->orderBy('price', 'desc')
      ->paginate($data['limit']);


    return $query;
  }
}
