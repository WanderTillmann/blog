<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{

    protected $fillable = ['title', 'content'];

    /**
     * Mapeia o relacionamento com o model Post
     *
     * @return void
     */
    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    
}
