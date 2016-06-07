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


class UsuarioCMSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return $users;
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

        $user = new User();

        $name = str_random(10);

        $imageName = Request::file('archivo')->getClientOriginalExtension();


        Request::file('archivo')->move(
            base_path() . '/images/admin/', $name.'.'.$imageName
        );


        $user->login = Request::input('login');
        $user->password = Hash::make(Request::input('password'));
        $user->re_password = Request::input('password');
        $user->nombre = Request::input('nombre');
        $user->permisos = Request::input('permisos');
        $user->email = Request::input('email');
        $user->foto =  '/images/admin/'.$name.'.'.$imageName;
        $user->save();

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

        $user = User::find($id);

        $name = str_random(10);

        $imageName = Request::file('archivo')->getClientOriginalExtension();

        Request::file('archivo')->move(
            base_path() . '/images/admin/', $name.'.'.$imageName
        );

        $user->login = Request::input('login');
        $user->password = Hash::make(Request::input('password'));
        $user->re_password = Request::input('password');
        $user->nombre = Request::input('nombre');
        $user->permisos = Request::input('permisos');
        $user->email = Request::input('email');
        $user->foto =  '/images/admin/'.$name.'.'.$imageName;
        $user->save();


        return 'Success';

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return 'Success';
    }


    /**
     * function recovery password.
     *
     * @return \Illuminate\Http\Response
     */

}

