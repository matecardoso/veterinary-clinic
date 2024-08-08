<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

class Receptionist extends User
{
  protected $table = 'users';

  public static function boot()
  {
    parent::boot();

    static::addGlobalScope('type', function (Builder $builder) {
      $builder->where('type', 'receptionist');
    });

    static::creating(function ($model) {
      $model->type = 'receptionist';
    });
  }
}
