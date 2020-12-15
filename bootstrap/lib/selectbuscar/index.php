<!DOCTYPE html>
<html>
<head>
	<title>selct</title>
	  <script src="jquery-1.11.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../cerritopanoramico\bootstrap\css/bootstrap.min.css">
    
    <script src="core.js"></script>
    <!-- core js files -->



    <link rel="stylesheet" href="chosen.css">
    <script src="chosen.jquery.min.js"></script>

</head>
<body>
<div class="container">
<br><hr>
<form action="recibir.php" method="post">


<select name="selec" style=" height: 300%;width: 25%" class="select form-control" onchange="if(this.value ==0){}else if(this.value > 0){alert('Ha seleccionado un registro')};">
<option value="0">Seleccione</option>
     <option value="1">flores</option>
     <option value="2">Value 2</option>
     <option value="3">Darwin Flores</option>
     <option value="4">Jose Alexander ramirez mendoza</option>
     
     
                                                
                                                    

                                                    
                                              
           </select>

           <input type="submit" name="accion" class="btn btn-primary" value="enviame">
	
</form>

</div>
</body>
</html>