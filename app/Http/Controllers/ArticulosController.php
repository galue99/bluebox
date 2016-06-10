<?php

namespace App\Http\Controllers;

use App\Articulo;
use Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use App\Http\Requests;
use Auth;

class ArticulosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articulos = DB::table('publicaciones')
            ->join('tipos', 'tipos.id', '=', 'publicaciones.tipo')
            ->join('categorias', 'categorias.id', '=', 'publicaciones.categoria')
            ->join('subcategorias', 'categorias.id', '=', 'subcategorias.idCategoria')
            ->select('tipos.nombre as tipo_nombre', 'categorias.nombre as nombre_categoria', 'subcategorias.nombre as nombre_subcategorias', 'publicaciones.*')->get();

        return $articulos;
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
        $articulo = new Articulo();
        $name = str_random(10);
        $user = Auth::user();

        $imageName  = Request::file('audio')->getClientOriginalExtension();
        $imageName1 = Request::file('imagen')->getClientOriginalExtension();
        $imageName2 = Request::file('thumbs')->getClientOriginalExtension();


        Request::file('audio')->move(
            base_path() . '/images/admin/', $name.'.'.$imageName
        );

        Request::file('imagen')->move(
            base_path() . '/images/admin/', $name.'.'.$imageName1
        );

        Request::file('thumbs')->move(
            base_path() . '/images/admin/', $name.'.'.$imageName2
        );



        $articulo->titulo = Request::input('titulo');
        $articulo->pie = Request::input('pie');
        $articulo->contenido = Request::input('contenido');
        $articulo->video = Request::input('video');
        $articulo->audio = '/images/admin/'.$name.'.'.$imageName;
        $articulo->thumb = '/images/admin/'.$name.'.'.$imageName2;
        $articulo->imagen =  '/images/admin/'.$name.'.'.$imageName1;
        $articulo->escritor =  $user->id;
        $articulo->save();

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
        return $id;
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


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }


    /**
     * function recovery password.
     *
     * @return \Illuminate\Http\Response
     */
}
