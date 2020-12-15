<?php
class promedio{
  public $num1;
  public $num2;
  public $num3;
  public $resultado;

  public function calcularPromedio($num1,$num2,$num3){
      $this->resultado = ($num1+$num2+$num3)/3;
  }
}
?>
