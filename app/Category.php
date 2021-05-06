<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    /*
     *  Libera a Definicao  de dados em massa 
     * 
     */
    protected $fillable = ['name', 'description'];

    /**
     * Relacao de Categoria com post
     */
    public function posts()
    {
        return $this->belongsToMany('App\Post')->withTimestamps();
    }
}
