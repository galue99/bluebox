@extends('layout_content')

@section('title', 'BlueBox 3.0')

@section('content')
        <!-- MENU SECUNDIARIO -->
<div ng-controller="contactoCtrl">
    <ul id="s-menu">
                <li><a href="" role="button" data-toggle="modal"  data-ng-click="addContacto()"><i class="fa fa-plus" style="background-color: #89c2ea"></i><span>Nuevo</span></a></li>
    </ul>
    <br>
    <br>


    <div class="text-center" style="padding-left: 15px; padding-right: 15px;">
        <table class="table" data-ng-init="initContactos()" datatable="ng" dt-options="dtOptions" class="table table-hover">
            <thead>
            <th>Tipo</th>
            <th>Titulo</th>
            <th>Acciones</th>
            </thead>
            <tbody>
            <tr data-ng-repeat="contacto in contactos">
                <td>@{{contacto.mapa}}</td>
                <td>@{{contacto.contacto}}</td>
                <td>
                    <button class="btn btn-warning btn-xs btn-detail" data-ng-click="editContacto(contacto)">Editar</button>
                    <button class="btn btn-danger btn-xs btn-delete" ng-click="deleteContacto(contacto.id)">Eliminar</button>
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

<div ng-controller="contactoCtrl">
    <script type="text/ng-template" id="myModalContent.html">
        <div class="modal-header">
            <h3 class="modal-title">Agregar Contacto</h3>
        </div>
        <div class="modal-body">
            <form class="" name="userForm" novalidate data-ng-cloak>
                <div class="form-group" data-ng-class="{ 'has-error' : (userForm.mapa.$invalid || server.response.data.errors.mapa) && submitted }">
                    <label for="inputLinkPp" class="">Mapa:</label>
                    <div class="input-group col-sm-12">
                        <textarea ng-model="contacto.mapa" name="mapa" ng-minlength="3" class="form-control" id="inputLinkPp" placeholder="Colocar aquí embedido de google map" required></textarea>
                        <p data-ng-show="userForm.mapa.$error.required && submitted" class="help-block error-message">* Este campo es requerido.</p>
                    </div>
                </div>
                <div class="form-group" data-ng-class="{ 'has-error' : (userForm.contacto.$invalid || server.response.data.errors.contacto) && submitted }">
                    <label for="inputLinkPp" class="">Contacto:</label>
                    <div class="input-group col-sm-12">
                        <textarea data-ui-tinymce id="tinymce1" data-ng-model="contacto.from_one" name="contacto"></textarea>
                        <p data-ng-show="userForm.contacto.$error.required && submitted" class="help-block error-message">* Este campo es requerido.</p>
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


<div ng-controller="contactoCtrl">
    <script type="text/ng-template" id="myModalContent1.html">
        <div class="modal-header">
            <h3 class="modal-title">Editar Contacto</h3>
        </div>
        <div class="modal-body">
            <form class="" name="userForm" novalidate data-ng-cloak>
                <div class="form-group" data-ng-class="{ 'has-error' : (userForm.mapa.$invalid || server.response.data.errors.mapa) && submitted }">
                    <label for="inputLinkPp" class="">Mapa:</label>
                    <div class="input-group col-sm-12">
                        <textarea ng-model="contacto.mapa" name="titulo" ng-minlength="3" class="form-control" id="inputLinkPp" placeholder="Colocar aquí embedido de google map" required></textarea>
                        <p data-ng-show="userForm.mapa.$error.required && submitted" class="help-block error-message">* Este campo es requerido.</p>
                    </div>
                </div>
                <div class="form-group" data-ng-class="{ 'has-error' : (userForm.contacto.$invalid || server.response.data.errors.contacto) && submitted }">
                    <label for="inputLinkPp" class="">Contacto:</label>
                    <div class="input-group col-sm-12">
                        <textarea data-ui-tinymce id="tinymce1" data-ng-model="contacto.from_one" name="contacto"></textarea>
                        <p data-ng-show="userForm.contacto.$error.required && submitted" class="help-block error-message">* Este campo es requerido.</p>
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