<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;


use Auth;
use Illuminate\Support\Facades\Response;
use Validator;
use Redirect;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;


class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View::make('login.login');
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
        $messages = [
            'username.required'   => '*Enter a Username',
            'password.required'   => '*Enter a Password',
        ];

        $rules = [
            'username' => 'required',
            'password' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

   /*     $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);*/

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if (Auth::attempt(['login' => $request['username'], 'password' => $request['password']])) {

            return Redirect::to('/home');
        }

        return redirect('/login')->withErrors([
                'username' => '*Error en usuario o contraseña.',
            ]);




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

    public function logout()
    {
        Auth::logout();
        return Redirect::to('/login');
    }

    public function recovery_password()
    {
        return View::make('login.recovery');
    }

    public function password_recovery(Request $request)
    {
        $email = $request->input('email');
      //  echo $email;

        $user = User::where('email', '=', $email)->first();

        if($user !== NULL)
        {
          /*  Mail::send('', ['user' => $user], function ($m) use ($user) {
                $m->from('', ' BlueBox ');

                $m->to($user->email, $user->name)->subject('Recuperar Contrasena');
            });*/
        }else{

            return Response::json([
                'Success' => [
                    'message' => 'Error',
                    'code' => 400,
                ]
            ], 200);


        }


    }
}
