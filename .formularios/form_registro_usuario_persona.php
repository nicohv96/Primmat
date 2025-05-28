<?php
    require_once ('../.clases/class.conexion.php');
    require_once ('../.clases/class.consultas.php');
    require_once ('../.controladores/select/select_tipo_usuario.php');
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
<section id="contact-us">
    <div class="contact-us">
        <div class="container">
            <div class="row">
                <div class="col-md-12 wow bounceInDown">
                    <h2 class="section-title">REGISTRASE</h2>
                    <p class="under-heading">Por favor ingrese su datos!</p>
                </div>
            </div>
        </div>
        <div class="section-wrapper">
            <div class="container">
                <form role="form" action="../.controladores/insert/insertar_usuario.php" method="POST">
                    <div class="row">
                        <div class="col-md-6 wow bounceInLeft">  
                            <div class="form-group">
                                <input type="text" placeholder="Usuario" class="form-control input-lg" name="user_name" required pattern="[A-Za-z0-9]{1,40}">
                            </div>
                            <div class="form-group">
                                <input type="password" placeholder="Contraseña" class="form-control input-lg" name="password" required pattern="[A-Za-z0-9-_@#*]{1,40}">
                            </div>
                            <div class="form-group">
                                <input  type="password" placeholder="Confirmar" class="form-control input-lg" required>
                            </div>
                            <div class="form-group">
                                <?php
                                    SELECT_TIPO_USUARIO();
                                ?>
                            </div>
                        </div>

                        <div class="col-md-6 wow bounceInRight">        
                            <div class="form-group">
                                <input type="text" placeholder="Nombre" class="form-control input-lg" name="nombre_persona" required pattern="[A-Za-z]{1,40}">
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Apellido" class="form-control input-lg" name="apellido_persona" required pattern="[A-Za-z]{1,40}">
                            </div>
                            <div class="form-group">
                                <input type="date" placeholder="Fecha de nacimiento" class="form-control input-lg" name="fecha_nacimiento" required pattern="[A-Za-z]{1,40}">
                            </div>
                            <div class="form-group">
                                <input type="email" placeholder="Correo" class="form-control input-lg" name="email" required>
                            </div>  
                            <div>
                                <button type="submit" class="btn btn-primary btn-block input-lg">REGISTRARME</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/plugins.js"></script>
<script src="../js/jquery.counterup.min.js"></script>
<script src="../js/jquery.waypoints.min.js"></script>
<script src="../js/jquery.nicescroll.min.js"></script>
<script src="../js/wow.min.js"></script>
<script>new WOW().init();</script>

</body>
</html>