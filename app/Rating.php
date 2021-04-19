<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{

    protected $fillable =['value'];

    /**
     *  Metodo de relacao com post ou user
     */
    public function ratingable()
    {
        return $this->morphTo();
    }
}
