	<?php
	echo'<script>';
	echo'var pBar = document.getElementById("p");
		 var updateProgress = function(value)
		 {
		 	pBar.value = value;
		 	pBar.getElementByTagName("span")[0].innerHTML = Math.floor((100 / 70) * value);
		 }';
	echo"</script>";
		 ?>

<?php
//Funcion que contiene el enlace a la base de datos.
function conexion(){
	$conn = null;
	$host = 'localhost';
	$db = 'registroacademico';
	$user = 'root';
	$pwd = '';
	
try{
	$conn = new PDO('mysql:host='.$host.'; dbname='.$db,$user,$pwd);
	//echo 'Conexion satisfactoria.<br>';
	
}catch(PDOException $e){
	echo "<style='background-color:lightgrey'>

	";
	echo"<hr>";
	echo '<br><center><h1 style="font-size:300%"><p><font color="red">¡¡No se puede conectar con la base de datos!!</font></p></h1>';
	echo"<embed src='../img/cad.png' heigth='50' width='50'></embed><br><br><progress id='p' max='70'> <span>0</span>%</progress><br>";
	echo"<hr width='80%' color='black' size='8' /></center>";
	echo"<p>Posibles causas:</p>
		<ol>
			<li>Conexión con el servidor pérdida. </li>
			<li>Base de datos no encontrada. </li>
			<li>Conexión expirada. </li>
			<li>La base de datos fue removida. </li>
		</ol>"
		;


	echo "<center><h2 style='color:green'>Vuelva a intentarlo otro momento</h2></center>";
exit();
	
}
return $conn;
	
}
//conexion();

?>
