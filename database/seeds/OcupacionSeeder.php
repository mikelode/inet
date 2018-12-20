<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OcupacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inetocupacion')->insert([
            [
                'ocuDenom' => 'Otras ocupaciones',
                'ocuAbrv' => 'Sr(a).'
            ],[
                'ocuDenom' => 'Ingeniero',
                'ocuAbrv' => 'Ing.'
            ],[
                'ocuDenom' => 'Ingeniero civil',
                'ocuAbrv' => 'Ing.'
            ],[
                'ocuDenom' => 'Ingeniero economista',
                'ocuAbrv' => 'Ing.'
            ],[
                'ocuDenom' => 'Ingeniero de sistemas',
                'ocuAbrv' => 'Ing.'
            ],[
                'ocuDenom' => 'Arquitecto',
                'ocuAbrv' => 'Arq.'
            ],[
                'ocuDenom' => 'Ingeniero agrícola',
                'ocuAbrv' => 'Ing.'
            ],[
                'ocuDenom' => 'Ingeniero topógrafo',
                'ocuAbrv' => 'Ing.'
            ],[
                'ocuDenom' => 'Ingeniero geólogo',
                'ocuAbrv' => 'Ing.'
            ],[
                'ocuDenom' => 'Conductor / Chofer',
                'ocuAbrv' => 'Chof.'
            ],[
                'ocuDenom' => 'Contador',
                'ocuAbrv' => 'CPC.'
            ],[
                'ocuDenom' => 'Administrador',
                'ocuAbrv' => 'Lic.'
            ],[
                'ocuDenom' => 'Abogado',
                'ocuAbrv' => 'Abog.'
            ],[
                'ocuDenom' => 'Licenciado',
                'ocuAbrv' => 'Lic.'
            ],[
                'ocuDenom' => 'Bachiller Ingeniería',
                'ocuAbrv' => 'Bach. Ing.'
            ]
        ]);
    }
}
