<?php
  include("../security/seguridad-secundary.php");

  $connection = conexion();
  $sql = "SELECT ebooks.*, categoria.nombre as ncategoria, editorial.nombre as neditorial, autor.nombre as nautor FROM ebooks INNER JOIN categoria ON ebooks.idcategoria=categoria.idcategoria INNER JOIN editorial ON ebooks.ideditorial=editorial.ideditorial INNER JOIN autor ON ebooks.idautor=autor.idautor WHERE ebooks.estado='Activo'";

  $query = $connection->prepare($sql);
  $query->execute();
  $rowcount = $query->rowcount();
  $model = array();
  while($rows = $query->fetch())
  {
      $model[] = $rows;
  }
?>

<div class="form-panel"><hr>
    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-6"><h2>EBooks</h2></div>
        <div class="col-xs-6"><h2>Los más vístos</h2></div>
      </div>
      <div class="row">
        <div class="col-xs-6">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->              
              <ol class="carousel-indicators">
                <?php 
                  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                  $consult = $connection->prepare("SELECT count(*) as total FROM ebooks where estado='Activo'");
                  $consult->execute();
                  $data = $consult->fetch(PDO::FETCH_ASSOC);
                  $total = $data['total'];
                  for ($i=0; $i < $total; $i++) { 
                    if ($i==0) {
                      echo "<li data-target='#myCarousel' data-slide-to='$i' class='active'></li>";
                    }else{
                      echo "<li data-target='#myCarousel' data-slide-to='$i'></li>";
                    }
                  }
                ?>
                <!--li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li-->
              </ol>

              <!-- Wrapper for slides -->
              <div class="carousel-inner">
                <!-- Inicio de llenado automático del carrusel -->
                <?php
                  $i = 0;
                  foreach($model as $row){
                    if ($i==0) {
                      echo "<div class='item active'>";
                    }else{
                      echo "<div class='item'>";
                    }
                    echo "<img src=".$row['img']." alt='' style='width:100%;'>";
                    echo "<div class='carousel-caption'>";
                    echo "<a href='#'><h3>".$row['titulo']."</h3></a>";  
                    echo "<p>".$row['nautor']."</p>";
                    echo "</div>";  
                    echo "</div>";  
                    $i ++; 
                  }    
                ?>
                <!-- Fin de llanado automático del carrusel -->

                <!--div class="item active">
                  <img src="../img/gala1.jpg" alt="Los Angeles" style="width:100%;">
                  <div class="carousel-caption">
                    <h3>Los Angeles</h3>
                    <p>LA is always so much fun!</p>
                  </div>
                </div>

                <div class="item">
                  <img src="../img/quince.jpg" alt="Chicago" style="width:100%;">
                  <div class="carousel-caption">
                    <h3>Chicago</h3>
                    <p>Thank you, Chicago!</p>
                  </div>
                </div>
              
                <div class="item">
                  <img src="../img/evento3.jpg" alt="New York" style="width:100%;">
                  <div class="carousel-caption">
                    <h3>New York</h3>
                    <p>We love the Big Apple!</p>
                  </div>
                </div-->
            
              </div>

              <!-- Left and right controls -->
              <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
        </div>
        <div class="col-xs-6">
            <div id="myCarousel2" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#myCarousel2" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel2" data-slide-to="1"></li>
                <li data-target="#myCarousel2" data-slide-to="2"></li>
              </ol>

              <!-- Wrapper for slides -->
              <div class="carousel-inner">

                <div class="item active">
                  <img src="../img/gala1.jpg" alt="Los Angeles" style="width:100%;">
                  <div class="carousel-caption">
                    <h3>Los Angeles</h3>
                    <p>LA is always so much fun!</p>
                  </div>
                </div>

                <div class="item">
                  <img src="../img/quince.jpg" alt="Chicago" style="width:100%;">
                  <div class="carousel-caption">
                    <h3>Chicago</h3>
                    <p>Thank you, Chicago!</p>
                  </div>
                </div>
              
                <div class="item">
                  <img src="../img/evento3.jpg" alt="New York" style="width:100%;">
                  <div class="carousel-caption">
                    <h3>New York</h3>
                    <p>We love the Big Apple!</p>
                  </div>
                </div>
            
              </div>

              <!-- Left and right controls -->
              <a class="left carousel-control" href="#myCarousel2" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#myCarousel2" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
      </div>
    </div>
    <hr>
  </div>