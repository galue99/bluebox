@extends('layout_content')

@section('title', 'BlueBox 3.0')

@section('content')
        <!-- MENU SECUNDIARIO -->
<div class=""   ng-controller="cmsController">
<ul id="s-menu">
    <li><a href="" data-ng-click="open()"><i class="fa fa-user-plus"></i><span>Usuario</span></a></li>
    <li><a href="" role="button" data-toggle="modal"><i class="fa fa-plus"></i><span>Nuevo</span></a></li>
    <li><a href="" role="button"><i class="fa fa-life-ring" aria-hidden="true" style="background-color: #c8ea9b;"></i><span>Ticket</span></a></li>

</ul>

<!-- DESPLIEGUE DE PANELES
    Panel de lista de usuarios admin
 -->


<div class="text-center" style="padding-left: 15px; padding-right: 15px;">
    <table class="table" data-ng-init="init()" datatable="ng" dt-options="dtOptions" class="table table-hover">
        <thead>
        <th>Username</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Permisos</th>
        <th>Acciones</th>
        </thead>
        <tbody>
            <tr data-ng-repeat="user in users">
                <td>@{{user.login}}</td>
                <td>@{{user.nombre}}</td>
                <td>@{{user.email}}</td>
                <td>@{{user.permisos}}</td>
                <td>
                    <button class="btn btn-warning btn-xs btn-detail" data-ng-click="editUser(user)">Editar</button>
                    <button class="btn btn-danger btn-xs btn-delete" ng-click="deleteUser(user.id)">Eliminar</button>
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
            <h3 class="modal-title">Agregar Usuario</h3>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" name="userForm" novalidate data-ng-cloak>
                <div class="form-group" data-ng-class="{ 'has-error' : (userForm.login.$invalid || server.response.data.errors.login) && submitted }">
                    <label for="inputLinkPp" class="hidden-xs col-sm-3 control-label">Login:</label>
                    <div class="input-group col-sm-6 xs-margin">
                        <input type="text" ng-model="user.login" name="login" ng-minlength="3" class="form-control" id="inputLinkPp" placeholder="Login" required/>
                        <p data-ng-show="userForm.login.$error.required && submitted" class="help-block error-message">* Este campo es requerido.</p>
                    </div>
                </div>
                <div class="form-group" data-ng-class="{ 'has-error' : (userForm.password.$invalid || server.response.data.errors.password) && submitted }">
                    <label for="inputLinkPp" class="hidden-xs col-sm-3 control-label">Password:</label>
                    <div class="input-group col-sm-6 xs-margin">
                        <input type="password" ng-model="user.password" name="password" class="form-control" placeholder="Password" required/>
                        <p data-ng-show="userForm.password.$error.required && submitted" class="help-block error-message">* Este campo es requerido.</p>
                    </div>
                </div>
                <div class="form-group" data-ng-class="{ 'has-error' : (userForm.nombre.$invalid || server.response.data.errors.nombre) && submitted }">
                    <label for="inputLinkPp" class="hidden-xs col-sm-3 control-label">Nombre:</label>
                    <div class="input-group col-sm-6 xs-margin">
                        <input type="text" ng-model="user.nombre" name="nombre" class="form-control" id="inputLinkPp" placeholder="Nombre" required/>
                        <p data-ng-show="userForm.nombre.$error.required && submitted" class="help-block error-message">* Este campo es requerido.</p>
                    </div>
                </div>
                <div class="form-group" data-ng-class="{ 'has-error' : (userForm.permisos.$invalid || server.response.data.errors.permisos) && submitted }">
                    <label for="inputLinkPp" class="hidden-xs col-sm-3 control-label">Permisos:</label>
                    <div class="input-group col-sm-6 xs-margin">
                        <select ng-model="user.permisos" name="permisos" class="form-control" required>
                            <option value="Super Admin">Super Admin</option>
                            <option value="Admin">Admin</option>
                            <option value="Editor">Editor</option>
                        </select>
                        <p data-ng-show="userForm.permisos.$error.required && submitted" class="help-block error-message">* Este campo es requerido.</p>
                    </div>
                </div>
                <div class="form-group" data-ng-class="{ 'has-error' : (userForm.email.$invalid || server.response.data.errors.email) && submitted }">
                    <label for="inputLinkPp" class="hidden-xs col-sm-3 control-label">Email:</label>
                    <div class="input-group col-sm-6 xs-margin">
                        <input type="email" ng-model="user.email" name="email" class="form-control" id="inputLinkPp" placeholder="Email" required/>
                        <p data-ng-show="userForm.email.$error.required && submitted" class="help-block error-message">* Este campo es requerido.</p>
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
            <h3 class="modal-title">Editar Usuario</h3>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" name="userForm" novalidate data-ng-cloak>
                <div class="form-group" data-ng-class="{ 'has-error' : (userForm.login.$invalid || server.response.data.errors.login) && submitted }">
                    <label for="inputLinkPp" class="hidden-xs col-sm-3 control-label">Login:</label>
                    <div class="input-group col-sm-6 xs-margin">
                        <input type="text" ng-model="user.login" name="login" ng-minlength="3" class="form-control" id="inputLinkPp" placeholder="Login" required/>
                        <p data-ng-show="userForm.login.$error.required && submitted" class="help-block error-message">* Este campo es requerido.</p>
                    </div>
                </div>
                <div class="form-group" data-ng-class="{ 'has-error' : (userForm.password.$invalid || server.response.data.errors.password) && submitted }">
                    <label for="inputLinkPp" class="hidden-xs col-sm-3 control-label">Password:</label>
                    <div class="input-group col-sm-6 xs-margin">
                        <input type="password" ng-model="user.re_password" name="password" class="form-control" placeholder="Password" required/>
                        <p data-ng-show="userForm.password.$error.required && submitted" class="help-block error-message">* Este campo es requerido.</p>
                    </div>
                </div>
                <div class="form-group" data-ng-class="{ 'has-error' : (userForm.nombre.$invalid || server.response.data.errors.nombre) && submitted }">
                    <label for="inputLinkPp" class="hidden-xs col-sm-3 control-label">Nombre:</label>
                    <div class="input-group col-sm-6 xs-margin">
                        <input type="text" ng-model="user.nombre" name="nombre" class="form-control" id="inputLinkPp" placeholder="Nombre" required/>
                        <p data-ng-show="userForm.nombre.$error.required && submitted" class="help-block error-message">* Este campo es requerido.</p>
                    </div>
                </div>
                <div class="form-group" data-ng-class="{ 'has-error' : (userForm.permisos.$invalid || server.response.data.errors.permisos) && submitted }">
                    <label for="inputLinkPp" class="hidden-xs col-sm-3 control-label">Permisos:</label>
                    <div class="input-group col-sm-6 xs-margin">
                        <select ng-model="user.permisos" name="permisos" class="form-control" required>
                            <option value="Super Admin">Super Admin</option>
                            <option value="Admin">Admin</option>
                            <option value="Editor">Editor</option>
                        </select>
                        <p data-ng-show="userForm.permisos.$error.required && submitted" class="help-block error-message">* Este campo es requerido.</p>
                    </div>
                </div>
                <div class="form-group" data-ng-class="{ 'has-error' : (userForm.email.$invalid || server.response.data.errors.email) && submitted }">
                    <label for="inputLinkPp" class="hidden-xs col-sm-3 control-label">Email:</label>
                    <div class="input-group col-sm-6 xs-margin">
                        <input type="email" ng-model="user.email" name="email" class="form-control" id="inputLinkPp" placeholder="Email" required/>
                        <p data-ng-show="userForm.email.$error.required && submitted" class="help-block error-message">* Este campo es requerido.</p>
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