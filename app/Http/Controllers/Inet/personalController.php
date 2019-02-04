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
    public function show($id)
    {
        try{
                $result = DB::connection('planillas')->select('select e.COD_PROYECTO, e.DES_PROYECTO, d.COD_PLANILLA, d.DES_PLANILLA, a.COD_PERSONA, c.NOMBRES, c.AP_PATERNO, c.AP_MATERNO, b.DES_CONCEPTO, a.IMPORTE from PLAN_PERSONA_CONCEPTOS a
                inner join PLAN_CONCEPTO b on b.COD_CONCEPTO = a.COD_CONCEPTO
                inner join PLAN_PERSONA c on c.COD_PERSONA = a.COD_PERSONA
                inner join PLAN_PLANILLA d on d.COD_PLANILLA = a.COD_PLANILLA
                inner join PLAN_PROYECTO e on e.COD_PROYECTO = d.COD_PROYECTO
                where a.COD_CONCEPTO IN ("TINGRESO","TDESCUENTO","TLIQUIDO") AND COD_PERSONA = ?',[$id]);

                dd($result);

        }catch(Exception $e){
            $msg = $e->getMessage();
        }
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
