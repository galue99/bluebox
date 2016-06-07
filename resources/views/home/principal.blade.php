@extends('layout_content')

@section('title', 'BlueBox 3.0')

@section('content')
        <!-- MENU SECUNDIARIO -->
<div>
    <ul id="s-menu">
        <li><a href="" data-ng-click="open()"><i class="fa fa-user-plus"></i><span>Usuario</span></a></li>
        <li><a href="" role="button" data-toggle="modal"  data-ng-click="addVariables()"><i class="fa fa-plus"></i><span>Nuevo</span></a></li>
    </ul>
    <br>
    <br>

    <!-- DESPLIEGUE DE PANELES
        Panel de lista de usuarios admin
     -->



    @endsection

</div>

