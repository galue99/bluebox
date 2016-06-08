@extends('layout_content')

@section('title', 'BlueBox 3.0')

@section('content')
        <!-- MENU SECUNDIARIO -->
<div ng-controller="principalCtrl">
    <ul id="s-menu">
        <li><a href="" role="button" data-toggle="modal"  data-ng-click="addPrincipal()"><i class="fa fa-plus" style="background-color: #89c2ea"></i><span>Nuevo</span></a></li>
    </ul>
    <br>
    <br>


    <div class="text-center" style="padding-left: 15px; padding-right: 15px;">
        <table class="table" data-ng-init="initPrincipals()" datatable="ng" dt-options="dtOptions" class="table table-hover">
            <thead>
            <th>Titulo</th>
            <th>Texto</th>

            <th>Acciones</th>
            </thead>
            <tbody>
            <tr data-ng-repeat="principal in principals">
                <td>@{{principal.titulo}}</td>
                <td>@{{principal.texto}}</td>
                <td>
                    <button class="btn btn-warning btn-xs btn-detail" data-ng-click="editPrincipals(principal)">Editar</button>
                    <button class="btn btn-danger btn-xs btn-delete" ng-click="deletePrincipals(principal.id)">Eliminar</button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

    <!-- DESPLIEGUE DE PANELES
        Panel de lista de usuarios admin
     -->



    @endsection

</div>

<div ng-controller="principalCtrl">
    <script type="text/ng-template" id="myModalContent.html">
        <div class="modal-header">
            <h3 class="modal-title">Agregar Pagina Principal</h3>
        </div>
        <div class="modal-body">
            <form class="" name="userForm" novalidate data-ng-cloak>
                <div class="form-group" data-ng-class="{ 'has-error' : (userForm.titulo.$invalid || server.response.data.errors.titulo) && submitted }">
                    <label for="inputLinkPp" class="">Titulo:</label>
                    <div class="input-group col-sm-12">
                        <input type="text" ng-model="principal.titulo" name="titulo" ng-minlength="3" class="form-control" id="inputLinkPp" placeholder="Titulo" required/>
                        <p data-ng-show="userForm.titulo.$error.required && submitted" class="help-block error-message">* Este campo es requerido.</p>
                    </div>
                </div>
                <div class="form-group" data-ng-class="{ 'has-error' : (userForm.texto.$invalid || server.response.data.errors.valor) && submitted }">
                    <label for="inputLinkPp" class="">Texto:</label>
                    <div class="input-group col-sm-12">
                        <textarea data-ui-tinymce id="tinymce1" data-ng-model="principal.from_one" name="texto"></textarea>
                        <p data-ng-show="userForm.texto.$error.required && submitted" class="help-block error-message">* Este campo es requerido.</p>
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


<div ng-controller="principalCtrl">
    <script type="text/ng-template" id="myModalContent.html">
        <div class="modal-header">
            <h3 class="modal-title">Editar Pagina Principal</h3>
        </div>
        <div class="modal-body">
            <form class="" name="userForm" novalidate data-ng-cloak>
                <div class="form-group" data-ng-class="{ 'has-error' : (userForm.titulo.$invalid || server.response.data.errors.titulo) && submitted }">
                    <label for="inputLinkPp" class="">Titulo:</label>
                    <div class="input-group col-sm-12">
                        <input type="text" ng-model="principal.titulo" name="titulo" ng-minlength="3" class="form-control" id="inputLinkPp" placeholder="Titulo" required/>
                        <p data-ng-show="userForm.titulo.$error.required && submitted" class="help-block error-message">* Este campo es requerido.</p>
                    </div>
                </div>
                <div class="form-group" data-ng-class="{ 'has-error' : (userForm.texto.$invalid || server.response.data.errors.valor) && submitted }">
                    <label for="inputLinkPp" class="">Texto:</label>
                    <div class="input-group col-sm-12">
                        <textarea data-ui-tinymce id="tinymce1" data-ng-model="principal.from_one" name="texto"></textarea>
                        <p data-ng-show="userForm.texto.$error.required && submitted" class="help-block error-message">* Este campo es requerido.</p>
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