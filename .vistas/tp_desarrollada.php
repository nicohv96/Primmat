<?php
require_once ('../.clases/class.conexion.php');
require_once ('../.clases/class.consultas.php');
require_once ('../.controladores/mostrar/mostrar_tpDesarrollado.php');
require_once ('../.controladores/select/select_actividad_desarrollada.php');

?>

<!DOCTYPE html>
<html>

<head>
    <title>
        Primmat
    </title>
    <meta charset="utf-8">
    <!--CSS-->

    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/animate.css">
    <!--Google Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
</head>

<body>
    <header class="header" id="HOME">
        <!-- Navigation -->

        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">

                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#loso-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">
                    <!-- small size logo -->
                    <img src="../images/logoPM.png" alt="logo" style="max-width: 150px; max-height: 150px;">
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="loso-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#" class="nav-item">INICIO</a></li>

                        <li><a href="../salir.php" class="nav-item">CERRAR SESIÓN</a></li>
                    </ul>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</header>

<section class="why-us" id="timeline">

    <div class="section-timeline fondo-timeline">
        <div class="container" id="mat">
           <?php

           MOSTRAR_TPDESARROLLADO();

           ?> 

       </div>

       <h3> Calificar Trabajo </h3>
   <form action="#" method="POST" enctype="multipart/form-data">

  <label for="archivo">Actividad</label><br>
  <?php
   SELECT_ACTIVIDAD_DESARROLLADA();
   ?><br>
   <label for="archivo">Archivo</label>
    <input type="file" name="archivo" id="archivo" size="150" maxlength="150"><br>
    <label for="archivo">Observacion</label>
    <input type="text" name="observacion" id="observacion"><br>
    <label for="archivo">Calificación</label>
    <input type="text" name="calificacion" id="calificacion"><br>
  <button type="submit" name="submit01" class="btn btn-success btn-sm">Enviar</button>
</form>

   </div>

</section>

<section id="footer">
    <div class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <p class="footer-text">Rony Almiron <span class="copyright"> &copy;</span>2020</p>
                </div>
                <div class="col-md-4">
                    <img src="../images/logoPM1.png" class="logoimg" style="max-height: 100px; max-width: 80px;" />
                </div>
                <div class="col-md-4">
                    <p class="footer-text">Educación y TIC</p>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/niveles.js"></script>
<!-- <script src="../js/plugins.js"></script> -->
<script src="../js/jquery.counterup.min.js"></script>
<script src="../js/jquery.waypoints.min.js"></script>
<script src="../js/jquery.nicescroll.min.js"></script>
<script src="../js/wow.min.js"></script>
<script>
    new WOW().init();
</script>
</body>

</html>