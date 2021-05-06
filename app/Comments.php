<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{

    /*
     *  Libera a Definicao  de dados em massa 
     * 
     */
    protected $fillable = ['title', 'content'];

    /**
     * Define campos que nao serao enviados na serializacao
     */
    // protected $hidden = ['title'];

    /**
     * Mostra os campos na serializacao
     */
    // protected $visible = ['title', 'content'];

    /**
     * Mapeia o relacionamento com o model Post
     *
     * @return void
     */
    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    /**
     * define um titulo com a primeira letra maiuscula
     */
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = ucfirst($value);
    }
}
