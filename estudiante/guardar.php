<?php
if(!empty($_POST)){
    include_once('../conexion/conexion.php');
    $conn = conexion();
    //DATOS DEL ESTUDIANTE
    $nie = $_POST["estudianteNie"];
    $estudianteNombres = $_POST["estudianteNombres"];
    $estudianteApellidos = $_POST["estudianteApellidos"];
    $foto = $_POST["wizard-picture"];
    $estudianteNacimiento = $_POST["estudianteNacimiento"];
    $estudianteGenero = $_POST["estudianteGenero"];
    $estudianteTelefono = $_POST["estudianteTelefono"];
    $estudianteDireccion=$_POST["estudianteDireccion"];

    //DATOS RESPONSABLE
    $responsableDui=$_POST["responsableDui"];
    $responsableNombres=$_POST["responsableNombres"];
    $responsableApellidos=$_POST["responsableApellidos"];
    $responsableTelefono=$_POST["responsableTelefono"];
    $responsableDireccion=$_POST["responsableDireccion"];

    //conexion
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //GUARDAR ESTUDIANTE
    //verificar si el estudiante ya existe
    $consult = $conn->prepare("SELECT * FROM estudiante where nie = '$nie'");
    $consult->execute();
    $data = $consult->fetch(PDO::FETCH_ASSOC);
    $nieEst = $data['nie'];
    $nieEst;
    if(($nieEst ==  "") or ($nie != $nieEst)){
      include("estudiante.php");
      $sendEst = new estudiante();
      $saveEst = $sendEst->guardar($nie,$estudianteNombres,$estudianteApellidos,$foto,$estudianteNacimiento,$estudianteGenero,$estudianteTelefono,$estudianteDireccion,$responsableDui);
    }else{
      echo "<script> alert('Ya existe el alumno. No puede repetir datos')</script>";
    }

    //GUARDAR RESPONSABLE
    //verificar si el responsable ya existe
    $consultResp = $conn->prepare("SELECT * FROM responsable where dui='$responsableDui'");
    $consultResp->execute();
    $dataResp = $consultResp->fetch(PDO::FETCH_ASSOC);
    $duiR = $dataResp['dui'];
    if(($duiR ==  "") or ($responsableDui != $duiR)){
      include("../responsable/responsable.php");
      $sendResp = new responsable();
      $saveResp = $sendResp->guardar($responsableDui,$responsableNombres,
      $responsableApellidos,$responsableTelefono,$responsableDireccion);
    }else{
      echo "<script> alert('Ya existe el responsable. No puede repetir datos')</script>";
    }
    header("location:mostrar.php");
}else{
  header("location:mostrar.php");
}
?>
