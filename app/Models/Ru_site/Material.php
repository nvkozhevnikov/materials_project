<?php

namespace App\Models\Ru_site;

use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    public function scopeSearchMarochnik(Builder $builder, QueryFilter $filter){
        return $filter->apply($builder);
    }
}
