<?php
namespace App\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class BetweenStartEndScope implements Scope
{

    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder            
     * @param \Illuminate\Database\Eloquent\Model $model            
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        $builder->where('start_date', '<=', DB::raw('DATE(now())'))->
        where(function ($query) {
            $query->where('end_date', '>=', DB::raw('DATE(now())'))
                ->orWhereNull('end_date');
        });
    }
}