<?php

namespace App\Http\Controllers;

use App\Categoria;
use Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use App\Http\Requests;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = DB::table('categorias')
            ->join('tipos', 'tipos.id', '=', 'categorias.tipo')
            ->select('tipos.nombre as tipo_nombre', 'categorias.*')->get();

        return $categorias;
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
        $categoria = new Categoria();

        $categoria->tipo   = Request::input('tipo');
        $categoria->nombre =    Request::input('nombre');

        $categoria->save();

        return Response::json([
            'Success' => [
                'message'     => 'Record Save Exits',
                'status_code' => 200
            ]
        ], 200);
    }

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
        $categoria = Categoria::find($id);

        $categoria->tipo = Request::input('tipo');
        $categoria->nombre =    Request::input('nombre');

        $categoria->save();

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
        $categoria = Categoria::find($id);
        $categoria->delete();

        return 'Success';
    }
}
