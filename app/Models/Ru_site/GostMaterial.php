<?php

namespace App\Models\Ru_site;

use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GostMaterial extends Model
{
    use HasFactory;

    public function scopeSearchGost(Builder $builder, QueryFilter $filter){
        return $filter->apply($builder);
    }
}
