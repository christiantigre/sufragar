<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voto extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'votos';

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
    protected $fillable = ['numero_cedula', 'lista_id'];

    public function Lista()
    {
        return $this->belongsTo('App\Lista');
    }
    
}
