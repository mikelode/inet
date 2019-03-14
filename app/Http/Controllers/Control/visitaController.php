<?php

namespace App\Http\Controllers\Control;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Exception;
use App\Models\Persona;
use App\Models\Sector;
use App\Models\Visitante;
use App\Models\Visita;
use App\Models\Detallevisita;
use Carbon\Carbon;

class visitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sectores = Sector::select(DB::raw("sctId, concat(sctSector, ' - ', sctDistrito) as sctSector"))->get();

        $view = view('visita.index', compact('sectores'));
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
        try{
            $data = (object)$request->visitante;

            $exception = DB::transaction(function () use($data) {
                /** Check if person exist */
                $persona = Persona::where('perDni',$data->dni)->get();

                if(count($persona) == 0){

                    $newPersona = new Persona();
                    $newPersona->perDni = $data->dni;
                    $newPersona->perNombre = $data->name;
                    $newPersona->perPaterno = $data->paterno;
                    $newPersona->perMaterno = $data->materno;
                    $newPersona->save();

                    $persona = $newPersona->perId;
                }
                else{
                    $persona = $persona[0]->perId;
                }

                $visitante = new Visitante();
                $visitante->visPersona = $persona;
                $visitante->visSector = is_null($data->procedencia) ? null : $data->procedencia['sctId'];
                $visitante->visFono = $data->fono;
                $visitante->visOcupacion = $data->ocupacion;
                $visitante->save();

                $visita = new Visita();
                $visita->vtaVisitante = $visitante->visId;
                $visita->vtaPrimera = Carbon::today();
                $visita->save();
            });

            if(is_null($exception)){
                $msg = 'Visitante registrado correctamente';
                $msgId = 500;
            }
            else{
                throw new Exception($exception);
            }

        }catch(Exception $e){
            $msg = "Atención: " . $e->getMessage() . "\n" . $e->getLine();
            $msgId = 200;
        }

        return response()->json(compact('msg','msgId'));
    }

    public function storeDetalle(Request $request)
    {
        try{
            $exception = DB::transaction(function () use($request) {

                $detalle = (object)$request->detalle;
                $persona = (object)$request->visitas['persona'];
                $visita = (object)$request->visitas['visita'];
                $visitante = (object)$request->visitas['visitante'];

                $acuerdo = new Detallevisita();
                $acuerdo->dvtFecha = $detalle->nvsDate;
                $acuerdo->dvtDesc = $detalle->nvsDesc;
                $acuerdo->dvtVisita = $visita->vtaId;
                $acuerdo->dvtNota = $detalle->nvsNota;
                $acuerdo->save();

            });

            if(is_null($exception)){
                $msg = 'Acuerdo de visita registrado correctamente';
                $msgId = 200;
            }
            else{
                throw new Exception($exception);
            }

        }catch(Exception $e){

            $msg = $e->getMessage();
            $msgId = 500;

        }

        return response()->json(compact('msg','msgId'));
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

            $persona = Persona::where('perDni', $id)->get();
            $visitante = [];
            

            if(count($persona) == 0){
                throw new Exception("<div class='text-danger'>Persona no registrada</div>");
            }
            else{
                $visitante = Visitante::select(DB::raw("*, concat(sctSector, ' - ', sctDistrito) as sctSector"))
                            ->join('inetsector','sctId','=','visSector')
                            ->where('visPersona', $persona[0]->perId)
                            ->get();
            }

            if(count($visitante) == 0){
                throw new Exception("<div class='text-danger'>Visitante no encontrado, debe ser registrado</div>");
            }
            
            $msg = "<div class='text-success'>Visitante registrado</div>";
            $msgId = 200;

        }catch(Exception $e){
            $msg = $e->getMessage();
            $msgId = 500;
        }

        return response()->json(compact('msg','msgId','visitante','persona'));
    }

    public function showReporte($id)
    {
        $visitante = Visitante::find($id);
        $persona = Visitante::find($id)->persona;
        $visita = Visita::where('vtaVisitante', $visitante->visId)
                    ->with('detalle')
                    ->first();

        return response()->json(compact('visitante','persona','visita'));

        /* $view = view('visita.reporte', compact('visitante','persona','visita'));

        return $view; */

    }

    public function showDetalle($id)
    {
        try{

            $detalle = Detallevisita::find($id);

            if(is_null($detalle)){
                throw new Exception("No existe el registro buscado");
            }
            else{
                $msg = 'OK';
                $msgId = 200;
            }

        }catch(Exception $e){
            $msg = $e->getMessage();
            $msgId = 500;
            $detalle = null;
        }

        return response()->json(compact('msg','msgId','detalle'));
        
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

    public function updateDetalle(Request $request, $id)
    {
        try{

            $exception = DB::transaction(function () use($request, $id) {

                $detalle = (object)$request->detalle;
                
                $currentDetalle = Detallevisita::find($id);
                $currentDetalle->dvtDesc = $detalle->dvtDesc;
                $currentDetalle->dvtFecha = $detalle->dvtFecha;
                $currentDetalle->dvtNota = $detalle->dvtNota;
                $currentDetalle->save();

            });

            if(is_null($exception)){
                $msg = 'Actualizado correctamente';
                $msgId = 200;
            }
            else{
                throw new Exception($exception);
            }

        }catch(Exception $e){
            $msg = $e->getMessage();
            $msgId = 500;
        }

        return response()->json(compact('msg','msgId'));
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

    public function destroyDetalle($id)
    {
        try{

            $exception = DB::transaction(function () use($id) {

                Detallevisita::destroy($id);

            });

            if(is_null($exception)){
                $msg = 'Registro eliminado';
                $msgId = 200;
            }
            else{
                throw new Exception($exception);
            }

        }catch(Exception $e){
            $msg = $e->getMessage();
            $msgId = 500;
        }

        return response()->json(compact('msg','msgId'));
    }
}
