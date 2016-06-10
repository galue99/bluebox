@extends('layout_content')

@section('title', 'BlueBox 3.0')

@section('content')
        <!-- MENU SECUNDIARIO -->
<div ng-controller="tiposCtrl">
    <div class="container">
        <h2>Secciones</h2>

    </div>
    <br>


    <!-- DESPLIEGUE DE PANELES
        Panel de lista de usuarios admin
     -->
    <div class="text-center" style="padding-left: 15px; padding-right: 15px;">
        <table class="table" data-ng-init="initTipos()" datatable="ng" dt-options="dtOptions" class="table table-hover">
            <thead>
            <th>Id</th>
            <th>Nombre</th>
            </thead>
            <tbody>
            <tr data-ng-repeat="tipo in tipos">
                <td>@{{tipo.id}}</td>
                <td>@{{tipo.nombre}}</td>
            </tr>
            </tbody>
        </table>
    </div>

    @endsection

</div>
