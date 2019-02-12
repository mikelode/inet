<?php

namespace App\Http\Controllers\inet;

use App\Models\Entidad;
use App\Models\Evento;
use App\Models\Obra;
use App\Models\Persona;
use App\Models\Tipoevento;
use App\Models\Ubigeo;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class customizeController extends Controller
{
    public function indexPersona()
    {
        $personas = Persona::select('*')
                    ->leftJoin('inetevento','perId','=','evtPerson')
                    ->get();
        $view = view('content.custom_persona',compact('personas'));
        return $view;
    }

    public function storePersona(Request $request)
    {
        try{
            $exception = DB::transaction(function() use($request){

                $persona = new Persona();
                $persona->perDni = $request->ntxtDni;
                $persona->perNombre = $request->ntxtName;
                $persona->perPaterno = $request->ntxtPaterno;
                $persona->perMaterno = $request->ntxtMaterno;
                $persona->perFullName = $request->ntxtName . ' ' . $request->ntxtPaterno . ' ' . $request->ntxtMaterno;
                $persona->perNacimiento = $request->ntxtBirth;
                $persona->save();

            });

            if(is_null($exception)){
                $msg = 'Los datos de la persona fueron registrados correctamente.';
                $msgId = 200;
                $url = url('custom/personas');
            }
            else{
                throw new Exception($exception);
            }
        }
        catch (Exception $e){
            $msg = 'Error: ' . $e->getMessage() . ' -- ' . $e->getFile() . ' - ' . $e->getLine() . " \n";
            $msgId = 500;
            $url = '';
        }

        return response()->json(compact('msg','msgId','url'));
    }

    public function updatePersona(Request $request)
    {
        $persona = Persona::find($request->pk);

        switch ($request->name){
            case 'dni':
                $persona->perDni = $request->value;
                break;
            case 'name':
                $persona->perNombre = $request->value;
                $persona->perFullName = $request->value . ' ' . $persona->perPaterno . ' ' . $persona->perMaterno;
                break;
            case 'patern':
                $persona->perPaterno = $request->value;
                $persona->perFullName = $persona->perNombre . ' ' . $request->value . ' ' . $persona->perMaterno;
                break;
            case 'matern':
                $persona->perMaterno = $request->value;
                $persona->perFullName = $persona->perNombre . ' ' . $persona->perPaterno . ' ' . $request->value;
                break;
            case 'birth':
                $persona->perNacimiento = $request->value;
                break;
        }

        $persona->save();

        return 'Campo actualizado correctamente';
    }

    public function indexEntidad()
    {
        $entidades = Entidad::all();
        $view = view('content.custom_entidad',compact('entidades'));
        return $view;
    }

    public function storeEntidad(Request $request)
    {
        try{
            $exception = DB::transaction(function() use($request){

                $entidad = new Entidad();
                $entidad->entDoc = $request->ntxtDoc;
                $entidad->entDenom = $request->ntxtDenom;
                $entidad->entSigla = $request->ntxtSigla;
                $entidad->save();

            });

            if(is_null($exception)){
                $msg = 'Los datos de la Entidad fueron registrados correctamente.';
                $msgId = 200;
                $url = url('custom/entidades');
            }
            else{
                throw new Exception($exception);
            }
        }
        catch (Exception $e){
            $msg = 'Error: ' . $e->getMessage() . ' -- ' . $e->getFile() . ' - ' . $e->getLine() . " \n";
            $msgId = 500;
            $url = '';
        }

        return response()->json(compact('msg','msgId','url'));

    }

    public function updateEntidad(Request $request)
    {
        $entidad = Entidad::find($request->pk);

        switch ($request->name){
            case 'doc':
                $entidad->entDoc = $request->value;
                break;
            case 'denom':
                $entidad->entDenom = $request->value;
                break;
            case 'sigla':
                $entidad->entSigla = $request->value;
                break;
        }

        $entidad->save();

        return 'Campo actualizado correctamente';
    }

    public function indexObra()
    {
        $ubigeos = Ubigeo::all();
        $obras = Obra::select('*')
                    ->join('inetubigeo','obrUbigeo','=','ubiId')
                    ->get();

        $view = view('content.custom_obra',compact('obras','ubigeos'));
        return $view;
    }

    public function  storeObra(Request $request)
    {
        try{
            $exception = DB::transaction(function() use($request){

                $obra = new Obra();
                $obra->obrCode = $request->ntxtCode;
                $obra->obrName = $request->ntxtName;
                $obra->obrShortname = $request->ntxtShortname;
                $obra->obrYear = $request->ntxtYear;
                $obra->obrSecfun = $request->ntxtSecfun;
                $obra->obrFunc = $request->ntxtFunc;
                $obra->obrDiv = $request->ntxtDiv;
                $obra->obrGrup = $request->ntxtGrup;
                $obra->obrUbigeo = $request->nslcUbigeo;
                $obra->save();

            });

            if(is_null($exception)){
                $msg = 'Los datos de la Obra fueron registrados correctamente.';
                $msgId = 200;
                $url = url('custom/obras');
            }
            else{
                throw new Exception($exception);
            }
        }
        catch (Exception $e){
            $msg = 'Error: ' . $e->getMessage() . ' -- ' . $e->getFile() . ' - ' . $e->getLine() . " \n";
            $msgId = 500;
            $url = '';
        }

        return response()->json(compact('msg','msgId','url'));

    }

    public function updateObra(Request $request)
    {
        $obra = Obra::find($request->pk);

        switch ($request->name){
            case 'code':
                $obra->obrCode = $request->value;
                break;
            case 'name':
                $obra->obrName = $request->value;
                break;
            case 'shortname':
                $obra->obrShortname = $request->value;
                break;
            case 'year':
                $obra->obrYear = $request->value;
                break;
            case 'secfun':
                $obra->obrSecfun = $request->value;
                break;
            case 'fun':
                $obra->obrFunc = $request->value;
                break;
            case 'div':
                $obra->obrDiv = $request->value;
                break;
            case 'grup':
                $obra->obrGrup = $request->value;
                break;
            case 'ubi':
                $obra->obrUbigeo = $request->value;
                break;
        }

        $obra->save();

        return 'Campo actualizado correctamente';
    }

    public function indexEvento()
    {
        $tipoeventos = Tipoevento::all();
        $eventos = Evento::select('*')
                    ->join('inettipoevento','evtTipo','=','tevId')
                    ->get();
        $view = view('content.custom_evento',compact('eventos','tipoeventos'));
        return $view;
    }

    public function storeEvento(Request $request)
    {
        try{
            $exception = DB::transaction(function() use($request){

                $evento = new Evento();
                $evento->evtTitle = $request->ntxtTitle;
                $evento->evtStartdate = $request->ndteStart;
                $evento->evtEnddate = $request->ndteEnd;
                $evento->evtAllday = $request->nchkAllday == 'on' ? true : false;
                $evento->evtNational = $request->nchkNivel == 'national' ? true : false;
                $evento->evtLocal = $request->nchkNivel == 'local' ? true : false;
                $evento->evtTipo = $request->nslcTipoevt;
                $evento->save();

            });

            if(is_null($exception)){
                $msg = 'Los datos del Evento fueron registrados correctamente.';
                $msgId = 200;
                $url = url('custom/eventos');
            }
            else{
                throw new Exception($exception);
            }
        }
        catch (Exception $e){
            $msg = 'Error: ' . $e->getMessage() . ' -- ' . $e->getFile() . ' - ' . $e->getLine() . " \n";
            $msgId = 500;
            $url = '';
        }

        return response()->json(compact('msg','msgId','url'));
    }

    public function updateEvento(Request $request)
    {
        $evento = Evento::find($request->pk);

        switch ($request->name){
            case 'title':
                $evento->evtTitle = $request->value;
                break;
            case 'begin':
                $evento->evtStartdate = $request->value;
                break;
            case 'end':
                $evento->evtEnddate = $request->value;
                break;
            case 'duration':
                $evento->evtAllday = $request->value;
                break;
            case 'national':
                $evento->evtNational = $request->value;
                break;
            case 'local':
                $evento->evtLocal = $request->value;
                break;
            case 'tipoevento':
                $evento->evtTipo = $request->value;
                break;
        }

        $evento->save();

        return 'Campo actualizado correctamente';
    }

    public function uploadIcon(Request $request)
    {
        try{

            $evtId = $request->hnatchEvt;
            $url = url('custom/eventos');

            if($request->hasFile('natchFile')){
                $file = $request->file('natchFile');
                $path_parts = pathinfo($_FILES['natchFile']['name']);
                $filename = $path_parts['filename'];
                $fileext = $path_parts['extension'];

                $path_saved = $file->storeAs('eventos/' . $evtId, $filename . '_' . time() . '.' . $fileext);

                if(Storage::disk('public')->exists($path_saved)){
                    $evento = Evento::find($evtId);
                    $evento->evtPathIcon = $path_saved;

                    if($evento->save()){
                        $msg = 'Archivo adjunto subido y registrado correctamente.';
                        $msgId = 200;
                    }
                    else{
                        throw new Exception("Error al registrar la ruta del archivo en la base de datos. Revise su conexión.");
                    }

                }
                else{
                    throw new Exception("El archivo no se ha almacenado correctamente.");
                }
            }
            else{
                throw new Exception("No se ha adjuntado ningun archivo");
            }

        }catch (Exception $e){
            $msg = 'Error: ' . $e->getMessage() . ' -Archivo- ' . $e->getFile() . ' -Linea- ' . $e->getLine() . " \n";
            $msgId = 500;
            $url= '';
        }
        return response()->json(compact('msg','msgId','url'));
    }

    public function listUbigeo()
    {
        $ubigeos = Ubigeo::all();
        $distritos = $ubigeos->mapWithKeys(function($item){
            return [$item['ubiId'] => $item['ubiProvincia'] . ' - ' . $item['ubiDistrito']];
        });
        return response()->json($distritos);
    }

    public function listTipoeventos()
    {
        $tipoevt = Tipoevento::all();
        $eventos = $tipoevt->mapWithKeys(function($item){
            return [$item['tevId'] => $item['tevDenom']];
        });
        return response()->json($eventos);
    }

    public function eventoPersona(Request $request)
    {
        try{
            $exception = DB::transaction(function() use($request){

                $perId = explode('-', $request->perKey);
                $persona = Persona::find($perId[1]);

                if(is_null($persona->perNacimiento))
                    throw new Exception('No es posible agregar al calendario de eventos porque no está definida la fecha de nacimiento de la persona');

                $year = Carbon::now()->year;
                $month = Carbon::parse($persona->perNacimiento)->month;
                $day = Carbon::parse($persona->perNacimiento)->day;
                $birthDate = Carbon::create($year,$month,$day);

                $evtBirthday = new Evento();
                $evtBirthday->evtTitle = 'Cumpleaños de ' . $persona->perNombre . ' ¡Felicidades!';
                $evtBirthday->evtStartdate = $birthDate;
                $evtBirthday->evtEnddate = $birthDate;
                $evtBirthday->evtAllday = true;
                $evtBirthday->evtTipo = 3;
                $evtBirthday->evtPerson = $persona->perId;
                $evtBirthday->save();

            });

            if(is_null($exception)){
                $msg = 'La fecha de nacimiento de la persona fue agregada al calendario de eventos de la ORSyLP.';
                $msgId = 200;
                $url = url('custom/personas');
            }
            else{
                throw new Exception($exception);
            }

        }
        catch(Exception $e){
            $msg = 'Error: ' . $e->getMessage() . ' -Linea- ' . $e->getLine() . " \n";
            $msgId = 500;
            $url= '';
        }

        return response()->json(compact('msg','msgId','url'));

    }

    public function indexUsuario(Request $request)
    {
        $usuarios = User::with('persona')->get();
        $view = view('content.custom_usuarios',compact('usuarios'));
        return $view;
    }

    public function storeUsuario(Request $request)
    {
        try{
            $exception = DB::transaction(function () use($request){
                
                $person = Persona::where('perDni', $request->ntxtDni)->first();

                if(is_null($person)){

                    $usrPerson = new Persona();
                    $usrPerson->perDni = $request->ntxtDni;
                    $usrPerson->perNombre = $request->ntxtName;
                    $usrPerson->perPaterno = $request->ntxtPaterno;
                    $usrPerson->perMaterno = $request->ntxtMaterno;
                    $usrPerson->perFullname = $request->ntxtName . ' ' . $request->ntxtPaterno . ' ' . $request->ntxtMaterno;
                    $usrPerson->save();
                }
                else{
                    $usrPerson = Persona::find($person->perId);
                }

                $user = new User();
                $user->name = $request->ntxtUsrname;
                $user->email = $request->ntxtUsrmail;
                $user->password = bcrypt($request->ntxtDni);
                $user->created_at = Carbon::now();
                $user->person = $usrPerson->perId;
                $user->save();

            });

            if(is_null($exception)){
                $msg = 'Usuario registrado correctamente';
                $msgId = 200;
                $url = url('custom/usuarios');
            }
            else{
                throw new Exception($exception);
            }

        }catch(Exception $e){
            $msg = "Error: " . $e->getMessage();
            $msgId = 500;
            $url = '';
        }

        return response()->json(compact('msg','msgId','url'));
    }

    public function updateUsuario(Request $request)
    {
        $usuario = User::find($request->pk);

        switch ($request->name){
            case 'username':
                $usuario->name = $request->value;
                break;
            case 'useremail':
                $usuario->email = $request->value;
                break;
        }

        $usuario->save();

        return 'Campo actualizado correctamente';
    }
}
