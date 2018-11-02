<?php

use Illuminate\Database\Seeder;
use App\Lista;

class ListaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lista::create( [
'id'=>1,
'created_at'=>'2018-11-02 22:02:08',
'updated_at'=>'2018-11-02 22:02:08',
'lista_numero'=>'1',
'nombre'=>'LISTA 1',
'cantidad_integrantes'=>'0',
'logo'=>NULL,
'descripcion'=>NULL
] );
    }
}
