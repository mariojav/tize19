<!DOCTYPE html>
<html lang="es">
<head>

     <title>Sistema de adminstracion de laboratorios</title>

     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="Home/css/bootstrap.min.css">
     <link rel="stylesheet" href="Home/css/font-awesome.min.css">
     <link rel="stylesheet" href="Home/css/owl.carousel.css">
     <link rel="stylesheet" href="Home/css/owl.theme.default.min.css">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="Home/css/templatemo-style.css">

</head>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

     <!-- PRE LOADER -->
     <section class="preloader">
          <div class="spinner">

               <span class="spinner-rotate"></span>
               
          </div>
     </section>



     <!-- MENU -->
     <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
          <div class="container">
                
               <div class="navbar-header">
                    
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>
                    
                    <!-- lOGO TEXT HERE -->
                    <img src="Home/images/UMSS.jpg" width="70" height="70" align="left">
                    <a class="navbar-brand">                    
                        SISTEMA DE LABORATORIOS
                    </a>                
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-nav-first">
                         <li><a href="#top" class="smoothScroll">Inicio</a></li>
                         <?php if(!Auth::check()): ?>
                              <li><a href="#about" class="smoothScroll">Ingresar</a></li>
                         <?php else: ?>
                              <li><a href="/admin/home" class="smoothScroll">Home</a></li>
                         <?php endif; ?>     
                         <li><a href="#team" class="smoothScroll">Visión y Mision</a></li>
                         <li><a href="#courses" class="smoothScroll" id="boton">Horarios</a></li>
                         <li><a href="#testimonial" class="smoothScroll">Acerca de</a></li>                         
                    </ul>
                        <img src="Home/images/tizen.png" width="150" height="55" align="right">   


               </div>
          </div>
          <?php if(count($errors) > 0): ?>
          <div class="alert alert-danger">
              <strong>Whoops!</strong> There were problems with input:
              <br><br>
              <ul>
                  <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <li><?php echo e($error); ?></li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
          </div>
          <?php endif; ?>
     </section>


     

     <!-- HOME -->
     <section id="home">
          <div class="row">

                    <div class="owl-carousel owl-theme home-slider">
                         <div class="item item-first">
                              <div class="caption">
                                   <div class="container">
                                        <div class="col-md-6 col-sm-12">
                                             <h1>Avisos del Laboratorio</h1>
                                             <h3>Aqui se publica avisos importantes del laboratorio</h3>
                                             <a href="#feature" class="section-btn btn btn-default smoothScroll">Ver avisos</a>
                                        </div>
                                   </div>
                              </div>
                         </div>

                         <div class="item item-second">
                              <div class="caption">
                                   <div class="container">
                                        <div class="col-md-6 col-sm-12">
                                             <h1 style="color:black">Horario de laboratorio</h1>
                                             <h3 style="color:black">Aqui se ve los horarios de laboratorio.</h3>
                                             <a style="color:black" href="#courses" class="section1-btn btn btn-default smoothScroll">Ver horarios</a>
                                        </div>
                                   </div>
                              </div>
                         </div>
                         <!----
                         <div class="item item-third">
                              <div class="caption">
                                   <div class="container">
                                        <div class="col-md-6 col-sm-12">
                                             <h1>Efficient Learning Methods</h1>
                                             <h3>Nam eget sapien vel nibh euismod vulputate in vel nibh. Quisque eu ex eu urna venenatis sollicitudin ut at libero. Visit <a rel="nofollow" href="https://www.facebook.com/templatemo">templatemo</a> page.</h3>
                                             <a href="#contact" class="section-btn btn btn-default smoothScroll">Let's chat</a>
                                        </div>
                                   </div>
                              </div>
                         </div> -->
                    </div>
          </div>
     </section>

  

     <!-- AVISOS -->
     <section id="feature">
          <div class="container">
               <div class="row">

                    <div class="col-md-4 col-sm-4">
                         <div class="feature-thumb"> 
                                <span>01</span>                             
                              <!--<h3>No hay aviso</h3>-->
                              <p align="justify">No hay aviso</p>
                         </div>                         
                    </div>

                    <div class="col-md-4 col-sm-4">
                         <div class="feature-thumb">                              
                                <span>02</span>                             
                                <!--<h3>No hay aviso</h3>-->
                                <p align="justify">No hay aviso</p>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-4">
                         <div class="feature-thumb">                              
                                <span>03</span>                             
                                <!--<h3>No hay aviso</h3>-->
                                <p align="justify">No hay aviso</p>
                         </div>
                    </div>

               </div>
          </div>
     </section>

     <?php if(!Auth::check()): ?>                    
     <!-- INGRESO A LABORATORIO -->
     <section id="about">
          <div class="container">
               <div class="row">

                    <div class="col-md-6 col-sm-12">
                         <div class="about-info">
                              <h2>Iniciar su sesion de laboratorio</h2>
                              <p>
                                    <figure>
                                        <span><i class="fa fa-users"></i></span>
                                        <figcaption>
                                             <font size=5>Laboratorio de sesiones</font>                                        
                                        </figcaption>
                                   </figure>
                                  </p>                          
                              <p>
                                <figure>
                                    <span><i class="fa fa-certificate"></i></span>
                                    <figcaption>
                                         <font size=5>Colaboración del auxiliar</font>                                        
                                    </figcaption>
                               </figure>
                              </p>
                              <p>
                                <figure>
                                    <span><i class="fa fa-bar-chart-o"></i></span>
                                    <figcaption>
                                         <font size=5>Horarios comodos</font>                        
                                    </figcaption>
                               </figure>
                              </p>                              
                         </div>
                    </div>

                    <div class="col-md-offset-1 col-md-4 col-sm-12">
                         <div class="entry-form">

                            <form class="form-horizontal"
                            role="form"
                            method="POST"
                            action="<?php echo e(url('login')); ?>">
                            <input type="hidden"
                                 name="_token"
                                 value="<?php echo e(csrf_token()); ?>">
                                   <h2>Ingresar</h2>                            

                                   <input type="email" name="email" class="form-control" placeholder="Tu correo electronico" required="" value="<?php echo e(old('email')); ?>">
                                    
                                   <input type="password" name="password" class="form-control" placeholder="Tu contraseña" required="" name="password">>
                                   
                                   <a style="color:White;" href="<?php echo e(route('auth.password.reset')); ?>">Forgot your password?</a>
                                     
                                   <button class="submit-btn form-control" id="form-submit">Ingresar</button>
                              </form>
                         </div>
                    </div>
                    

               </div>
          </div>
     </section>
     <?php endif; ?>
    

     <!-- MISION Y VISION -->
     <section id="team">
          <div class="container">
               <div class="row">
                    
                    <div class="col-md-6 col-sm-6">
                            <h2>Visión</h2> 
                        <div class="team-thumb">                                                        
                            <p align="justify">
                                 <font size=4>
                                    Ser una carrera de excelencia reconocida en el medio, dedicada a formar 
                                    profesionales a nivel de licenciatura, capaces de resolver problemas que involucren tecnología 
                                    computacional, con habilidad para administrar sistemas, proporcionar apoyo técnico, desarrollar y 
                                    aplicar nuevos métodos y técnicas para la construcción de sistemas de software, vinculados al avance 
                                    científico y tecnológico, con valores éticos y responsabilidad socio-cultural.
                                   </font>
                              </p>     
                         </div>
                    </div> 
                    <div class="col-md-6 col-sm-6">
                            <h2>Misión</h2>
                            <div class="team-thumb">
                               <p align="justify">
                                    <font size=4>
                                    Formar profesionales a nivel de licenciatura con sólida formación ética y cultural, comprometidos 
                                    con los cambios tecnológicos, científicos y humanísticos, aportando constantemente al mejoramiento 
                                    y creación de técnicas y métodos de los sistemas computacionales.
                                   </font>
                               </p>     
                            </div>
                       </div>                                                            
               </div>
          </div>
     </section>


     <!-- Horarios -->
     
