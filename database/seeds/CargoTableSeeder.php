<?php

use Illuminate\Database\Seeder;
use App\Cargo;

class CargoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cargo::create( [
'id'=>1,
'created_at'=>'2018-11-01 04:25:07',
'updated_at'=>'2018-11-01 04:25:07',
'cargo_lista'=>'PRESIDENTE',
'activo'=>1
] );
			
Cargo::create( [
'id'=>2,
'created_at'=>'2018-11-01 04:25:22',
'updated_at'=>'2018-11-01 04:25:22',
'cargo_lista'=>'VICEPRECIDENTE',
'activo'=>1
] );
			
Cargo::create( [
'id'=>3,
'created_at'=>'2018-11-01 04:25:30',
'updated_at'=>'2018-11-01 04:25:30',
'cargo_lista'=>'SECRETARIO GENERAL',
'activo'=>1
] );
			
Cargo::create( [
'id'=>4,
'created_at'=>'2018-11-01 04:25:42',
'updated_at'=>'2018-11-01 04:25:42',
'cargo_lista'=>'TESORERO',
'activo'=>1
] );
			
Cargo::create( [
'id'=>5,
'created_at'=>'2018-11-01 04:26:05',
'updated_at'=>'2018-11-01 04:26:05',
'cargo_lista'=>'VOCAL',
'activo'=>1
] );
			
Cargo::create( [
'id'=>6,
'created_at'=>'2018-11-01 04:26:15',
'updated_at'=>'2018-11-01 04:26:15',
'cargo_lista'=>'ASESOR',
'activo'=>1
] );
			
Cargo::create( [
'id'=>7,
'created_at'=>'2018-11-01 04:26:26',
'updated_at'=>'2018-11-01 04:26:26',
'cargo_lista'=>'JEFE DE CAMPAÑA',
'activo'=>1
] );
    }
}
