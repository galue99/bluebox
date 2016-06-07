@extends('layout_content')

@section('title', 'BlueBox 3.0')

@section('content')
        <!-- MENU SECUNDIARIO -->
<div ng-controller="SliderCtrl">
    <ul id="s-menu">
        <li><a href="" role="button" data-toggle="modal"  data-ng-click="addSlider()"><i class="fa fa-plus"></i><span>Nuevo</span></a></li>
    </ul>
    <br>
    <br>

    <!-- DESPLIEGUE DE PANELES
        Panel de lista de usuarios admin
     -->
    <div class="text-center" style="padding-left: 15px; padding-right: 15px;">
        <table class="table" data-ng-init="initSlider()" datatable="ng" dt-options="dtOptions" class="table table-hover">
            <thead>
            <th>Titulo</th>
            <th>Texto</th>
            <th>Descripcion</th>
            </thead>
            <tbody>
            <tr data-ng-repeat="slider in sliders">
                <td>@{{slider.titulo}}</td>
                <td>@{{slider.texto}}</td>
                <td>@{{slider.descripcion}}</td>
            </tr>
            </tbody>
        </table>
    </div>



    @endsection

</div>

<div ng-controller="SliderCtrl">
    <script type="text/ng-template" id="myModalContent.html">
        <div class="modal-header">
            <h3 class="modal-title">Agregar Slider</h3>
        </div>
        <div class="modal-body">
            <form name="myForm">
                <div class="form-group" data-ng-class="{ 'has-error' : (userForm.titulo.$invalid || server.response.data.errors.titulo) && submitted }">
                    <label for="inputLinkPp" class="hidden-xs col-sm-3 control-label">Titulo:</label>
                    <div class="input-group col-sm-6 xs-margin">
                        <input type="text" ng-model="titulo" name="titulo" ng-minlength="3" class="form-control" id="inputLinkPp" placeholder="Titulo" required/>
                        <p data-ng-show="userForm.titulo.$error.required && submitted" class="help-block error-message">* Este campo es requerido.</p>
                    </div>
                </div>
                <div class="form-group" data-ng-class="{ 'has-error' : (userForm.descripcion.$invalid || server.response.data.errors.descripcion) && submitted }">
                    <label for="inputLinkPp" class="hidden-xs col-sm-3 control-label">Descripcion:</label>
                    <div class="input-group col-sm-6 xs-margin">
                        <textarea ng-model="descripcion" name="texto" class="form-control" placeholder="Descripcion" required>

                        </textarea>
                        <p data-ng-show="userForm.texto.$error.required && submitted" class="help-block error-message">* Este campo es requerido.</p>
                    </div>
                </div>
                <div class="form-group" data-ng-class="{ 'has-error' : (userForm.texto.$invalid || server.response.data.errors.texto) && submitted }">
                    <label for="inputLinkPp" class="hidden-xs col-sm-3 control-label">Texto:</label>
                    <div class="input-group col-sm-6 xs-margin">
                        <textarea ng-model="texto" name="texto" class="form-control" placeholder="Texto" required >

                        </textarea>
                        <p data-ng-show="userForm.texto.$error.required && submitted" class="help-block error-message">* Este campo es requerido.</p>
                    </div>
                </div>
                <div class="form-group" data-ng-class="{ 'has-error' : (userForm.file.$invalid || server.response.data.errors.titulo) && submitted }">
                    <label for="inputLinkPp" class="hidden-xs col-sm-3 control-label">Archivo:</label>
                    <div class="input-group col-sm-6 xs-margin">
                        <input type="file" ngf-select ng-model="picFile" name="file"
                               accept="image/*" ngf-max-size="2MB" required
                               ngf-model-invalid="errorFile">
                        <p data-ng-show="userForm.file.$error.required && submitted" class="help-block error-message">* Este campo es requerido.</p>
                        <p data-ng-show="userForm.file.$error.maxSize && submitted" class="help-block error-message">* Este campo es requerido.</p>
                    </div>
                </div>
                <div class="form-group" data-ng-class="{ 'has-error' : (userForm.icono.$invalid || server.response.data.errors.icono) && submitted }">
                    <label for="inputLinkPp" class="hidden-xs col-sm-3 control-label">Icono:</label>
                    <div class="input-group col-sm-6 xs-margin">
                        <input type="file" ngf-select ng-model="picFile1" name="file1"
                               accept="image/*" ngf-max-size="2MB" required
                               ngf-model-invalid="errorFile">
                        <p data-ng-show="userForm.icono.$error.required && submitted" class="help-block error-message">* Este campo es requerido.</p>
                        <p data-ng-show="userForm.icono.$error.maxSize && submitted" class="help-block error-message">* Este campo es requerido.</p>
                    </div>
                </div>
                <div class="form-group" data-ng-class="{ 'has-error' : (userForm.thumbs.$invalid || server.response.data.errors.thumbs) && submitted }">
                    <label for="inputLinkPp" class="hidden-xs col-sm-3 control-label">Thumbs:</label>
                    <div class="input-group col-sm-6 xs-margin">
                        <input type="file" ngf-select ng-model="picFile2" name="file2"
                               accept="image/*" ngf-max-size="2MB" required
                               ngf-model-invalid="errorFile">
                        <p data-ng-show="userForm.thumbs.$error.required && submitted" class="help-block error-message">* Este campo es requerido.</p>
                        <p data-ng-show="userForm.thumbs.$error.maxSize && submitted" class="help-block error-message">* Este campo es requerido.</p>
                    </div>
                </div>
                <div class="form-group" data-ng-class="{ 'has-error' : (userForm.nivel.$invalid || server.response.data.errors.nivel) && submitted }">
                    <label for="inputLinkPp" class="hidden-xs col-sm-3 control-label">Nivel:</label>
                    <div class="input-group col-sm-6 xs-margin">
                        <input type="text" ng-model="nivel" name="nivel" ng-minlength="3" class="form-control" id="inputLinkPp" placeholder="Nivel" required/>
                        <p data-ng-show="userForm.nivel.$error.required && submitted" class="help-block error-message">* Este campo es requerido.</p>
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

