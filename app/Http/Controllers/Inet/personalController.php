<?php

namespace App\Http\Controllers\inet;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use Exception;

class personalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $view = view("control.index");
        return $view;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $anio)
    {
        try{

            switch($anio){
                case '2019':
                $historial = DB::connection('planillas2019')->select(DB::raw("select e.COD_PROYECTO, e.DES_PROYECTO, d.COD_PLANILLA, d.DES_PLANILLA, a.COD_PERSONA, 
                c.NOMBRES, c.AP_PATERNO, c.AP_MATERNO, b.DES_CONCEPTO, a.IMPORTE, d.COD_PERIODO, g.DESCRIPCION	
                from PLAN_PERSONA_CONCEPTOS a
                left join PLAN_CONCEPTO b on b.COD_CONCEPTO = a.COD_CONCEPTO
                left join PLAN_PERSONA c on c.COD_PERSONA = a.COD_PERSONA
                left join PLAN_PERSONA_ATRIBUTO f on f.COD_PERSONA = c.COD_PERSONA and f.COD_ATRIBUTO = 'CARGO'
                left join PLAN_Clasificador_Detalle g on g.CODIGO = f.VALOR and g.Id_Clasificador = 'CARGO'
                left join PLAN_PLANILLA d on d.COD_PLANILLA = a.COD_PLANILLA
                left join PLAN_PROYECTO e on e.COD_PROYECTO = d.COD_PROYECTO
                where a.COD_CONCEPTO IN ('TLIQUIDO')  AND a.COD_PERSONA = ? 
                ORDER BY d.COD_PERIODO ASC"), [trim($id)]);
                break;
                case '2018':
                $historial = DB::connection('planillas2018')->select(DB::raw("select e.COD_PROYECTO, e.DES_PROYECTO, d.COD_PLANILLA, d.DES_PLANILLA, a.COD_PERSONA, 
                c.NOMBRES, c.AP_PATERNO, c.AP_MATERNO, b.DES_CONCEPTO, a.IMPORTE, d.COD_PERIODO, g.DESCRIPCION	
                from PLAN_PERSONA_CONCEPTOS a
                left join PLAN_CONCEPTO b on b.COD_CONCEPTO = a.COD_CONCEPTO
                left join PLAN_PERSONA c on c.COD_PERSONA = a.COD_PERSONA
                left join PLAN_PERSONA_ATRIBUTO f on f.COD_PERSONA = c.COD_PERSONA and f.COD_ATRIBUTO = 'CARGO'
                left join PLAN_Clasificador_Detalle g on g.CODIGO = f.VALOR and g.Id_Clasificador = 'CARGO'
                left join PLAN_PLANILLA d on d.COD_PLANILLA = a.COD_PLANILLA
                left join PLAN_PROYECTO e on e.COD_PROYECTO = d.COD_PROYECTO
                where a.COD_CONCEPTO IN ('TLIQUIDO')  AND a.COD_PERSONA = ? 
                ORDER BY d.COD_PERIODO ASC"), [trim($id)]);
                break;
                case '2017':
                $historial = DB::connection('planillas2017')->select(DB::raw("select e.COD_PROYECTO, e.DES_PROYECTO, d.COD_PLANILLA, d.DES_PLANILLA, a.COD_PERSONA, 
                c.NOMBRES, c.AP_PATERNO, c.AP_MATERNO, b.DES_CONCEPTO, a.IMPORTE, d.COD_PERIODO, g.DESCRIPCION	
                from PLAN_PERSONA_CONCEPTOS a
                left join PLAN_CONCEPTO b on b.COD_CONCEPTO = a.COD_CONCEPTO
                left join PLAN_PERSONA c on c.COD_PERSONA = a.COD_PERSONA
                left join PLAN_PERSONA_ATRIBUTO f on f.COD_PERSONA = c.COD_PERSONA and f.COD_ATRIBUTO = 'CARGO'
                left join PLAN_Clasificador_Detalle g on g.CODIGO = f.VALOR and g.Id_Clasificador = 'CARGO'
                left join PLAN_PLANILLA d on d.COD_PLANILLA = a.COD_PLANILLA
                left join PLAN_PROYECTO e on e.COD_PROYECTO = d.COD_PROYECTO
                where a.COD_CONCEPTO IN ('TLIQUIDO')  AND a.COD_PERSONA = ? 
                ORDER BY d.COD_PERIODO ASC"), [trim($id)]);
                break;
                case '2016':
                $historial = DB::connection('planillas2016')->select(DB::raw("select e.COD_PROYECTO, e.DES_PROYECTO, d.COD_PLANILLA, d.DES_PLANILLA, a.COD_PERSONA, 
                c.NOMBRES, c.AP_PATERNO, c.AP_MATERNO, b.DES_CONCEPTO, a.IMPORTE, d.COD_PERIODO, g.DESCRIPCION	
                from PLAN_PERSONA_CONCEPTOS a
                left join PLAN_CONCEPTO b on b.COD_CONCEPTO = a.COD_CONCEPTO
                left join PLAN_PERSONA c on c.COD_PERSONA = a.COD_PERSONA
                left join PLAN_PERSONA_ATRIBUTO f on f.COD_PERSONA = c.COD_PERSONA and f.COD_ATRIBUTO = 'CARGO'
                left join PLAN_Clasificador_Detalle g on g.CODIGO = f.VALOR and g.Id_Clasificador = 'CARGO'
                left join PLAN_PLANILLA d on d.COD_PLANILLA = a.COD_PLANILLA
                left join PLAN_PROYECTO e on e.COD_PROYECTO = d.COD_PROYECTO
                where a.COD_CONCEPTO IN ('TLIQUIDO')  AND a.COD_PERSONA = ? 
                ORDER BY d.COD_PERIODO ASC"), [trim($id)]);
                break;
                case '2015':
                $historial = DB::connection('planillas2015')->select(DB::raw("select e.COD_PROYECTO, e.DES_PROYECTO, d.COD_PLANILLA, d.DES_PLANILLA, a.COD_PERSONA, 
                c.NOMBRES, c.AP_PATERNO, c.AP_MATERNO, b.DES_CONCEPTO, a.IMPORTE, d.COD_PERIODO, g.DESCRIPCION	
                from PLAN_PERSONA_CONCEPTOS a
                left join PLAN_CONCEPTO b on b.COD_CONCEPTO = a.COD_CONCEPTO
                left join PLAN_PERSONA c on c.COD_PERSONA = a.COD_PERSONA
                left join PLAN_PERSONA_ATRIBUTO f on f.COD_PERSONA = c.COD_PERSONA and f.COD_ATRIBUTO = 'CARGO'
                left join PLAN_Clasificador_Detalle g on g.CODIGO = f.VALOR and g.Id_Clasificador = 'CARGO'
                left join PLAN_PLANILLA d on d.COD_PLANILLA = a.COD_PLANILLA
                left join PLAN_PROYECTO e on e.COD_PROYECTO = d.COD_PROYECTO
                where a.COD_CONCEPTO IN ('TLIQUIDO')  AND a.COD_PERSONA = ? 
                ORDER BY d.COD_PERIODO ASC"), [trim($id)]);
                break;
            }

            if(count($historial) == 0){
                throw new Exception('NO SE ENCUENTRAN REGISTROS LABORALES PARA EL DNI: ' . $id);
            }
            else{
                $msg = 'Información encontrada';
                $msgId = 200;
            }

        }catch(Exception $e){
            $msg = $e->getMessage();
            $msgId = 500;
            $historial = null;
        }

        $view = view('control.tabla_historial_detalle', compact('historial','msg','msgId'));

        return $view;
    }

    public function list($name, $anio)
    {
        switch($anio){
            case '2019':
            $personas = DB::connection('planillas2019')->select(DB::raw("select COD_PERSONA as dni, (NOMBRES + ' ' + AP_PATERNO + ' ' + AP_MATERNO) AS fullname 
        from PLAN_PERSONA
        where (NOMBRES + ' ' + AP_PATERNO + ' ' + AP_MATERNO) like ?"), ['%' . trim($name) . '%']);
            break;
            case '2018':
            $personas = DB::connection('planillas2018')->select(DB::raw("select COD_PERSONA as dni, (NOMBRES + ' ' + AP_PATERNO + ' ' + AP_MATERNO) AS fullname 
        from PLAN_PERSONA
        where (NOMBRES + ' ' + AP_PATERNO + ' ' + AP_MATERNO) like ?"), ['%' . trim($name) . '%']);
            break;
            case '2017':
            $personas = DB::connection('planillas2017')->select(DB::raw("select COD_PERSONA as dni, (NOMBRES + ' ' + AP_PATERNO + ' ' + AP_MATERNO) AS fullname 
        from PLAN_PERSONA
        where (NOMBRES + ' ' + AP_PATERNO + ' ' + AP_MATERNO) like ?"), ['%' . trim($name) . '%']);
            break;
            case '2016':
            $personas = DB::connection('planillas2016')->select(DB::raw("select COD_PERSONA as dni, (NOMBRES + ' ' + AP_PATERNO + ' ' + AP_MATERNO) AS fullname 
        from PLAN_PERSONA
        where (NOMBRES + ' ' + AP_PATERNO + ' ' + AP_MATERNO) like ?"), ['%' . trim($name) . '%']);
            break;
            case '2015':
            $personas = DB::connection('planillas2015')->select(DB::raw("select COD_PERSONA as dni, (NOMBRES + ' ' + AP_PATERNO + ' ' + AP_MATERNO) AS fullname 
        from PLAN_PERSONA
        where (NOMBRES + ' ' + AP_PATERNO + ' ' + AP_MATERNO) like ?"), ['%' . trim($name) . '%']);
            break;
        }

        return response()->json(compact('personas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
