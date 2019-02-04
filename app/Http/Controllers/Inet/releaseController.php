<?php

namespace App\Http\Controllers\Inet;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Exception;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use App\Models\Publicacion;
use App\Models\Comentario;

class releaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publicaciones = Publicacion::select(DB::raw("*, fnGetDescField('inetpersona',pubAutor) as autor"))
                            ->with(['comentarios' => function($query){
                                return $query->select(DB::raw("*,fnGetDescField('inetpersona',comAutor) as comentador"));
                            }])
                            ->where('pubVisible',true)
                            ->orderBy('pubFecha','DESC')
                            ->get();
                            
        return response()->json(['publicaciones' => $publicaciones]);
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

            if($request->hasFile('file')){
                $file = $request->file('file');
                $file_parts = pathinfo($_FILES['file']['name']);
                $filename = $file_parts['filename'];
                $fileext = $file_parts['extension'];

                $pathFile = $file->storeAs('publicaciones', $filename . '_' . time() . '.' . $fileext);

            }
            else{
                $pathFile = '';
            }

            $exception = DB::transaction(function() use($request, $pathFile){

                $frm = json_decode($request->datapub);

                $publicacion = new Publicacion();
                $publicacion->pubDescripcion = $frm->relDesc;
                $publicacion->pubPathfile = $pathFile;
                $publicacion->pubFecha = Carbon::now();
                $publicacion->pubAutor = is_null(Auth::user()->persona) ? Auth::user()->id : Auth::user()->persona->perDni;
                $publicacion->pubVisible = $frm->relShow;
                $publicacion->pubTitulo = $frm->relTitle;

                $publicacion->save();

            });

            if(is_null($exception)){
                $msg = 'Datos de la publicación registrados correctamente.';
                $msgId = 200;
            }
            else{
                throw new Exception($exception);
            }
        }
        catch(Exception $e){
            $msg = 'Error: ' . $e->getMessage() . ' -- ' . $e->getFile() . ' - ' . $e->getLine() . " \n";
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $publicacion = Publicacion::find($id);

        return response()->json(compact('publicacion'));
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

            if($request->hasFile('file')){
                $file = $request->file('file');
                $file_parts = pathinfo($_FILES['file']['name']);
                $filename = $file_parts['filename'];
                $fileext = $file_parts['extension'];

                $pathFile = $file->storeAs('publicaciones', $filename . '_' . time() . '.' . $fileext);

            }
            else{
                $pathFile = '';
            }

            $exception = DB::transaction(function() use($request, $id, $pathFile){

                $frm = json_decode($request->datapub);
                
                $publicacion = Publicacion::find($id);
                $publicacion->pubDescripcion = $frm->pubDescripcion;
                if ($pathFile != ''){
                    $publicacion->pubPathfile = $pathFile;
                }
                $publicacion->pubFecha = Carbon::now();
                $publicacion->pubAutor = is_null(Auth::user()->persona) ? Auth::user()->id : Auth::user()->persona->perDni;;
                $publicacion->pubVisible = $frm->pubVisible;
                $publicacion->pubTitulo = $frm->pubTitulo;

                $publicacion->save();
            });

            if(is_null($exception)){
                $msg = 'Datos de la publicación modificados correctamente.';
                $msgId = 200;
            }
            else{
                throw new Exception($exception);
            }
        }catch(Exception $e){
            $msg = 'Error: ' . $e->getMessage() . ' -- ' . $e->getFile() . ' - ' . $e->getLine() . " \n";
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
        try{
            $exception = DB::transaction(function () use ($id) {
                Publicacion::destroy($id);
            });

            if(is_null($exception)){
                $msg = 'Registro eliminado.';
                $msgId = 200;
            }
            else{
                throw new Exception($exception);
            }
        }catch(Exception $e){
            $msg = 'Error: ' . $e->getMessage() . ' -- ' . $e->getFile() . ' - ' . $e->getLine() . " \n";
            $msgId = 500;
        }

        return response()->json(compact('msg','msgId'));
    }

    public function storeComment(Request $request, $release)
    {
        try {
            $exception = DB::transaction(function () use($request, $release) {
                
                $comentario = new Comentario();

                $comentario->comDescripcion = $request->msg;
                $comentario->comFecha = Carbon::now();
                $comentario->comAutor = 2;
                $comentario->comPublicacion = $release;

                $comentario->save();

            });

            if(is_null($exception)){
                $msg = 'Comentario agregado.';
                $msgId = 200;
            }
            else{
                throw new Exception($exception);
            }

        } catch (Exception $e) {
            $msg = 'Error: ' . $e->getMessage() . ' -- ' . $e->getFile() . ' - ' . $e->getLine() . " \n";
            $msgId = 500;
        }

        return response()->json(compact('msg','msgId'));
    }
}