<section id="courses">
          <div class="container">
               <div class="row">

                    <div class="col-md-12 col-sm-12">
                         <div class="section-title">
                              <h2>Horarios</h2>
                         </div>

                         <div class="owl-carousel owl-theme owl-courses">
                              
                              <?php $__currentLoopData = $laboratorios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $laboratorio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                              <div class="col-md-4 col-sm-4">
                                   <div class="item">
                                        <div class="courses-thumb">
                                             <div class="courses-top">
                                                  <div class="courses-image">
                                                       <img src="Home/images/labo3.jpg" class="img-responsive" alt="">
                                                  </div>                                                  
                                             </div>
                                             <div class="courses-detail">
                                                    <!--<a href="#"></a>-->                                                                                  
                                                  <a target="_blank"  href=" <?php echo e(url('home/horario/' . $laboratorio->id)); ?>" ><font size=4><?php echo e($laboratorio->nombrelab); ?></font></a>                                                  
                                             </div>
                                             
                                        </div>
                                   </div>
                              </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                         </div>
                    
               </div>
          </div>
</section>



     <!-- ACERCA DE -->
     <section id="testimonial">
          <div class="container">
               <div class="row">

                    <div class="col-md-12 col-sm-12">
                         <div class="section-title">
                              <h2>Acerca de </h2>
                         </div>
                         <div class="team-thumb">
                                <p align="justify">
                                   <font size=4>
                                    La academia es uno de los pilares fundamentales de nuestra universidad, la
                                    practica es importante para poder asentar conceptos, teorias y estrategias.
                                    Para ello se crea el "Sistema de Adminstracion de Sesiones de Laboratorio" que
                                    esta diseñado para facilitar el control de:
                                    <ul>
                                        <li>Usuarios</li> 
                                        <li>Roles</li>
                                        <li>Materias</li>
                                        <li>Actividades del estudiante</li>
                                        <li>Reportes</li>                                
                                    </ul>
                                    </font>
                              </p>
                         </div>                                                                                                                                             
                    </div>
               </div>
          </div>
     </section> 


     <!-- PIE DE PAGINA -->
     <footer id="footer">
          <div class="container">
               <div class="row">  
                                    
                    <div class="col-md-4 col-sm-6">
                         <div class="footer-info">
                              <div class="section-title">
                                   <h2>Dirección</h2>
                              </div>
                              <address>
                                   <p>Campus Central UMSS, Calle Sucre<br> lado ingreso vehicular Sucre</p>
                              </address>
                              
                              <div class="copyright-text"> 
                                   <p>Copyright &copy; 2019 Tizen S.R.L</p>
                                                                      
                              </div>
                         </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                            <div class="footer-info">                                                                                                      
                                   <h2>Web amigas</h2>                                                                                                                                                                                  
                                   <ul>
                                        <li><a href="http://www.cs.umss.edu.bo">www.cs.umss.edu.bo</a></li>                                           
                                        <li><a href="http://www.fcyt.umss.edu.bo">www.fcyt.umss.edu.bo</a></li>
                                        <li><a href="http://www.websis.umss.edu.bo">www.websis.umss.edu.bo</a></li>
                                        <li><a href="http://www.moodle3.umss.edu.bo">www.moodle3.umss.edu.bo</a></li>
                                   </ul>
                            </div>
                    </div>                                        
                    
               </div>
          </div>
     </footer>


     <!-- SCRIPTS -->
     <script src="Home/js/jquery.js"></script>
     <script src="Home/js/bootstrap.min.js"></script>
     <script src="Home/js/owl.carousel.min.js"></script>
     <script src="Home/js/smoothscroll.js"></script>
     <script src="Home/js/custom.js"></script>

     

</body>
</html>