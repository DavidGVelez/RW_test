<?php

namespace App\Http\Repositories;

use Illuminate\Database\Eloquent\Model;

class RWPropertyRepository extends BaseRepository
{
  protected $model;

  public function __construct(Model $model)
  {
    $this->model = $model;
  }

  public function get_random_properties($quantity)
  {
    return $this->model->get()->random($quantity);
  }
}
