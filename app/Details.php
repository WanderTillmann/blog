<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Details extends Model
{
    /*
     *  Libera a Definicao  de dados em massa 
     * 
     */
    protected $fillable = ['status', 'visibility'];

    /**
     * Mapeia o Relacionamento com o model Post
     *
     * @return void
     */
    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}
