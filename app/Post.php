<?php

namespace App;

use App\Events\PostCreated;
use App\Scopes\VisibleScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{

  protected static function boot()
  {
    parent::boot();
    static::addGlobalScope('orderByCreatedAt', function (Builder $builder) {
      $builder->orderBy('created_at', 'desc');
    });

    static::addGlobalScope(new VisibleScope);
  }

  use SoftDeletes;
  protected $fillable = ['title', 'content'];
  protected $date = ['deleted_at'];

  protected $dispatchesEvents = [
    'created' => PostCreated::class,
  ];

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
    return $this->morphMany('App\Rating', 'ratingable');
  }

  /**
   * Verifica se post e aprovado
   * @param [type] $query
   * @return void
   */
  public function scopeIsApproved($query)
  {
    return  $query->where('approved', 1);
  }

  /**
   * Verifica o post com base no parametro dinamico
   * @param [type] $query
   * @param [type] $approved
   * @return void
   */
  public function scopeApproved($query, $approved)
  {
    return $query->where('approved', $approved);
  }

  /**
   * 
   */
  public function scopeHasCategories($query)
  {
    return $query->whereHas('categories');
  }
}
