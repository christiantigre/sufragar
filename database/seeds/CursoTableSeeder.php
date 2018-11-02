<?php

use Illuminate\Database\Seeder;
use App\Course;

class CursoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::create( [
'id'=>1,
'created_at'=>'2018-11-01 04:32:48',
'updated_at'=>'2018-11-01 04:32:48',
'curso'=>'1ro',
'activo'=>1
] );


			
Course::create( [
'id'=>2,
'created_at'=>'2018-11-01 04:32:54',
'updated_at'=>'2018-11-01 04:32:54',
'curso'=>'2do',
'activo'=>1
] );


			
Course::create( [
'id'=>3,
'created_at'=>'2018-11-01 04:33:01',
'updated_at'=>'2018-11-01 04:33:01',
'curso'=>'3ro',
'activo'=>1
] );


			
Course::create( [
'id'=>4,
'created_at'=>'2018-11-01 04:33:08',
'updated_at'=>'2018-11-01 04:33:08',
'curso'=>'4to',
'activo'=>1
] );


			
Course::create( [
'id'=>5,
'created_at'=>'2018-11-01 04:33:14',
'updated_at'=>'2018-11-01 04:33:14',
'curso'=>'5to',
'activo'=>1
] );


			
Course::create( [
'id'=>6,
'created_at'=>'2018-11-01 04:33:21',
'updated_at'=>'2018-11-01 04:33:21',
'curso'=>'6to',
'activo'=>1
] );
    }
}
