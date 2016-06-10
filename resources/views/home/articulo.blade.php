@extends('layout_content')

@section('title', 'BlueBox 3.0')

@section('content')
        <!-- MENU SECUNDIARIO -->
<div ng-controller="articuloCtrl">
    <ul id="s-menu">
        <li><a href="" role="button" data-toggle="modal"  data-ng-click="addArticulos()"><i class="fa fa-plus" style="background-color: #89c2ea"></i><span>Nuevo</span></a></li>
    </ul>
    <br>
    <br>


    <div class="text-center" style="padding-left: 15px; padding-right: 15px;">
        <table class="table" data-ng-init="initArticulos()" datatable="ng" dt-options="dtOptions" class="table table-hover">
            <thead>
            <th>Seccion</th>
            <th>Categoria</th>
            <th>SubCategoria</th>
            <th>Titulo</th>
            <th>Acciones</th>
            </thead>
            <tbody>
            <tr data-ng-repeat="articulo in articulos">
                <td>@{{articulo.tipo_nombre}}</td>
                <td>@{{articulo.nombre_categoria}}</td>
                <td>@{{articulo.nombre_subcategorias}}</td>
                <td>@{{articulo.titulo}}</td>

                <td>
                    <button class="btn btn-info btn-xs btn-info" data-ng-click="detailsArticulo(articulo.id)">Detalles</button>
                    <button class="btn btn-warning btn-xs btn-detail" data-ng-click="editArticulo(articulo)">Editar</button>
                    <button class="btn btn-danger btn-xs btn-delete" ng-click="deleteArticulo(articulo.id)">Eliminar</button>
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

<div ng-controller="articuloCtrl">
    <script type="text/ng-template" id="myModalContent.html">
        <div class="modal-header">
            <h3 class="modal-title">Agregar Categoria</h3>
        </div>
        <div class="modal-body">
            <form name="myForm">
                <div class="form-group" data-ng-class="{ 'has-error' : (userForm.titulo.$invalid || server.response.data.errors.titulo) && submitted }">
                    <label for="inputLinkPp" class="hidden-xs col-sm-3 control-label">Titulo:</label>
                    <div class="input-group col-sm-9 xs-margin">
                        <input type="text" ng-model="titulo" name="titulo" ng-minlength="3" class="form-control" id="inputLinkPp" placeholder="Titulo" required/>
                        <p data-ng-show="userForm.titulo.$error.required && submitted" class="help-block error-message">* Este campo es requerido.</p>
                    </div>
                </div>
                <div class="form-group" data-ng-class="{ 'has-error' : (userForm.descripcion.$invalid || server.response.data.errors.descripcion) && submitted }">
                    <label for="inputLinkPp" class="hidden-xs col-sm-3 control-label">Pie:</label>
                    <div class="input-group col-sm-9 xs-margin">
                        <textarea ng-model="texto" name="texto" class="form-control" placeholder="Descripcion" required>

                        </textarea>
                        <p data-ng-show="userForm.texto.$error.required && submitted" class="help-block error-message">* Este campo es requerido.</p>
                    </div>
                </div>
                <div class="form-group" data-ng-class="{ 'has-error' : (userForm.texto.$invalid || server.response.data.errors.texto) && submitted }">
                    <label for="inputLinkPp" class="hidden-xs col-sm-3 control-label">Contenido:</label>
                    <div class="input-group col-sm-9 xs-margin">
                        <textarea data-ui-tinymce id="tinymce1" data-ng-model="from_one" name="contenido" class="form-control" placeholder="Contenido" required >

                        </textarea>
                        <p data-ng-show="userForm.texto.$error.required && submitted" class="help-block error-message">* Este campo es requerido.</p>
                    </div>
                </div>
                <div class="form-group" data-ng-class="{ 'has-error' : (userForm.file.$invalid || server.response.data.errors.file) && submitted }">
                    <label for="inputLinkPp" class="hidden-xs col-sm-3 control-label">Imagen:</label>
                    <div class="input-group col-sm-9 xs-margin">
                        <input type="file" ngf-select ng-model="picFile" name="file"
                               accept="image/*" ngf-max-size="2MB" required
                               ngf-model-invalid="errorFile">
                        <p data-ng-show="userForm.file.$error.required && submitted" class="help-block error-message">* Este campo es requerido.</p>
                        <p data-ng-show="userForm.file.$error.maxSize && submitted" class="help-block error-message">* Este campo es requerido.</p>
                    </div>
                </div>
                <div class="form-group" data-ng-class="{ 'has-error' : (userForm.file1.$invalid || server.response.data.errors.file1) && submitted }">
                    <label for="inputLinkPp" class="hidden-xs col-sm-3 control-label">Audio:</label>
                    <div class="input-group col-sm-6 xs-margin">
                        <input type="file" ngf-select ng-model="picFile1" name="file1"
                               accept="audio/*" ngf-max-size="2MB" required
                               ngf-model-invalid="errorFile">
                        <p data-ng-show="userForm.file1.$error.required && submitted" class="help-block error-message">* Este campo es requerido.</p>
                        <p data-ng-show="userForm.file1.$error.maxSize && submitted" class="help-block error-message">* Este campo es requerido.</p>
                    </div>
                </div>
                <div class="form-group" data-ng-class="{ 'has-error' : (userForm.file2.$invalid || server.response.data.errors.file2) && submitted }">
                    <label for="inputLinkPp" class="hidden-xs col-sm-3 control-label">Thumbs:</label>
                    <div class="input-group col-sm-6 xs-margin">
                        <input type="file" ngf-select ng-model="picFile2" name="file2"
                               accept="image/*" ngf-max-size="2MB" required
                               ngf-model-invalid="errorFile">
                        <p data-ng-show="userForm.file2.$error.required && submitted" class="help-block error-message">* Este campo es requerido.</p>
                        <p data-ng-show="userForm.file2.$error.maxSize && submitted" class="help-block error-message">* Este campo es requerido.</p>
                    </div>
                </div>
                <div class="form-group" data-ng-class="{ 'has-error' : (userForm.video.$invalid || server.response.data.errors.video) && submitted }">
                    <label for="inputLinkPp" class="hidden-xs col-sm-3 control-label">Video:</label>
                    <div class="input-group col-sm-9 xs-margin">
                        <textarea ng-model="video" name="video" class="form-control" id="inputLinkPp" placeholder="Código del Embedido" required></textarea>
                        <p data-ng-show="userForm.video.$error.required && submitted" class="help-block error-message">* Este campo es requerido.</p>
                    </div>
                </div>
                <div class="form-group" data-ng-class="{ 'has-error' : (userForm.option.$invalid || server.response.data.errors.option) && submitted }">
                    <label for="inputLinkPp" class="hidden-xs col-sm-3 control-label">Status:</label>
                    <div class="input-group col-sm-9 xs-margin">
                        <select name="option" ng-model="status" id="" class="form-control">
                            <option value="1">Activo</option>
                            <option value="2">Inactivo</option>
                        </select>
                        <p data-ng-show="userForm.option.$error.required && submitted" class="help-block error-message">* Este campo es requerido.</p>
                    </div>
                </div>

                <button ng-disabled="!myForm.$valid"
                        ng-click="uploadPic(picFile,picFile1,picFile2)" class="btn btn-primary">Submit</button>
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

<div ng-controller="articuloCtrl">
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