<?php

use Illuminate\Database\Seeder;
use App\Paralelo;

class ParaleloTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Paralelo::create( [
'id'=>1,
'created_at'=>'2018-11-01 04:35:06',
'updated_at'=>'2018-11-01 04:35:06',
'paralelo'=>'A',
'activo'=>1
] );


			
Paralelo::create( [
'id'=>2,
'created_at'=>'2018-11-01 04:35:14',
'updated_at'=>'2018-11-01 04:35:14',
'paralelo'=>'B',
'activo'=>1
] );


			
Paralelo::create( [
'id'=>3,
'created_at'=>'2018-11-01 04:35:18',
'updated_at'=>'2018-11-01 04:35:18',
'paralelo'=>'C',
'activo'=>1
] );


			
Paralelo::create( [
'id'=>4,
'created_at'=>'2018-11-01 04:35:23',
'updated_at'=>'2018-11-01 04:35:23',
'paralelo'=>'D',
'activo'=>1
] );
    }
}
