<?php
if (!empty($_POST['accion'])) {
	$se = $_POST['selec'];
	if ($se >0){
	if ($se!="") {

		echo $se;
		# code...
	}

}else{
	header("location:index.php?id=error");
}

	# code...
}


?>