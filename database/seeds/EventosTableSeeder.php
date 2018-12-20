<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inetevento')->insert([
            [
                'evtTitle' => 'Año Nuevo',
                'evtStartdate' => '2018-01-01T09:57:24',
                'evtEnddate' => '2018-01-01T09:57:31',
                'evtAllday' => 1,
                'evtNational' => 1,
                'evtLocal'=> 0,
                'evtTipo' => 2
            ],[
                'evtTitle' => 'Carnaval',
                'evtStartdate' => '2018-02-12T09:57:52',
                'evtEnddate' => '2018-02-12T09:57:56',
                'evtAllday' => 1,
                'evtNational' => 1,
                'evtLocal'=> 0,
                'evtTipo' => 2
            ],[
                'evtTitle' => 'Jueves Santo',
                'evtStartdate' => '2018-03-29T09:58:09',
                'evtEnddate' => '2018-03-29T09:58:13',
                'evtAllday' => 1,
                'evtNational' => 1,
                'evtLocal'=> 0,
                'evtTipo' => 2
            ],[
                'evtTitle' => 'Viernes Santo',
                'evtStartdate' => '2018-03-30T09:58:24',
                'evtEnddate' => '2018-03-30T09:58:28',
                'evtAllday' => 1,
                'evtNational' => 1,
                'evtLocal'=> 0,
                'evtTipo' => 2
            ],[
                'evtTitle' => 'Día del trabajador',
                'evtStartdate' => '2018-05-01T09:58:43',
                'evtEnddate' => '2018-05-01T09:58:47',
                'evtAllday' => 1,
                'evtNational' => 1,
                'evtLocal'=> 0,
                'evtTipo' => 2
            ],[
                'evtTitle' => 'San Pedro y San Pablo',
                'evtStartdate' => '2018-06-29T10:00:06',
                'evtEnddate' => '2018-06-29T10:00:09',
                'evtAllday' => 1,
                'evtNational' => 1,
                'evtLocal'=> 0,
                'evtTipo' => 2
            ],[
                'evtTitle' => 'Independencia del perú',
                'evtStartdate' => '2018-07-28T10:00:51',
                'evtEnddate' => '2018-07-29T10:01:00',
                'evtAllday' => 1,
                'evtNational' => 1,
                'evtLocal'=> 0,
                'evtTipo' => 2
            ],[
                'evtTitle' => 'Santa Rosa de Lima',
                'evtStartdate' => '2018-08-30T10:01:22',
                'evtEnddate' => '2018-08-30T10:01:28',
                'evtAllday' => 1,
                'evtNational' => 1,
                'evtLocal'=> 0,
                'evtTipo' => 2
            ],[
                'evtTitle' => 'Combate naval de Angamos',
                'evtStartdate' => '2018-10-08T10:02:26',
                'evtEnddate' => '2018-10-08T10:02:32',
                'evtAllday' => 1,
                'evtNational' => 1,
                'evtLocal'=> 0,
                'evtTipo' => 2
            ],[
                'evtTitle' => 'Día de todos los Santos',
                'evtStartdate' => '2018-11-01T10:02:50',
                'evtEnddate' => '2018-11-01T10:02:55',
                'evtAllday' => 1,
                'evtNational' => 1,
                'evtLocal'=> 0,
                'evtTipo' => 2
            ],[
                'evtTitle' => 'Día de la inmaculada Concepción',
                'evtStartdate' => '2018-12-08T10:03:15',
                'evtEnddate' => '2018-12-08T10:03:19',
                'evtAllday' => 1,
                'evtNational' => 1,
                'evtLocal'=> 0,
                'evtTipo' => 2
            ],[
                'evtTitle' => 'Navidad',
                'evtStartdate' => '2018-12-25T10:03:30',
                'evtEnddate' => '2018-12-25T10:03:30',
                'evtAllday' => 1,
                'evtNational' => 1,
                'evtLocal'=> 2,
                'evtTipo' => 1
            ],
        ]);
    }
}
