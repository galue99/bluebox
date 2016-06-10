@extends('layout_content')

@section('title', 'BlueBox 3.0')

@section('content')
        <!-- MENU SECUNDIARIO -->
<div ng-controller="categoriaController">
    <ul id="s-menu">
        <li><a href="" role="button" data-toggle="modal"  data-ng-click="addCategoria()"><i class="fa fa-plus"></i><span>Nuevo</span></a></li>
    </ul>
    <br>
    <br>

    <!-- DESPLIEGUE DE PANELES
        Panel de lista de usuarios admin
     -->
    <div class="text-center" style="padding-left: 15px; padding-right: 15px;">
        <table class="table" data-ng-init="initCategorias()" datatable="ng" dt-options="dtOptions" class="table table-hover">
            <thead>
            <th>Tipo</th>
            <th>Nombre</th>
            <th>Acciones</th>
            </thead>
            <tbody>
            <tr data-ng-repeat="categoria in categorias">
                <td>@{{categoria.tipo_nombre}}</td>
                <td>@{{categoria.nombre}}</td>
                <td>
                    <button class="btn btn-warning btn-xs btn-detail" data-ng-click="editCategorias(categoria)">Editar</button>
                    <button class="btn btn-danger btn-xs btn-delete" ng-click="deleteCategorias(categoria.id)">Eliminar</button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

    @endsection

</div>

<div ng-controller="categoriaController">
    <script type="text/ng-template" id="myModalContent.html">
        <div class="modal-header">
            <h3 class="modal-title">Agregar Categoria</h3>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" name="userForm" novalidate data-ng-cloak>
                <div class="form-group" data-ng-class="{ 'has-error' : (userForm.seccion.$invalid || server.response.data.errors.seccion) && submitted }">
                    <label for="inputLinkPp" class="hidden-xs col-sm-3 control-label">Seccion:</label>
                    <div class="input-group col-sm-6 xs-margin">
                        <select ng-model="categoria.seccion" name="seccion" class="form-control" data-ng-options="a.nombre for a in tipos" required>

                        </select>
                        <p data-ng-show="userForm.seccion.$error.required && submitted" class="help-block error-message">* Este campo es requerido.</p>
                    </div>
                </div>
                <div class="form-group" data-ng-class="{ 'has-error' : (userForm.nombre.$invalid || server.response.data.errors.nombre) && submitted }">
                    <label for="inputLinkPp" class="hidden-xs col-sm-3 control-label">Nombre:</label>
                    <div class="input-group col-sm-6 xs-margin">
                        <input type="text" ng-model="categoria.nombre" name="nombre" class="form-control" placeholder="Nombre" required/>
                        <p data-ng-show="userForm.nombre.$error.required && submitted" class="help-block error-message">* Este campo es requerido.</p>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary" type="submit" ng-click="save(userForm)">Guardar</button>
            <button class="btn btn-warning" type="button" ng-click="cancel()">Cancelar</button>
        </div>
    </script>
</div>

<div ng-controller="categoriaController">
    <script type="text/ng-template" id="myModalContent1.html">
        <div class="modal-header">
            <h3 class="modal-title">Editar Categoria</h3>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" name="userForm" novalidate data-ng-cloak>
                <div class="form-group" data-ng-class="{ 'has-error' : (userForm.seccion.$invalid || server.response.data.errors.seccion) && submitted }">
                    <label for="inputLinkPp" class="hidden-xs col-sm-3 control-label">Seccion:</label>
                    <div class="input-group col-sm-6 xs-margin">
                        <select ng-model="categoria.seccion" name="seccion" class="form-control" data-ng-options="a.nombre for a in tipos" required>

                        </select>
                        <p data-ng-show="userForm.seccion.$error.required && submitted" class="help-block error-message">* Este campo es requerido.</p>
                    </div>
                </div>
                <div class="form-group" data-ng-class="{ 'has-error' : (userForm.nombre.$invalid || server.response.data.errors.nombre) && submitted }">
                    <label for="inputLinkPp" class="hidden-xs col-sm-3 control-label">Nombre:</label>
                    <div class="input-group col-sm-6 xs-margin">
                        <input type="text" ng-model="categoria.nombre" name="nombre" class="form-control" placeholder="Nombre" required/>
                        <p data-ng-show="userForm.nombre.$error.required && submitted" class="help-block error-message">* Este campo es requerido.</p>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary" type="submit" ng-click="edit(userForm)">Guardar</button>
            <button class="btn btn-warning" type="button" ng-click="cancel()">Cancelar</button>
        </div>
    </script>
</div>