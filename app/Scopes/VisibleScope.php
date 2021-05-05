<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class VisibleScope  implements Scope
{

    public function apply(Builder $builder, Model $model)
    {
        $builder->whereHas('details', function ($query) {
            $query->where('status', 'publicado')
                ->where('visibility', 'publico');
        });
    }
}
