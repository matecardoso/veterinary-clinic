<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

class Doctor extends User
{
    protected $table = 'users';

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope('type', function (Builder $builder) {
            $builder->where('type', 'doctor');
        });

        static::creating(function ($model) {
            $model->type = 'doctor';
        });
    }
}
