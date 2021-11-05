<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="text/css" rel="shortcut icon" href="img/logo-mywebsite-urian-viera.svg"/>
  <title>Cómo actualizar Datos en BD Usando archivo CSV con PHP sin ninguna Libreria Fácil :: WebDeveloper Urian Viera</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/cssGenerales.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light navbar-dark fixed-top" style="background-color: #563d7c !important;">
    <ul class="navbar-nav mr-auto collapse navbar-collapse">
      <li class="nav-item active">
        <a href="index.php"> 
          <img src="img/logo-mywebsite-urian-viera.svg" alt="Web Developer Urian Viera" width="120">
        </a>
      </li>
    </ul>
    <div class="my-2 my-lg-0">
      <h5 class="navbar-brand">Web Developer Urian Viera </h5>
    </div>
</nav>


<div class="container mb-5">

<h3 class="text-center">
    Cómo actualizar <span style="color: #777;"> Datos-Registros</span> en BD Usando archivo CSV con PHP sin ninguna Libreria Fácil
</h3>
<hr>


 <div class="row">
    <div class="col-md-5">
      <form action="recibe_excel.php" method="POST" enctype="multipart/form-data"/>
        <div class="file-input text-center">
            <input  type="file" name="dataCliente" id="file-input" class="file-input__input" accept=".csv"/>
            <label class="file-input__label" for="file-input">
              <i class="zmdi zmdi-upload zmdi-hc-2x"></i>
              <span>Elegir Archivo CSV</span></label
            >
          </div>
      <div class="text-center mt-5">
          <input type="submit" name="subir" class="btn-enviar" value="Subir Archivo CSV"/>
      </div>
      </form>
    </div>

    <div class="col-md-7">
    <?php
    header("Content-Type: text/html;charset=utf-8");
    include('config.php');
    $sqlProductos         = ("SELECT * FROM productos ORDER BY idProduct ASC");
    $queryDataProductos   = mysqli_query($con, $sqlProductos);
    $totalProducts        = mysqli_num_rows($queryDataProductos);
    ?>

      <h6 class="text-center">
        Stock de Productos  <strong>(<?php echo $totalProducts; ?>)</strong>
      </h6>

        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>#</th>
               <th>Producto</th>
              <th>Código</th>
              <th>Cantidad Disponible</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $i = 1;
            while ($dataProduct = mysqli_fetch_array($queryDataProductos)) { ?>
            <tr>
              <th><?php echo $i++; ?></th>
              <td><?php echo $dataProduct['producto']; ?></td>
              <td><?php echo $dataProduct['codigo']; ?></td>
              <td><?php echo $dataProduct['cantidad']; ?></td>
            </tr>
          <?php } ?>
          </tbody>
        </table>

    </div>
  </div>

</div>


<script src="js/jquery.min.js"></script>
<script src="'js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
    
</body>
</html>
