<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <link rel="apple-touch-icon" sizes="76x76" href="assets/img/favicon.ico">
        <title>Registro de estudiante</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />
        <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
        <link rel="icon" type="image/png" href="assets/img/favicon.png" />
        <!--     Fonts and icons     -->
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
        <!-- CSS Files -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="assets/css/material-bootstrap-wizard.css" rel="stylesheet" />
        <!-- CSS Just for demo purpose, don't include it in your project -->
        <link href="assets/css/demo.css" rel="stylesheet" />
    </head>
    <body>
        <div class="image-container set-full-height" style="background-image: url('assets/img/wizard-profile.png')">
            <div class="logo-container">
                    <div class="brand">
                        <a href="mostrar.php" class="btn btn-danger">
                            <i class="fa fa-arrow-left" ></i>&nbsp;&nbsp;<span class="tooltips" data-placement="left" data-original-title="Regresar">Cancelar</span>
                        </a>
                    </div>
                </div>

            <!--   Creative Tim Branding   -->
            <!--a href="https://www.youtube.com/channel/UC9XUZKjY8JL9H-BEeFhZicA">
                <div class="logo-container">
                    <div class="logo">
                        <img src="assets/img/new_logo.png">
                    </div>
                    <div class="brand">
                        RojeruSan
                    </div>
                </div>
            </a-->
            <!--   Big container   -->
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <!--      Wizard container        -->
                        <div class="wizard-container">
                            <div class="card wizard-card" data-color="green" id="wizardProfile">
                                <form action="guardar.php" method="POST">
                                    <!--        You can switch " data-color="purple" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->

                                    <div class="wizard-header">
                                        <h3 class="wizard-title">
                                            Registro de Estudiante
                                        </h3>
                                        <h5>Esta información nos dejará saber más sobre cada estudiante.</h5>
                                    </div>
                                    <div class="wizard-navigation">
                                        <ul>
                                            <li><a href="#Estudiante" data-toggle="tab">Estudiante</a></li>
                                            <li><a href="#Responsable" data-toggle="tab">Responsable</a></li>
                                        </ul>
                                    </div>
                                    <div class="tab-content">
                                        <!-- Formulario Estudiante -->
                                        <div class="tab-pane" id="Estudiante">
                                            <div class="row">
                                                <h4 class="info-text"> Información básica del estudiante</h4>
                                                <div class="col-sm-4 col-sm-offset-1">
                                                    <div class="picture-container">
                                                        <div class="picture">
                                                            <img src="assets/img/default-avatar.png" class="picture-src" id="wizardPicturePreview" title=""/>
                                                            <input type="file" id="wizard-picture" name="wizard-picture">
                                                        </div>
                                                        <h6>ELEGIR LA FOTO</h6>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">face</i>
                                                        </span>
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">NIE <small>(*)</small></label>
                                                            <input name="estudianteNie" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">face</i>
                                                        </span>
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Nombres <small>(*)</small></label>
                                                            <input name="estudianteNombres" type="text" class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">record_voice_over</i>
                                                        </span>
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Apellidos <small>(*)</small></label>
                                                            <input name="estudianteApellidos" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-5 col-sm-offset-1">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Fecha de Nacimiento (Según Partida)</label><br>
                                                        <input type="date" class="form-control" name="estudianteNacimiento">
                                                    </div>
                                                </div>
                                                <div class="col-sm-5">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Género</label>
                                                        <select name="estudianteGenero" class="form-control">
                                                            <option disabled="" selected=""></option>
                                                            <option value="M"> Masculino </option>
                                                            <option value="F"> Femenino </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-5 col-sm-offset-1">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Teléfono</label>
                                                        <input type="text" class="form-control" name="estudianteTelefono">
                                                    </div>
                                                </div>
                                                <div class="col-sm-10 col-sm-offset-1">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Dirección <small>(*)</small></label>
                                                            <input name="estudianteDireccion" type="text" class="form-control">
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Formulario Responsable -->
                                        <div class="tab-pane" id="Responsable">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <h4 class="info-text"> Completar el formulario con los datos del responsable </h4>
                                                </div>
                                                <div class="col-sm-5 col-sm-offset-1">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">DUI</label>
                                                        <input type="text" class="form-control" name="responsableDui">
                                                    </div>
                                                </div>
                                                <div class="col-sm-5 col-sm-offset-1">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Nombres del responsable</label>
                                                        <input type="text" class="form-control" name="responsableNombres">
                                                    </div>
                                                </div>
                                                <div class="col-sm-5 col-sm-offset-1">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Apellidos del responsable</label>
                                                        <input type="text" class="form-control" name="responsableApellidos">
                                                    </div>
                                                </div>
                                                <div class="col-sm-5 col-sm-offset-1">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Teléfono</label>
                                                        <input type="text" class="form-control" name="responsableTelefono">
                                                    </div>
                                                </div>
                                                <div class="col-sm-10 col-sm-offset-1">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Dirección</label>
                                                        <input type="text" class="form-control" name="responsableDireccion">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wizard-footer">
                                        <div class="pull-right">
                                            <input type='button' class='btn btn-next btn-fill btn-success btn-wd' name='next' value='Siguiente' />
                                            <input type='submit' class='btn btn-finish btn-fill btn-success btn-wd' name='finish' value='Terminar' />
                                        </div>

                                        <div class="pull-left">
                                            <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Anterior' />
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </form>
                            </div>
                        </div> <!-- wizard container -->
                    </div>
                </div><!-- end row -->
            </div> <!--  big container -->
        </div>
    </body>
    <!--   Core JS Files   -->
    <script src="assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/js/jquery.bootstrap.js" type="text/javascript"></script>
    <!--  Plugin for the Wizard -->
    <script src="assets/js/material-bootstrap-wizard.js"></script>
    <!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
    <script src="assets/js/jquery.validate.min.js"></script>
</html>
<script type="text/javascript">
    //Consultar datos del padre
    function Padre() {
        var padreDui=$('#padreDui').val();
        if(padreDui.length==9){
                alert("prueba");
                $.ajax({
                    type:"POST",
                    url:"consultarPadre.php",
                    dataType: "json",
                    data:{padreDui:padreDui},
                    success:function(data){
                        if(data.status=="ok"){
                            $('#padreNombres').text(data.result.nombres);
                            $('#padreApellidos').text(data.result.apellidos);
                        }else{
                            alert("Padre no registrado!");
                        }
                    }
                });
                return false;
        }
    }
    //Cargar datos
    /*window.onload=function(){
    Cargar();
    }
    //Envío de datos
    $(document).ready(function(){
        //Al dar click
        $('#btnenviar').click(function(){
            //Comprobando si escribio un mensaje
            if($('#mensaje').val()!=''){
                var datos=$('#frmchat').serialize();
                $.ajax({
                    type:"POST",
                    url:"registrar.php",
                    data:datos,
                    success:function(r){
                        if(r==1){
                            $('#mensaje').val('');
                            $('#mensaje').focus();
                            Cargar();
                        }else{
                            alert("Error!!!");
                        }
                    }
                });
                return false;
            }
        });
    });*/
    //Cargar datos en div
    /*function Cargar(){
        $('#datagrid').load('consultar.php');
    }*/
    //Actualizar mensajes
    //var auto_refresh = setInterval( function() { $('#datagrid').load('consultar.php').fadeIn("slow"); }, 5000); // refreshing after every 15000 milliseconds
</script>
