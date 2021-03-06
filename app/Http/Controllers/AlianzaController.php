<?php

namespace App\Http\Controllers;

use App\Alianza;
use Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Response;

class AlianzaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alianzas = Alianza::all();
        return $alianzas;
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
        $alianza = new Alianza();

        $name = str_random(10);

        $imageName = Request::file('archivo')->getClientOriginalExtension();


        Request::file('archivo')->move(
            base_path() . '/images/admin/', $name.'.'.$imageName
        );


        $alianza->titulo = Request::input('titulo');
        $alianza->url =    Request::input('url');
        $alianza->logo =   '/images/admin/'.$name.'.'.$imageName;
        $alianza->save();

        return Response::json([
            'Success' => [
                'message'     => 'Record Save Exits',
                'status_code' => 200
            ]
        ], 200);
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
        $alianza = Alianza::find($id);

        $name = str_random(10);

        $imageName = Request::file('archivo')->getClientOriginalExtension();


        Request::file('archivo')->move(
            base_path() . '/images/admin/', $name.'.'.$imageName
        );


        $alianza->titulo = Request::input('titulo');
        $alianza->url =    Request::input('url');
        $alianza->logo =   '/images/admin/'.$name.'.'.$imageName;
        $alianza->save();

        return Response::json([
            'Success' => [
                'message'     => 'Record Save Exits',
                'status_code' => 200
            ]
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alianza = Alianza::find($id);
        $alianza->delete();

        return 'Success';
    }

}
