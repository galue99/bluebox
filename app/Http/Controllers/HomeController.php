<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Request;
use Mail;

use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Validator;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View::make('home.home');
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


    /**
     * function recovery password.
     *
     * @return \Illuminate\Http\Response
     */

    public function variables()
    {
        return View::make('home.variables');
    }

    public function slider()
    {
        return View::make('home.slider');
    }

    public function usuarios()
    {
        return View::make('home.index');
    }

    public function alianzas()
    {
        return View::make('home.alianza');
    }

    public function principal()
    {
        return View::make('home.principal');
    }

    public function secciones()
    {
        return View::make('home.secciones');
    }

    public function articulo()
    {
        return View::make('home.articulo');
    }

    public function contacto()
    {
        return View::make('home.contacto');
    }

    public function categorias()
    {
        return View::make('home.categoria');
    }

    public function subcategoria()
    {
        return View::make('home.subcategorias');
    }

}

