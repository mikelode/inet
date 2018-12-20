<?php

use Illuminate\Database\Seeder;

class TipoEventosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inettipoevento')->insert([
            [
                'tevDenom' => 'Feriado local',
                'tevPeriodo' => 'Temporal'
            ],[
                'tevDenom' => 'Feriado nacional',
                'tevPeriodo' => 'Anual'
            ],[
                'tevDenom' => 'Cumpleaños',
                'tevPeriodo' => 'Temporal'
            ],[
                'tevDenom' => 'Aniversario',
                'tevPeriodo' => 'Temporal'
            ],[
                'tevDenom' => 'Reunión',
                'tevPeriodo' => 'Temporal'
            ],
        ]);
    }
}
