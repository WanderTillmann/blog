<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  protected $fillable = ['title', 'content'];

  /**
   * Mapeia o relacionamento com o model Details
   *
   * @return void
   */
  public function details()
  {
    return $this->hasOne('App\Details')->withDefault(function ($details) {
      $details->status = 'rascunho';
      $details->visibility = 'privado';
    });
  }

  /**
   * mapeia o relacionamento com o model Commentes
   *
   * @return void
   */
  public function comments()
  {
    return $this->hasMany('App\Comments');
  }


  /**
   * mapeia o relacionamento com o model category
   *
   * @return void
   */
  public function categories()
  {
    return $this->belongsToMany('App\Category')->withTimestamps();
  }

  /**
   * retorna as avaliacoes relacionadas
   * 
   * @return void
   */
  public function ratings()
  {
    return $this->morphMany('App\Rating','ratingable');
  }
}
