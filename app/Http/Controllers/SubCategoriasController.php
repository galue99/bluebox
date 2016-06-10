<?php

namespace App\Http\Controllers;


use App\SubCategoria;
use Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

use App\Http\Requests;

class SubCategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategorias = DB::table('subcategorias')
            ->join('categorias', 'subcategorias.idCategoria', '=', 'categorias.id')
            ->join('tipos', 'tipos.id', '=', 'categorias.tipo')
            ->select('tipos.nombre as tipo_nombre', 'categorias.nombre as categoria_nombre', 'subcategorias.*')->get();

        return $subcategorias;
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
        $subcategoria = new SubCategoria();

        $subcategoria->idCategoria   = Request::input('categoria');
        $subcategoria->nombre =    Request::input('nombre');

        $subcategoria->save();

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
        $subcategoria = SubCategoria::find($id);

        $subcategoria->idCategoria   = Request::input('tipo');
        $subcategoria->nombre =    Request::input('nombre');

        $subcategoria->save();

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
        $subcategoria = SubCategoria::find($id);
        $subcategoria->delete();

        return 'Success';
    }
}
