<?php

namespace App\Http\Controllers\Inet;

use App\Models\Evento;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class eventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventos = Evento::all();
        $data = array();

        foreach ($eventos as $evt){

            if(is_null($evt->evtPathIcon)){
                $pathIcon = null;
            }
            else{
                $pathIcon = asset('/storage/' . $evt->evtPathIcon);
            }

            $data[] = array(
                'id' => $evt->evtId,
                'title' => $evt->evtTitle,
                'start' => $evt->evtStartdate,
                'end' => $evt->evtEnddate,
                'hnat' => $evt->evtNational,
                'hloc' => $evt->evtLocal,
                'imageurl' => $pathIcon,
                'type' => $evt->evtTipo
            );
        }
        return response()->json($data);
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
        //
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
