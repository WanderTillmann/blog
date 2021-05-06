<?php

namespace App;

use App\Events\PostCreated;
use App\Scopes\VisibleScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
  /**
   * Usa Soft deletes
   */
  use SoftDeletes;

  /* 
   *  Libera a Definicao  de dados em massa 
   * 
   */
  protected $fillable = ['title', 'content'];

  /**
   * define os campos do tipo data
   */
  protected $date = ['deleted_at'];

  /**
   *  Converte tipos de dados
   */
  protected $casts = [
    'approved' => 'boolean',
    'created_at' => 'datetime:d/m/Y',
    'updated_at' => 'datetime:d/m/Y'
  ];

  /**
   * Relaciona os eventos ao model
   */
  protected $dispatchesEvents = [
    'created' => PostCreated::class,
  ];

  /**
   * Anexa campo criado via assessor a serializacao
   */
  protected $appends = ['summary_content'];


  protected static function boot()
  {
    parent::boot();
    static::addGlobalScope('orderByCreatedAt', function (Builder $builder) {
      $builder->orderBy('created_at', 'desc');
    });

    static::addGlobalScope(new VisibleScope);
  }


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

  // public function getContentAttribute($value)
  // {
  //   return mb_strimwidth($value, 0, 30, "...");
  // }

  public function getSummaryContentAttribute()
  {
    return mb_strimwidth($this->content, 0, 30, "...");
  }
}
