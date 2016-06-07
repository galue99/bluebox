@extends('layout_login')

@section('title', 'BlueBox 3.0')

@section('content')
    <form id="login" method="POST" action="/login">
        {!! csrf_field() !!}
        <div><img src="images/bluebox-logo-white.svg" /></div>

        <div>
        @if (count($errors) > 0)
            <ul style="background-color: darkred; color: white;">
                @foreach ($errors->all() as $error)
                    <li>{!! $error !!}</li>
                @endforeach
            </ul>
        @endif
        </div>

        <p>
            <i class="fa fa-user"></i><input type="text" name="username" placeholder="Usuario"  autocomplete="off" autocorrect="off" auto capitalize="off" spellcheck="false" value="{!! old('username') !!}"/> </p>
        <p><i class="fa fa-key"></i><input type="password" name="password" placeholder="Contrase&ntilde;a" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" value="{!! old('password') !!}" /></p>
        <div><input type="checkbox" id="showpass">
            <label for="showpass">Mostrar Contrase&ntilde;a</label>
            <input type="submit" value="Conectar">
        </div>
        <a href="{{ URL::to('/recovery_password') }}">&iquest;Olvid&oacute; contrase&ntilde;a?</a>
    </form>
@endsection