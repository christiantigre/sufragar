<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CargoTableSeeder::class);
        $this->call(CursoTableSeeder::class);
        $this->call(ParaleloTableSeeder::class);
        $this->call(AdminTableSeeder::class);
        $this->call(ListaTableSeeder::class);

    }
}
