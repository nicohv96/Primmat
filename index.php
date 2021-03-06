<?php  

session_start();

if(isset($_SESSION['usuario'])){

    if($_SESSION['usuario']['rela_tipo_usuario']=="5"){
        header('Location: .vistas/maestro.php');       
    }else if($_SESSION['usuario']['rela_tipo_usuario']=="6"){
        header('Location: .vistas/alumno.php');
    }
}

    require_once ('.clases/class.conexion.php');
    require_once ('.clases/class.consultas.php');
    require_once ('.controladores/select/select_tipo_usuario.php');

?>

<!DOCTYPE html>
<html>
    <head>
        <title>
            Primmat
        </title>
        <meta charset="utf-8">
        <!--CSS-->
        
        <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/animate.css">
        <link rel="stylesheet" type="text/css" href="css/mensaje.css">
        <!--Google Fonts-->

    </head>

    <body>
       <header class="header" id="HOME">

            <!-- Navigation -->
              
            <nav class="navbar navbar-default navbar-fixed-top">
              
                
                <div class="container">
                  
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#loso-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                      <a class="navbar-brand" href="index.html">
                        <!-- small size logo -->
                        <img src="images/logoPM.png" alt="logo" style="max-width: 278px; max-height: 218px;">

                     </a>
                    </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="loso-navbar-collapse-1">
                  <ul class="nav navbar-nav navbar-right">
                        <li><a href="#HOME" class="nav-item">INICIO</a></li>
                        <li><a href="#about" class="nav-item">ACERCA DE NOSOTROS</a></li>
                        <li><a href="niveles.html" class="nav-item">NIVE</a></li>
                        <li><a href="#contact-us" class="nav-item">CONTACTO</a></li>
                  </ul>  
                </div><!-- /.navbar-collapse -->
              </div>
            </nav>      
          
            <div class="header-overlay">
                <div class="error">
                    <span>Datos de ingreso no válidos, inténtelo de nuevo  por favor</span>
                </div>
                <div class="agregado">
                    <span>Su cuenta se a creado correctamente</span>
                </div>
                <div class="error_agregado">
                    <span>El nombre de usuario ya existe, no se ha podido crear la cuenta</span>
                </div>
               <div class="container">
                   <div class="row">
                    <div class="col-md-12">
                        <!--Logo-->
                        
                    </div>
                    <div class="row">
                    <div class="col-md-8 wow bounceIn">
                        <div class="logoPM header-text">
                            <h1>Primmat</h1>
                            <p>Quieres aprender Matemáticas?</p>
                        </div>
                        <div class="header-btns">
                          <a href="#about">
                              <i class="fa fa-angle-down wow bounceInUp"></i>
                          </a>
                        
                      </div>
                    </div>
                    <div class="col-md-4">
                       <div class="header-col">
                        
                         <form action="#" method="POST" role="form" class="login header-form" id="formLg">
                            <h2>Iniciar Sesión</h2>
                             <div class="form-group">
                                 <input type="text" placeholder="Usuario" class="form-control input-3x" pattern="[A-Za-z0-9-_#*]{1,15}" name="usuariolg" required>
                             </div>
                             <div class="form-group">
                                 <input type="text" placeholder="Contraseña" class="form-control input-3x" pattern="[A-Za-z0-9-_#*]{1,15}" name="passlg" required>
                             </div>
                             <div class="form-group">
                                 <button type="submit" class="btn btn-primary btn-Ingresar btn-3x">Ingresar<span> <i class="fa fa-angle-double-right"></i> </span></button>
                            </div>
                            <div class="form-group">
                                    <a class="btn btn-primary btn-verde btn-3x" type="button" data-toggle="modal" data-target="#ventanaModal">Registrarse
                                        <span> <i class="fa fa-angle-double-right"></i></span>
                                    </a>
                                </div>
                         </form>
                         
                       </div>
                        
                    </div>
                </div>
                </div>
                   <div class="row"></div>
               </div>
           </div>
       </header>

       <!--SECCION ACERCA DE NOSOTROS-->

       <section id="about">
          
           <div class="section-about">
              <div class="container">
                  <div class="row">
                      <div class="col-md-12 wow bounceIn">
                          <h2 class="section-title">About Biking</h2>
                          <p class="under-heading">Take A Look at some Features</p>
                      </div>
                  </div>
              </div>
               <div class="section-wrapper">
                   <div class="container">
               <div class="row">
                   <div class="col-md-4 wow bounceInDown">
                       
                           <a href="#"><i class="fa fa-user fa-5x square"></i></a>
                           <h3 class="heading">Performers</h3>
                           <p class="col-caption">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas delectus excepturi non modi quo iusto aut in nisi, esse provident!</p>
                   </div>
                       
                    <div class="col-md-4 wow bounceInDown">
                       
                           <a href="#"><i class="fa fa-bicycle fa-5x"></i></a>
                           <h3 class="heading">Sport</h3>
                           <p class="col-caption">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas delectus excepturi non modi quo iusto aut in nisi, esse provident!</p>
                           
                    </div>
                      
                    <div class="col-md-4 wow bounceInRight">
                       
                           <a href="#"><i class="fa fa-location-arrow fa-5x"></i></a>
                           <h3 class="heading">Campaign</h3>
                           <p class="col-caption">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas delectus excepturi non modi quo iusto aut in nisi, esse provident!</p>
                       
                    </div>
               </div>
           </div>
               </div>
           </div>
           
       </section>

        <!--end of about section-->

        <!--MODAL REGISTROS-->

        <section>
            <div class="modal" id="ventanaModal" tabindex="-1" role="dialog" aria-labelledby="tituloVentana"
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
                                    <form role="form" action=".controladores/insert/insertar_usuario.php" method="POST">
                                        <div>
                                            <div>
                                                <!-- Seccion usuario -->
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
                                                <!--  end Seccion usuario -->

                                                <!-- Seccion persona -->
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
                                                <button class="btn btn-cancelar" type="button" data-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-registrarse btn-verde btn-re"> Registrarse<span> <i class="fa fa-angle-double-right"></i> </span></button>
                                                <!-- end Seccion persona -->
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
        </section>
            
        <section id="contact-us">
            <div class="contact-us">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 wow bounceInDown">
                            <h2 class="section-title">Leave Your Feedback</h2>
                            <p class="under-heading">Feel Free to text us</p>
                        </div>
                    </div>
                </div>
                <div class="section-wrapper">
                    <div class="container">
                        <form role="form">
                            <div class="row">
                            <div class="col-md-6 wow bounceInLeft">
                                
                                    <div class="form-group">
                                        <input type="text" placeholder="Your Name" class="form-control input-lg">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" placeholder="Your E - Mail" class="form-control input-lg">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" placeholder="Subjet" class="form-control input-lg">
                                    </div> 
                            </div>
                            <div class="col-md-6 wow bounceInRight">
                               <div class="form-group">
                                <textarea placeholder="Your Message" class="form-control "></textarea>
                               </div>
                               <button class="btn btn-primary btn-block input-lg">SEND MESSAGE</button>
                            </div>
                        </div>
                        </form>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="social-icons wow slideInDown">
                                    <ul class="list-unstyled">
                                        <li><a href="#"><i class="fa fa-facebook fa-3x"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter fa-3x"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus fa-3x"></i></a></li>
                                        <li><a href="#"><i class="fa fa-instagram fa-3x"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- end modal -->
        
        <!-- footer -->

     <section id="footer">
        <div class="footer-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <p class="footer-text">Todos los derechos reservado <span class="copyright"> &copy;</span>2020
                        </p>
                    </div>
                    <div class="col-md-4">
                        <img src="images/logoPM1.png" class="logoimg" style="max-height: 100px; max-width: 80px;" />
                    </div>
                    <div class="col-md-4">
                        <p class="footer-text">Educación y TIC </p>
                    </div>
                </div>
            </div>
        </div>
     </section>

        <!-- end footer -->
    
        <section class="loading-overlay">
           <div class="sk-cube-grid">
                <div class="sk-cube sk-cube1"></div>
                <div class="sk-cube sk-cube2"></div>
                <div class="sk-cube sk-cube3"></div>
                <div class="sk-cube sk-cube4"></div>
                <div class="sk-cube sk-cube5"></div>
                <div class="sk-cube sk-cube6"></div>
                <div class="sk-cube sk-cube7"></div>
                <div class="sk-cube sk-cube8"></div>
                <div class="sk-cube sk-cube9"></div>
           </div>
       </section>  
       
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/jquery.counterup.min.js"></script>
        <script src="js/jquery.waypoints.min.js"></script>
        <script src="js/jquery.nicescroll.min.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/main.js"></script>
        <script>new WOW().init();</script>

        <script type="text/javascript">
            
            function getParameterByName(name) {
                name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
                var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
                results = regex.exec(location.search);
                return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
            }

            var mensaje = getParameterByName('mensaje');

            if (mensaje == 1){

                $('.error_agregado').slideDown('slow');
                setTimeout(function(){
                    $('.error_agregado').slideUp('slow');
                },10000);

            }else if (mensaje == 2){

                $('.agregado').slideDown('slow');
                setTimeout(function(){
                    $('.agregado').slideUp('slow');
                },10000);

            }

        </script>

    </body>
</html>