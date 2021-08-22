<?php
require('config.php');
$tipo       = $_FILES['dataCliente']['type'];
$tamanio    = $_FILES['dataCliente']['size'];
$archivotmp = $_FILES['dataCliente']['tmp_name'];
$lineas     = file($archivotmp);

$i = 0;

foreach ($lineas as $linea) {
    $cantidad_registros = count($lineas);
    $cantidad_regist_agregados =  ($cantidad_registros - 1);

    if ($i != 0) {

    $datos = explode(";", $linea);
       
    $producto              = !empty($datos[0])  ? ($datos[0]) : '';
	$codigo                = !empty($datos[1])  ? ($datos[1]) : '';
    $cantidad              = !empty($datos[2])  ? ($datos[2]) : '';
       
    if( !empty($codigo) ){
        $sqlVerificarExistencia = ("SELECT codigo FROM productos WHERE codigo='".($codigo)."' ");
        $queryDuplicidad        = mysqli_query($con, $sqlVerificarExistencia);
        $cantidadDuplicidad     = mysqli_num_rows($queryDuplicidad);

/**********************************
 * Caso 1; si no existe ningún
 * registro asociado algunos de los
 * código que viene desde el CSV.
 * **************************/
if ( $cantidadDuplicidad == 0 ) { 
    $insertarProduct = ("INSERT INTO productos(producto,codigo,cantidad) VALUES('$producto','$codigo','$cantidad')");
    mysqli_query($con, $insertarProduct);
        
} else{
/**************************
 * CASO 2: ya existen algunos regitros
 * en BD que corresponden al Código
 * que viene desde el archivo CSV.
 * ***********************************/
    $updateData =  ("UPDATE productos SET 
        cantidad='" .$cantidad. "'  
       
        WHERE codigo='".$codigo."'
    ");
    $resultadoUpdate = mysqli_query($con, $updateData);
    } 
  } //Cierre de mi 2 If
  } //Cierre de mi 1 If


      echo '<center><div>'. $i. "). " .$linea.'</div></center>';
    $i++;
}


  echo '<center><p style="text-aling:center; color:#333;">Total de Registros: '. $cantidad_regist_agregados .'</p></center>';

echo "<center><a href='index.php'>Atras</a></center>";
?>

