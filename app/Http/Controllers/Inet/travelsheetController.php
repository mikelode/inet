<?php

namespace App\Http\Controllers\inet;

use App\Models\Actividad;
use App\Models\Destino;
use App\Models\Entidad;
use App\Models\Obra;
use App\Models\Obradestino;
use App\Models\Pasajero;
use App\Models\Persona;
use App\Models\Transporte;
use App\Models\Ubigeo;
use App\models\Viaje;
use Dompdf\Dompdf;
use PDF;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class travelsheetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hojas = Viaje::select(DB::raw("*, fnGetDescField('inetpersona',viaTitular) as titular, fnGetDescField('inetentidad',viaEntity) as entidad, fnGetDescField('inetpersona',viaChofer) as chofer, fnGetDescField('inettransporte',viaMovilidad) as movilidad"))
                    ->with(['destinos' => function($query){
                        return $query->select(DB::raw("*,dviUbigeo, fnGetDescField('inetubigeo',dviUbigeo) as placement"));
                    }])
                    ->with(['obras' => function($query){
                        return $query->select(DB::raw("*, fnGetDescField('inetobra',oviObra) as project"));
                    }])
                    ->get();

        $view = view('content.panelViaje', compact('hojas'));

        return $view;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $personas = Persona::all();
        $dependencias = Entidad::where('entDepend','GORE')->get();
        $ubigeos = Ubigeo::all();
        /*Id de la ocupación chofer es: 10*/
        $choferes = Persona::where('perCareer',10)->get();
        $movilidades = Transporte::all();
        $obras = Obra::all();

        $viajes = Viaje::select('*')
            ->join('inetdestinoviaje','viaId','=','dviHojaviaje')
            ->join('inetobraviaje','viaId','=','oviHojaviaje')
            ->join('inetactividadviaje','viaId','=','actHojaviaje')
            ->join('inetpasajeroviaje','viaId','=','psjHojaviaje')
            ->get();

        $view = view('content.service_viaje', compact('personas','dependencias','ubigeos','choferes','movilidades','obras','viajes'));

        return $view;
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

            $exception = DB::transaction(function() use($request){

                $hojaviaje = new Viaje();
                $hojaviaje->viaTitular = $request->nslcTitular;
                $hojaviaje->viaEntity = $request->nslcDependencia;
                //$hojaviaje->viaPlace = ; para multiples casos
                $hojaviaje->viaMotivo = $request->ntxtMotivo;
                //$hojaviaje->viaObra = ; para multples casos
                // actividades para multiples casos
                $hojaviaje->viaStartdate = $request->dteSalida;
                $hojaviaje->viaStarttime = $request->tmeSalida;
                $hojaviaje->viaReturndate = $request->dteRetorno;
                $hojaviaje->viaReturntime = $request->tmeRetorno;
                $hojaviaje->viaAdelviatico = null;
                $hojaviaje->viaComponente = null;
                $hojaviaje->viaMeta = null;
                $hojaviaje->viaModotransporte = $request->nslcModotransporte;
                $hojaviaje->viaChofer = $request->nslcChofer;
                $hojaviaje->viaMovilidad = $request->nslcPlaca;

                if($hojaviaje->save()){
                    foreach ($request->nslcUbigeo as $ubigeo){
                        $destinos = new Destino();
                        $destinos->dviHojaviaje = $hojaviaje->viaId;
                        $destinos->dviUbigeo = $ubigeo;
                        $destinos->save();
                    }

                    foreach ($request->nslcObra as $obra){
                        $obrasdestino = new Obradestino();
                        $obrasdestino->oviHojaviaje = $hojaviaje->viaId;
                        $obrasdestino->oviObra = $obra;
                        $obrasdestino->save();
                    }

                    foreach ($request->nslcPasajero as $i => $pasajero){
                        if($i == 0) continue;
                        $pasajeros = new Pasajero();
                        $pasajeros->psjHojaviaje = $hojaviaje->viaId;
                        $pasajeros->psjPersona = $pasajero;
                        $pasajeros->save();
                    }

                    foreach ($request->ntxtActividad as $i => $actividad){
                        $actividades = new Actividad();
                        $actividades->actHojaviaje = $hojaviaje->viaId;
                        $actividades->actStartdate = $request->ndteStart[$i];
                        $actividades->actEnddate = $request->ndteEnd[$i];
                        $actividades->actDescripcion = $actividad;
                        $actividades->save();
                    }
                }
                else{
                    throw new Exception('Los datos de la hoja de viaje son incorrectos');
                }

            });

            if(is_null($exception)){
                $msg = 'La hoja de viaje fue registrada correctamente';
                $msgId = 200;
                $url = url('service/travelsheet');
            }

        }catch(Exception $e){
            $msg = 'Error: ' . $e->getMessage() . ' -- ' . $e->getFile() . ' - ' . $e->getLine() . " \n";;
            $msgId = 500;
            $url = '';
        }

        return response()->json(compact('msg','msgId','url'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hoja = Viaje::select(DB::raw("*, fnGetDescField('inetpersona',viaTitular) as titular, fnGetDescField('inetentidad',viaEntity) as entidad, fnGetDescField('inetpersona',viaChofer) as chofer, fnGetDescField('inettransporte',viaMovilidad) as movilidad"))
            ->join('inettransporte','trnId','=','viaMovilidad')
            ->with(['destinos' => function($query){
                return $query->select(DB::raw("*,dviUbigeo, fnGetDescField('inetubigeo',dviUbigeo) as placement"));
            }])
            ->with(['obras' => function($query){
                return $query->select(DB::raw("*, fnGetDescField('inetobra',oviObra) as project"));
            }])
            ->with('actividades')
            ->with(['pasajeros' => function($query){
                return $query->select(DB::raw("*, fnGetDescField('inetpersona',psjPersona) as passenger"));
            }])
            ->where('viaId',$id)
            ->get();

        $hojaviaje = $hoja[0];

        $personas = Persona::all();
        $dependencias = Entidad::where('entDepend','GORE')->get();
        $ubigeos = Ubigeo::all();
        /*Id de la ocupación chofer es: 10*/
        $choferes = Persona::where('perCareer',10)->get();
        $movilidades = Transporte::all();
        $obras = Obra::all();

        $viajes = Viaje::select('*')
            ->join('inetdestinoviaje','viaId','=','dviHojaviaje')
            ->join('inetobraviaje','viaId','=','oviHojaviaje')
            ->join('inetactividadviaje','viaId','=','actHojaviaje')
            ->join('inetpasajeroviaje','viaId','=','psjHojaviaje')
            ->get();

        $view = view('content.service_viaje', compact('personas','dependencias','ubigeos','choferes','movilidades','obras','viajes','hojaviaje'));

        return $view;
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
        try{

            $exception = DB::transaction(function() use($request, $id){

                $hojaviaje = Viaje::find($id);
                $hojaviaje->viaTitular = $request->nslcTitular;
                $hojaviaje->viaEntity = $request->nslcDependencia;
                //$hojaviaje->viaPlace = ; para multiples casos
                $hojaviaje->viaMotivo = $request->ntxtMotivo;
                //$hojaviaje->viaObra = ; para multples casos
                // actividades para multiples casos
                $hojaviaje->viaStartdate = $request->dteSalida;
                $hojaviaje->viaStarttime = $request->tmeSalida;
                $hojaviaje->viaReturndate = $request->dteRetorno;
                $hojaviaje->viaReturntime = $request->tmeRetorno;
                $hojaviaje->viaAdelviatico = null;
                $hojaviaje->viaComponente = null;
                $hojaviaje->viaMeta = null;
                $hojaviaje->viaModotransporte = $request->nslcModotransporte;
                $hojaviaje->viaChofer = $request->nslcChofer;
                $hojaviaje->viaMovilidad = $request->nslcPlaca;

                if($hojaviaje->save()){

                    /*ACTUALIZANDO DESTINOS*/

                    $currentDestinos = Destino::select('dviUbigeo')->where('dviHojaviaje',$id)->get()->pluck('dviUbigeo');
                    $newDestinos = $request->nslcUbigeo;
                    $deleteDestinos = $currentDestinos->diff($request->nslcUbigeo);
                    $addDestinos = collect($newDestinos)->diff($currentDestinos);

                    foreach($deleteDestinos as $item){
                        Destino::where('dviHojaviaje',$id)->where('dviUbigeo',$item)->delete();
                    }

                    foreach ($addDestinos as $item){
                        $destinos = new Destino();
                        $destinos->dviHojaviaje = $id;
                        $destinos->dviUbigeo = $item;
                        $destinos->save();
                    }

                    /*ACTUALIZANDO OBRAS*/

                    $currentObras = Obradestino::where('oviHojaviaje',$id)->get()->pluck('oviObra');
                    $newObras = $request->nslcObra;
                    $deleteObras = $currentObras->diff($newObras);
                    $addObras = collect($newObras)->diff($currentObras);

                    foreach ($deleteObras as $item){
                        Obradestino::where('oviHojaviaje',$id)->where('oviObra',$item)->delete();
                    }

                    foreach ($addObras as $item){
                        $obrasdestino = new Obradestino();
                        $obrasdestino->oviHojaviaje = $id;
                        $obrasdestino->oviObra = $item;
                        $obrasdestino->save();
                    }

                    /*ACTUALIZANDO PASAJEROS*/

                    $currentPasajeros = Pasajero::where('psjHojaviaje',$id)->get()->pluck('psjPersona');
                    $newPasajeros = $request->nslcPasajero;
                    $deletePasajeros = $currentObras->diff($newPasajeros);
                    $addPasajeros = collect($newPasajeros)->diff($currentPasajeros);

                    foreach ($deletePasajeros as $item){
                        if($item == 0) continue;
                        Pasajero::where('psjHojaviaje',$id)->where('psjPersona', $item)->delete();
                    }

                    foreach ($addPasajeros as $item){
                        if($item == 0) continue;
                        $pasajeros = new Pasajero();
                        $pasajeros->psjHojaviaje = $id;
                        $pasajeros->psjPersona = $item;
                        $pasajeros->save();
                    }

                    /*ACTUALIZANDO ACTIVIDADES*/

                    foreach ($request->ntxtActividad as $i => $actividad){
                        Actividad::where('actHojaviaje',$id)
                            ->update(['actStartdate' => $request->ndteStart[$i], 'actEnddate' => $request->ndteEnd[$i], 'actDescripcion' => $actividad]);
                    }
                }
                else{
                    throw new Exception('Los datos de la hoja de viaje son incorrectos');
                }

            });

            if(is_null($exception)){
                $msg = 'La hoja de viaje fue editada y actualizada correctamente';
                $msgId = 200;
                $url = url('service/travelsheet');
            }

        }catch(Exception $e){
            $msg = 'Error: ' . $e->getMessage() . ' -- ' . $e->getFile() . ' - ' . $e->getLine() . " \n";;
            $msgId = 500;
            $url = '';
        }

        return response()->json(compact('msg','msgId','url'));
    }

    public function pdf($id)
    {
        $hoja = Viaje::select(DB::raw("*, fnGetDescField('inetpersona',viaTitular) as titular, fnGetDescField('inetentidad',viaEntity) as entidad, fnGetDescField('inetpersona',viaChofer) as chofer, fnGetDescField('inettransporte',viaMovilidad) as movilidad"))
            ->join('inettransporte','trnId','=','viaMovilidad')
            ->with(['destinos' => function($query){
                return $query->select(DB::raw("*,dviUbigeo, fnGetDescField('inetubigeo',dviUbigeo) as placement"));
            }])
            ->with(['obras' => function($query){
                return $query->select(DB::raw("*, fnGetDescField('inetobra',oviObra) as project"));
            }])
            ->with('actividades')
            ->with(['pasajeros' => function($query){
                return $query->select(DB::raw("*, fnGetDescField('inetpersona',psjPersona) as passenger"));
            }])
            ->where('viaId',$id)
            ->get();

        $hojaviaje = $hoja[0];

        PDF::setOptions(['dpi' => 150]);
        $pdf = PDF::loadView('pdfs.hojaviaje', compact('hojaviaje'));

        return $pdf->stream('hojadeviaje.pdf');
    }

    public function htmlPdf($id)
    {
        $hojaviaje = Viaje::find($id);
        $view = view('pdfs.hojaviaje',compact('hojaviaje'));
        return $view;
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
