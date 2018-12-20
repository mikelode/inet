<?php

namespace App\Http\Controllers\inet;

use App\Models\Directorio;
use App\Models\Entidad;
use App\Models\Obra;
use App\Models\Persona;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class directoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $obras = Obra::all();
        $entidades = Entidad::all();
        $directorio = Directorio::select('*')
                        ->join('inetpersona','dirPersona','=','perId')
                        ->join('inetentidad','dirEntidad','=','entId')
                        ->join('inetobra','dirObra','=','obrId')
                        ->get();
        $personas = Persona::select('*')
                        ->whereNotIn('perId',function($query){
                            $query->select('dirPersona')
                                    ->from('inetdirectorio');
                        })
                        ->get();

        $view = view('content.panelDirectorio',compact('directorio','obras','entidades','personas'));

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
            $exception = DB::transaction(function() use($request){

                $contacto = new Directorio();
                $contacto->dirPersona = $request->nslcPerson;
                $contacto->dirCargo = $request->ntxtCargo;
                $contacto->dirDirecLegal = $request->ntxtDomlegal;
                $contacto->dirDirecEjec = $request->ntxtDomejec;
                $contacto->dirDirElect = $request->ntxtEmail;
                $contacto->dirTelefono = $request->ntxtTelefono;
                $contacto->dirEntidad = $request->nslcEntity;
                $contacto->dirObra = $request->nslcObra;
                $contacto->save();

            });

            if(is_null($exception)){
                $msg = 'El nuevo contacto fue registrado correctamente';
                $msgId = 200;
                $url = url('directorio');
            }
        }
        catch(Exception $e){
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
        //
    }

    public function filter(Request $request)
    {
        $value = $request->value;
        $field = $request->field;

        $contactos = Directorio::select('*')
                    ->join('inetpersona','perId','=','dirPersona')
                    ->join('inetentidad','dirEntidad','=','entId')
                    ->join('inetobra','dirObra','=','obrId');

        switch ($field){
            case 'name':
                $contactos = $contactos->where('perFullName','like','%'.$value.'%');
                break;
            case 'job':
                $contactos = $contactos->where('dirCargo','like','%'.$value.'%');
                break;
            case 'entity':
                $contactos = $contactos->where('dirEntidad',$value);
                break;
            case 'project':
                $contactos = $contactos->where('dirObra',$value);
                break;
        }

        $contactos = $contactos->get();

        $view = view('result.tabla_filtro_directorio',compact('contactos'));

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
