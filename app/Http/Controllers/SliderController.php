<?php

namespace App\Http\Controllers;
use App\Slider;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();

        return $sliders;
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

        $slider = new Slider();

        $titulo = $request->input('titulo');
        $texto = $request->input('texto');
        $descripcion = $request->input('descripcion');
        $nivel = $request->input('nivel');

        $name = str_random(10);

        $imageName = $request->file('archivo')->getClientOriginalExtension();
        $imageName1 = $request->file('icono')->getClientOriginalExtension();
        $imageName2 = $request->file('thumbs')->getClientOriginalExtension();

        $request->file('archivo')->move(
            base_path() . '/public/images/admin/', $name.'.'.$imageName
        );
        $request->file('icono')->move(
            base_path() . '/public/images/admin/', $name.'1.'.$imageName1
        );
        $request->file('thumbs')->move(
            base_path() . '/public/images/admin/', $name.'2.'.$imageName2
        );

        $slider->titulo = $titulo;
        $slider->descripcion = $descripcion;
        $slider->texto = $texto;
        $slider->nivel = $nivel;
        $slider->archivo = '/public/images/admin/'.$name.'.'.$imageName;
        $slider->icono = '/public/images/admin/'.$name.'1.'.$imageName;
        $slider->thumb = '/public/images/admin/'.$name.'2.'.$imageName;
        $slider->save();


       // $logo->url = '/images/logo/'.$imageName;

        //var_dump($file);
        return 'Success';
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
