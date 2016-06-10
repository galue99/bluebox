@extends('layout_content')

@section('title', 'BlueBox 3.0')

@section('content')
        <!-- MENU SECUNDIARIO -->
<div ng-controller="subcategoriaController">
    <ul id="s-menu">
        <li><a href="" role="button" data-toggle="modal"  data-ng-click="addSubCategoria()"><i class="fa fa-plus" style="background-color: #89c2ea"></i><span>Nuevo</span></a></li>
    </ul>
    <br>
    <br>

    <!-- DESPLIEGUE DE PANELES
        Panel de lista de usuarios admin
     -->
    <div class="text-center" style="padding-left: 15px; padding-right: 15px;">
        <table class="table" data-ng-init="initSubcategorias()" datatable="ng" dt-options="dtOptions" class="table table-hover">
            <thead>
            <th>Seccion</th>
            <th>Categoria</th>
            <th>Subcategoria</th>
            <th>Acciones</th>
            </thead>
            <tbody>
            <tr data-ng-repeat="subcategoria in subcategorias">
                <td>@{{subcategoria.tipo_nombre}}</td>
                <td>@{{subcategoria.categoria_nombre}}</td>
                <td width="70%">@{{subcategoria.nombre}}</td>
                <td>
                    <button class="btn btn-warning btn-xs btn-detail" data-ng-click="editSubCategorias(subcategoria)">Editar</button>
                    <button class="btn btn-danger btn-xs btn-delete" ng-click="deleteSubCategorias(subcategoria.id)">Eliminar</button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>



    @endsection

</div>

<div ng-controller="subcategoriaController">
    <script type="text/ng-template" id="myModalContent.html">
        <div class="modal-header">
            <h3 class="modal-title">Agregar Subcategoria</h3>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" name="userForm" novalidate data-ng-cloak>
                <div class="form-group" data-ng-class="{ 'has-error' : (userForm.categorias.$invalid || server.response.data.errors.categorias) && submitted }">
                    <label for="inputLinkPp" class="hidden-xs col-sm-3 control-label">Categorias:</label>
                    <div class="input-group col-sm-6 xs-margin">
                        <select ng-model="subcategoria.categorias" name="categorias" class="form-control" data-ng-options="a.nombre for a in categorias" required>

                        </select>
                        <p data-ng-show="userForm.categorias.$error.required && submitted" class="help-block error-message">* Este campo es requerido.</p>
                    </div>
                </div>
                <div class="form-group" data-ng-class="{ 'has-error' : (userForm.nombre.$invalid || server.response.data.errors.nombre) && submitted }">
                    <label for="inputLinkPp" class="hidden-xs col-sm-3 control-label">Nombre:</label>
                    <div class="input-group col-sm-6 xs-margin">
                        <input type="text" ng-model="subcategoria.nombre" name="nombre" class="form-control" placeholder="Nombre" required/>
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

<div ng-controller="subcategoriaController">
    <script type="text/ng-template" id="myModalContent1.html">
        <div class="modal-header">
            <h3 class="modal-title">Editar Subcategoria</h3>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" name="userForm" novalidate data-ng-cloak>
                <div class="form-group" data-ng-class="{ 'has-error' : (userForm.categorias.$invalid || server.response.data.errors.categorias) && submitted }">
                    <label for="inputLinkPp" class="hidden-xs col-sm-3 control-label">Categorias:</label>
                    <div class="input-group col-sm-6 xs-margin">
                        <select ng-model="subcategoria.categorias" name="categorias" class="form-control" data-ng-options="a.nombre for a in categorias" required>

                        </select>
                        <p data-ng-show="userForm.categorias.$error.required && submitted" class="help-block error-message">* Este campo es requerido.</p>
                    </div>
                </div>
                <div class="form-group" data-ng-class="{ 'has-error' : (userForm.nombre.$invalid || server.response.data.errors.nombre) && submitted }">
                    <label for="inputLinkPp" class="hidden-xs col-sm-3 control-label">Nombre:</label>
                    <div class="input-group col-sm-6 xs-margin">
                        <input type="text" ng-model="subcategoria.nombre" name="nombre" class="form-control" placeholder="Nombre" required/>
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