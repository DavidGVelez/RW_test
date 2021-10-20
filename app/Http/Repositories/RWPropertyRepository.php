<?php

namespace App\Http\Repositories;

use Illuminate\Support\Facades\DB;

class RWPropertyRepository extends BaseRepository
{

  public function get_random_properties($quantity)
  {
    return $this->model->get()->random($quantity);
  }

  public function get_filtered_data($filters, $offset = 0, $limit = 20)
  {

    $query = DB::table('properties')
      ->select('*', 'properties.name as name', 'locations.name as location')
      ->where(function ($filter) use ($filters) {
        if (isset($filters->price_from)) {
          $filter->where('price', '>=', $filters->price_from);
        }
        if (isset($filters->price_to)) {
          $filter->where('price', '<=', $filters->price_to);
        }
        if (isset($filters->rooms)) {
          $filter->where('rooms', '=', $filters->rooms);
        }
        if (isset($filters->bathrooms)) {
          $filter->where('bathrooms', '=', $filters->bathrooms);
        }
        if (isset($filters->property_type)) {
          $filter->where('type', '=', $filters->property_type);
        }
        if (isset($filters->location)) {
          $filter->where('name', '=', $filters->location,);
        }
        if (isset($filters->garaje)) {
          $filter->where('garaje', '=', $filters->garaje);
        }
        if (isset($filters->garden)) {
          $filter->where('garden', '=', $filters->garden);
        }
        if (isset($filters->private_pool)) {
          $filter->where('private_pool', '=', $filters->private_pool);
        }
        if (isset($filters->community_pool)) {
          $filter->where('community_pool', '=', $filters->community_pool);
        }
        if (isset($filters->reference)) {
          $filter->where('reference', 'LIKE', $filters->reference);
        }
      })
      ->join('locations', 'properties.location_id', '=', 'locations.id')
      ->join('properties_types', 'properties.properties_type_id', '=', 'properties_types.id')
      ->join('properties_features', 'properties.id', '=', 'properties_features.property_id')
      ->offset($limit * $offset)
      ->limit($limit)
      ->get();

    return $query;
  }
}
