@extends('layout_content')

@section('title', 'BlueBox 3.0')

@section('content')
        <!-- MENU SECUNDIARIO -->
<div ng-controller="AlianzasController">
    <ul id="s-menu">
        <li><a href="" role="button" data-toggle="modal" data-ng-click="addAlianza()"><i class="fa fa-plus" style="background-color: #89c2ea"></i><span>Nuevo</span></a></li>
    </ul>
    <br>
    <br>

    <!-- DESPLIEGUE DE PANELES
        Panel de lista de usuarios admin
     -->
    <div class="text-center" style="padding-left: 15px; padding-right: 15px;">
        <table class="table" data-ng-init="initAlianzas()" datatable="ng" dt-options="dtOptions" class="table table-hover">
            <thead>
            <th>Titulo</th>
            <th>Url</th>
            <th>Preview</th>
            <th>Acciones</th>
            </thead>
            <tbody>
            <tr data-ng-repeat="alianza in alianzas">
                <td>@{{alianza.titulo}}</td>
                <td>@{{alianza.URL}}</td>
                <td><img ng-src="@{{alianza.logo}}" alt="" width="80px" height="80px"></td>
                <td>
                    <button class="btn btn-warning btn-xs btn-detail" data-ng-click="editAlianza(alianza)">Editar</button>
                    <button class="btn btn-danger btn-xs btn-delete" ng-click="deleteAlianzas(alianza.id)">Eliminar</button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

    @endsection

</div>

<div ng-controller="AlianzasController">
    <script type="text/ng-template" id="myModalContent.html">
        <div class="modal-header">
            <h3 class="modal-title">Agregar Alianza</h3>
        </div>
        <div class="modal-body">
            <form name="myForm">
                <div class="form-group" data-ng-class="{ 'has-error' : (userForm.titulo.$invalid || server.response.data.errors.titulo) && submitted }">
                    <label for="inputLinkPp" class="hidden-xs col-sm-3 control-label">Titulo:</label>
                    <div class="input-group col-sm-6 xs-margin">
                        <input type="text" ng-model="titulo" name="titulo" ng-minlength="3" class="form-control" id="inputLinkPp" placeholder="Titulo" required/>
                        <p data-ng-show="userForm.titulo.$error.required && submitted" class="help-block error-message">* Este campo es requerido.</p>
                        <p data-ng-show="userForm.titulo.$error.minSize && submitted" class="help-block error-message">* Minimo 3 Caracteres.</p>
                    </div>
                </div>
                <div class="form-group" data-ng-class="{ 'has-error' : (userForm.descripcion.$invalid || server.response.data.errors.descripcion) && submitted }">
                    <label for="inputLinkPp" class="hidden-xs col-sm-3 control-label">Url:</label>
                    <div class="input-group col-sm-6 xs-margin">
                        <textarea ng-model="url" name="texto" class="form-control" placeholder="Url" required>

                        </textarea>
                        <p data-ng-show="userForm.texto.$error.required && submitted" class="help-block error-message">* Este campo es requerido.</p>
                    </div>
                </div>
                <div class="form-group" data-ng-class="{ 'has-error' : (userForm.file.$invalid || server.response.data.errors.file) && submitted }">
                    <label for="inputLinkPp" class="hidden-xs col-sm-3 control-label">Logo:</label>
                    <div class="input-group col-sm-6 xs-margin">
                        <input type="file" ngf-select ng-model="picFile" name="file"
                               accept="image/*" ngf-max-size="2MB" required
                               ngf-model-invalid="errorFile">
                        <p data-ng-show="userForm.file.$error.required && submitted" class="help-block error-message">* Este campo es requerido.</p>
                        <p data-ng-show="userForm.file.$error.maxSize && submitted" class="help-block error-message">* Este campo es requerido.</p>
                    </div>
                </div>
                <button ng-disabled="!myForm.$valid"
                        ng-click="uploadPic(picFile)" class="btn btn-primary">Submit</button>
                    <span class="progress" ng-show="picFile.progress >= 0">
                        <div style="width:@{{picFile.progress}}" ng-bind="picFile.progress + '%'"></div>
                    </span>
                <span ng-show="picFile.result">Upload Successful</span>
                <span class="err" ng-show="errorMsg">@{{errorMsg}}</span>

                <br>
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn btn-warning" type="button" ng-click="cancel()">Cancelar</button>
        </div>
    </script>
</div>

<div ng-controller="AlianzasController">
    <script type="text/ng-template" id="myModalContent1.html">
        <div class="modal-header">
            <h3 class="modal-title">Editar Alianza</h3>
        </div>
        <div class="modal-body">
            <form name="myForm">
                <div class="form-group" data-ng-class="{ 'has-error' : (userForm.titulo.$invalid || server.response.data.errors.titulo) && submitted }">
                    <label for="inputLinkPp" class="hidden-xs col-sm-3 control-label">Titulo:</label>
                    <div class="input-group col-sm-6 xs-margin">
                        <input type="text" ng-model="alianzas.titulo" name="titulo" ng-minlength="3" class="form-control" id="inputLinkPp" placeholder="Titulo" required/>
                        <p data-ng-show="userForm.titulo.$error.required && submitted" class="help-block error-message">* Este campo es requerido.</p>
                        <p data-ng-show="userForm.titulo.$error.minSize && submitted" class="help-block error-message">* Minimo 3 Caracteres.</p>
                    </div>
                </div>
                <div class="form-group" data-ng-class="{ 'has-error' : (userForm.descripcion.$invalid || server.response.data.errors.descripcion) && submitted }">
                    <label for="inputLinkPp" class="hidden-xs col-sm-3 control-label">Url:</label>
                    <div class="input-group col-sm-6 xs-margin">
                        <textarea ng-model="alianzas.URL" name="texto" class="form-control" placeholder="Url" required>

                        </textarea>
                        <p data-ng-show="userForm.texto.$error.required && submitted" class="help-block error-message">* Este campo es requerido.</p>
                    </div>
                </div>
                <div class="form-group" data-ng-class="{ 'has-error' : (userForm.file.$invalid || server.response.data.errors.file) && submitted }">
                    <label for="inputLinkPp" class="hidden-xs col-sm-3 control-label">Logo:</label>
                    <div class="input-group col-sm-6 xs-margin">
                        <input type="file" ngf-select ng-model="picFile" name="file"
                               accept="image/*" ngf-max-size="2MB" required
                               ngf-model-invalid="errorFile">
                        <p data-ng-show="userForm.file.$error.required && submitted" class="help-block error-message">* Este campo es requerido.</p>
                        <p data-ng-show="userForm.file.$error.maxSize && submitted" class="help-block error-message">* Este campo es requerido.</p>
                    </div>
                </div>
                <button ng-disabled="!myForm.$valid"
                        ng-click="uploadPic(picFile)" class="btn btn-primary">Submit</button>
                    <span class="progress" ng-show="picFile.progress >= 0">
                        <div style="width:@{{picFile.progress}}" ng-bind="picFile.progress + '%'"></div>
                    </span>
                <span ng-show="picFile.result">Upload Successful</span>
                <span class="err" ng-show="errorMsg">@{{errorMsg}}</span>

                <br>
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn btn-warning" type="button" ng-click="cancel()">Cancelar</button>
        </div>
    </script>
</div>