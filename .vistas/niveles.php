<?php

session_start();

$mensaje = null;
$nombre = null;

if(isset($_SESSION['usuario'])){
	if($_SESSION['usuario']['rela_tipo_usuario']=="2"){
        $mensaje = "Maestro";
        $nombre = $_SESSION['usuario']['nombre_persona'];
    }else{
        $mensaje = "Alumno";
        $nombre = $_SESSION['usuario']['nombre_persona'];
    }
}    

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
                            <?php
                                if (isset($_SESSION['usuario'])) {
                                    if ($_SESSION['usuario']['rela_tipo_usuario']=="1") {
                                        echo '<li><a href="#" class="nav-item">MI HISTORIAL</a></li>';
                                        echo '<li><a href="#" class="nav-item">EVALUACIONES</a></li>';
                                        echo '<li><a href="actDesarrollada.php" class="nav-item">ENTREGAR TRABAJO</a></li>';
                                    }   
                                }      
                            ?>
                            <?php
                                if (isset($_SESSION['usuario'])) {
                                    if ($_SESSION['usuario']['rela_tipo_usuario']=="2") {
                                        echo '<li><a href="../miAlumno.php" class="nav-item">MIS ALUMNOS</a></li>';
                                        echo '<li><a href="#" class="nav-item">CREAR EVALUACIÓN</a></li>';
                                        echo '<li><a href="tp_desarrollada.php" class="nav-item">TRABAJOS ENTREGADOS</a></li>';

                                    }   
                                }      
                            ?>

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
                    echo '<h2 class="heading"><span class="bold-green">'.$mensaje.'</span></h2>';
                    echo '<h2 class="heading"><span class="bold-green">Bienvenido '.$nombre.'</span></h2>';
                ?>
                <?php 
                    if(isset($_SESSION['usuario'])){
                        if($_SESSION['usuario']['rela_tipo_usuario']=="2"){

                            echo '
                            <div>
                                <a class="btn btn-primary btn-verde btn-3x" type="button" data-toggle="modal" data-target="#crear-clase-modal"> Crear clase <span> <i class="fa fa-angle-double-right"></i></span>
                                </a>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Descripcion</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody id="clases"></tbody>
                                </table>
                            </div>
                            ';

                            echo '

                            <div class="modal" id="crear-clase-modal" tabindex="-1" role="dialog" aria-labelledby="crear-clase-modal"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button class="close" data-dismiss="modal" aria-label="Cerrar">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <h2 id="crear-clase-modal">Nueva clase</h2>
                                        </div>
                                        <div class="modal-body">
                                            <div class="div-modal">

                                                <div>
                                                    <form role="form" action="#" method="POST" id="form_crear_clase">
                                                        <div>
                                                            <div>
                                                                <div class="form-group">
                                                                    <input type="text" placeholder="Nombre de la clase" class="form-control input-lg" id="nombre_clase" name="nombre_clase" required">
                                                                </div>

                                                                <div class="form-group">
                                                                       <textarea placeholder="Descripcion de la clase" class="form-control input-lg" id="desc_clase" name="desc_clase" required"></textarea> 
                                                                </div>

                                                                <button class="btn btn-cancelar" type="button" data-dismiss="modal">Cancelar</button>
                                                                <button type="submit" class="btn btn-registrarse btn-verde btn-re"> Enviar<span> <i class="fa fa-angle-double-right"></i> </span></button>
                                                                
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer botones">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                            ';

                        }else{

                            echo '
                            <div>
                                <a class="btn btn-primary btn-verde btn-3x" type="button" data-toggle="modal" data-target="#agregar-clase-modal"> Agregar clase <span> <i class="fa fa-angle-double-right"></i></span>
                                </a>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Descripcion</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody id="clases_alumno"></tbody>
                                </table>
                            </div>
                            ';

                            echo '

                            <div class="modal" id="agregar-clase-modal" tabindex="-1" role="dialog" aria-labelledby="tituloVentana"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button class="close" data-dismiss="modal" aria-label="Cerrar">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <h2 id="tituloVentana">Registrarse</h2>
                                        </div>
                                        <div class="modal-body">
                                            <div class="div-modal">

                                                <div>
                                                    <form role="form" action="#" method="POST" id="form_agregar_clase">
                                                        <div>
                                                            <div>
                                                                <div class="form-group">
                                                                    <input type="number" placeholder="Ingrese el codigo de la clase" class="form-control input-lg" name="codigo_clase" id="codigo_clase" required">
                                                                </div>

                                                                <button class="btn btn-cancelar" type="button" data-dismiss="modal">Cancelar</button>
                                                                <button type="submit" class="btn btn-registrarse btn-verde btn-re"> Registrarse<span> <i class="fa fa-angle-double-right"></i> </span></button>
                                                                
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer botones">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                            ';
                        }
                    }   
                 ?>
                  
            </div>
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