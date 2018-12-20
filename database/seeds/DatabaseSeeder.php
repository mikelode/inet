<?php

use App\User;
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
        $this->call(TipoEventosTableSeeder::class);
        $this->call(EventosTableSeeder::class);
        $this->call(RolesAssignSeeder::class);
        $this->call(OcupacionSeeder::class);
    }
}
