@extends('layout_content')

@section('title', 'BlueBox 3.0')

@section('content')
        <!-- MENU SECUNDIARIO -->
<div ng-controller="variablesController">
    <ul id="s-menu">
        <li><a href="" data-ng-click="open()"><i class="fa fa-user-plus"></i><span>Usuario</span></a></li>
        <li><a href="" role="button" data-toggle="modal"  data-ng-click="addVariables()"><i class="fa fa-plus"></i><span>Nuevo</span></a></li>
    </ul>
    <br>
    <br>

    <!-- DESPLIEGUE DE PANELES
        Panel de lista de usuarios admin
     -->
    <div class="text-center" style="padding-left: 15px; padding-right: 15px;">
        <table class="table" data-ng-init="initVariable()" datatable="ng" dt-options="dtOptions" class="table table-hover">
            <thead>
            <th>Nombre</th>
            <th>Valor</th>
            <th>Acciones</th>
            </thead>
            <tbody>
            <tr data-ng-repeat="variable in variables">
                <td>@{{variable.nombre}}</td>
                <td width="70%">@{{variable.valor}}</td>
                <td>
                    <button class="btn btn-warning btn-xs btn-detail" data-ng-click="editVariable(variable)">Editar</button>
                    <button class="btn btn-danger btn-xs btn-delete" ng-click="deleteVariable(variable.id)">Eliminar</button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>



    @endsection

</div>

<div ng-controller="cmsController">
    <script type="text/ng-template" id="myModalContent.html">
        <div class="modal-header">
            <h3 class="modal-title">Agregar Variable</h3>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" name="userForm" novalidate data-ng-cloak>
                <div class="form-group" data-ng-class="{ 'has-error' : (userForm.nombre.$invalid || server.response.data.errors.nombre) && submitted }">
                    <label for="inputLinkPp" class="hidden-xs col-sm-3 control-label">Nombre:</label>
                    <div class="input-group col-sm-6 xs-margin">
                        <input type="text" ng-model="variable.nombre" name="nombre" ng-minlength="3" class="form-control" id="inputLinkPp" placeholder="Nombre" required/>
                        <p data-ng-show="userForm.nombre.$error.required && submitted" class="help-block error-message">* Este campo es requerido.</p>
                    </div>
                </div>
                <div class="form-group" data-ng-class="{ 'has-error' : (userForm.valor.$invalid || server.response.data.errors.valor) && submitted }">
                    <label for="inputLinkPp" class="hidden-xs col-sm-3 control-label">Valor:</label>
                    <div class="input-group col-sm-6 xs-margin">
                        <input type="text" ng-model="variable.valor" name="valor" class="form-control" placeholder="Valor" required/>
                        <p data-ng-show="userForm.valor.$error.required && submitted" class="help-block error-message">* Este campo es requerido.</p>
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

<div ng-controller="cmsController">
    <script type="text/ng-template" id="myModalContent1.html">
        <div class="modal-header">
            <h3 class="modal-title">Editar Variable</h3>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" name="userForm" novalidate data-ng-cloak>
                <div class="form-group" data-ng-class="{ 'has-error' : (userForm.nombre.$invalid || server.response.data.errors.nombre) && submitted }">
                    <label for="inputLinkPp" class="hidden-xs col-sm-3 control-label">Nombre:</label>
                    <div class="input-group col-sm-6 xs-margin">
                        <input type="text" ng-model="variable.nombre" name="nombre" ng-minlength="3" class="form-control" id="inputLinkPp" placeholder="Nombre" required/>
                        <p data-ng-show="userForm.nombre.$error.required && submitted" class="help-block error-message">* Este campo es requerido.</p>
                    </div>
                </div>
                <div class="form-group" data-ng-class="{ 'has-error' : (userForm.valor.$invalid || server.response.data.errors.valor) && submitted }">
                    <label for="inputLinkPp" class="hidden-xs col-sm-3 control-label">Valor:</label>
                    <div class="input-group col-sm-6 xs-margin">
                        <input type="text" ng-model="variable.valor" name="valor" class="form-control" placeholder="Valor" required/>
                        <p data-ng-show="userForm.valor.$error.required && submitted" class="help-block error-message">* Este campo es requerido.</p>
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