<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Revenue extends Record
{
    use HasFactory;
    

    protected $table = 'records';

    protected static function booted()
    {
        static::addGlobalScope('revenue', function (Builder $builder) {
            $builder->where('type', 'revenue');
        });
    }
}
