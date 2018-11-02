<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Integrante extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'integrantes';

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
    protected $fillable = ['nombre_alumno', 'apellido_alumno', 'cargo_id', 'curso_id', 'paralelo_id', 'descripcion', 'lista_id','foto'];

    public function Lista()
    {
        return $this->belongsTo('App\Lista');
    }

    public function Cargo()
    {
        return $this->belongsTo('App\Cargo');
    }

    public function Curso()
    {
        return $this->belongsTo('App\Course');
    }

    public function Paralelo()
    {
        return $this->belongsTo('App\Paralelo');
    }
    
}
