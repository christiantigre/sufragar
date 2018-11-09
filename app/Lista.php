<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lista extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'lists';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['lista_numero', 'nombre', 'presidente','cantidad_integrantes', 'logo', 'descripcion'];

    
}
