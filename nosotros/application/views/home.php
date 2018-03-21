
<body id="page-top" class="index">
    
    <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container">            
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">
                        Toggle navigation
                    </span> 
                    Menu 

                    <i class="fa fa-bars">
                    </i>
                </button>
                <a class="navbar-brand " href="#page-top">
                    Time wallet
                </a>
            </div>            
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


                    
                    
                
                <ul class="nav navbar-nav navbar-right">                
                    <li>
                        <a class="page-scroll" href="#registro">
                            Registrarse
                        </a>
                    </li>                                
                    <li>
                        <a class="page-scroll" href="<?=url_inicio_session()?>">
                            Iniciar sesión
                        </a>
                    </li>                    
                </ul>

               

            </div>
          
        </div>
        
    </nav>
    <!-- Header -->
    


    <!-- Portfolio Grid Section -->
    <section id="resumen" >
        <div class='container'>
            <?=n_row_12()?>            
                    <center>
                        <div class="col-lg-12">
                            <h2 class="section-heading titulo-p" style='color:white!important;'>
                               Negocios del mundo entienden que gran parte de su potencial en el mercado es gracias al buen uso de la información, ya que con está operan de forma consiente. 
                            </h2>                                               
                            <br>
                        </div>  
                        <div class="col-lg-8 col-lg-offset-2">
                            <p class='text-1'>
                                La productividad de tus negocios puede mejorar notablemente a 
                                través de una <strong class='text-resaltado'>estrategia inteligente
                                 del uso del dinero, </strong> con la cual no solo puedas evaluar tus productos y servicios claves en el tiempo, sino también contar con un panorama que te permita mejorar tus decisiones al momento de invertir. 
                            </p>
                            <br>
                        </div>



                         <div class="col-lg-8 col-lg-offset-2 portfolio-item">
                                <a href="#portfolioModal44" class="portfolio-link" data-toggle="modal">
                                    <img src="<?=base_url('application/img/49.png')?>" class="img-responsive" alt="">
                                </a>
                                <a>
                                    <h4 style='color:white'>
                                        Personas operan sus negocios sin medir o comparar día a día sus progresos
                                    </h4>
                                </a>
                                <p class="text-1" style='color: white;'> 
                                    <br>
                                   Esto les causa incertidumbre que les impide actuar rápidamente frente a posibles cambios, creamos Time Wallet con la finalidad de <strong class='text-resaltado'>brindar lucidez de aquello que esta afectando o mejorando la economía de tu negocio o cuenta personal.</strong>
                                </p>                                                       
                                
                                <a href="<?=base_url('index.php/home/recorrido')?>">
                                    <button class='btn btn-default '>
                                        Aprende cómo lo hace 
                                    </button>                  
                                </a>

                                        <br>    
                                <br>

                        </div>



                       










                        
                         <div class="col-lg-8 col-lg-offset-2 ">
                                <br>
                                <br>
                                <a href="#portfolioModal90" class="portfolio-link" data-toggle="modal">
                                    <img src="<?=base_url('application/img/DSC_0304.jpg')?>" class="img-responsive" alt="">
                                    <!--<img src="<?=base_url('application/img/12.png')?>" class="img-responsive" alt="">-->
                                </a>
                                
                                    <h4 style='color:white'>
                                      Renta, salarios, comidas, gastos de la familia y 
                                      todas las categorias que imagines podrás incluir en tus cuentas time wallet 
                                    </h4>
                                
                                <br>
                                <p class="text-1" style='color: white;'> 
                                    Podrás llevar el <strong>control de tus gastos </strong> personales, familiares y de negocios ya que  éste se encargará de darte lo necesario para organizar y analizar aquello que te hace falta para alcanzar eficazmente tus objetivos.
                                </p>                                                       
                                

                                <a href="<?=base_url('index.php/home/recorrido')?>">
                                    <button class='btn btn-default '>
                                        Ve que más puedes hacer con Time Wallet
                                    </button>                  
                                </a>
                                
                                        <br>    
                                <br>

                        </div>
                        



                        <div class="col-lg-8 col-lg-offset-2 portfolio-item">
                            <br>


                            <a href="#portfolioModal4" class="portfolio-link" data-toggle="modal">
                                

                                <img src="<?=base_url('application/img/31.png')?>" class="img-responsive" alt="">
                            </a>
                            <div class="portfolio-caption">
                                <a>
                                    <h4 style='color:white'>
                                        Desarrollando una solución  tecnológica que sea una ayuda y no un inconveniente
                                    </h4>
                                </a>
                                <?=btn_call_to_action(1, "" , "" , "" , "Ayudanos a mejorar Time Wallet <br>Calificanos ★★★★★ " ,  "http://enidservice.com/ranking_quality/ranking/index.php/opiniones/emp/1/1/"  )?>
                                

                                <br>
                                <p class="text-1" style='color: white;'> 
                                   Nos importa tu critica y enfocamos nuestras acciones, medios, técnicas y tecnologías con la finalidad de construir el instrumento que te encamine  a una mejor inteligencia financiera 
                                    y lo mejor de todo <strong>no somos empresa de mercadotecnia ni agencia de publicidad </strong> por lo que tu información está unicamente a tu disposición.
                                </p>
                            </div>
                        </div>



                    </center>              
                    
                    


                    

                 



            <?=end_row()?>        
        </div>
    </section>

    <section id='registro'>
        <div class='container'>

            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">
                        ¿Aún no tienes una cuenta ?                        
                    </h2>                    
                    <h3>
                        Regístrate <span class='text-gratis'> 
                                    ¡Es gratis!
                                    </span>
                    </h3>

                </div>
            </div>


            <div>
                <form  class='form_prospectos' id='form_prospectos' 
           action="<?=url_registro_nuevo_miembro()?>">                        
            
                <div class='col-lg-6 col-lg-offset-3 col-md-6 col-sm-12'>
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1">
                               Usuario (email @ )
                        </span>
                        <input type="mail" name="mail" id="mail" class="mail form-control input-sm" required >
                    </div>
                    <div class='place_mail'>                            
                    </div>



                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1">
                            Nombre u organización
                        </span>
                        <input type="text" name="organizacion" id="organizacion" class="organizacion form-control input-sm" required>
                    </div>
                    <div class='place_organizacion'>                            
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1">
                           Contraseña
                        </span>
                        <input type="password"  id="pass" class="pass form-control input-sm" required>
                    </div>
                    <div class='place_pass'>                            
                    </div>

                    <div class='seccion_pass'>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">
                                Confirmar contraseña
                            </span>
                            <input type="password"  id="pass2" class="pass2 form-control input-sm" required>
                        </div>
                        <div class='place_pass2'>                            
                        </div>
                    </div>



                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1">
                            Sector laboral
                        </span>                    
                        <?=create_select($sectores, "sector" , "form-control input-sm " , "sector" , "nombre" , "id_sector" )?>
                    </div>                        
                    <br>
                    <button class='btn btn-default '>
                        Registrar!
                    </button>
                    <div class='place_user_registro'>
                    </div>

                    <a href="<?=url_usos_privacidad_enid_service()?>" >
                        Términos de uso y privacidad
                    </a>
                    
                </div>                                
            </form>



            </div>




        </div>
    </section>
    <hr>




       
    
    
<?=$this->load->view("modal/funcionalidades" )?>


    


    
</body>

</html>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">


<style type="text/css">    
    .url-social{
        background: #0A4A54;
        padding: 5px;
        color: white;
    }
    .url-social:hover , .url-social-tw{
        background: #0FCBEA;
        padding: 5px;
        color: white;
        text-decoration: none;
    }
    ul li{
        text-decoration: none;
        list-style: none;
    }
    ul{
        text-decoration: none;
        list-style: none;
    }
    li{
        text-decoration: none;
        list-style: none;
    }
    header{background-image:url(<?=base_url('application/img/aa1.jpg')?>);background-repeat:no-repeat;background-attachment:scroll;background-position:center center;-webkit-background-size:cover;-moz-background-size:cover;background-size:cover;-o-background-size:cover;text-align:center;color:#fff}    
    #resumen{
        background: #0079bf;
    }
    .intro-heading2{
    font-size: 3em!important;
        //color: #fdde8e !important;
        color: #ffeb3b !important;
        font-weight: bold;
        margin-top: 200px;           
        -webkit-text-stroke: .7px #968267;
    }    
    .seccion_pass{
        display: none;
    }
    .msj_inicia_session , .msj_inicia_session:hover {
        color: white; 
        font-weight: bold;
    }
    .text-1{
        color: white;
        font-size: 1em !important;
    }
    .dinero{
        color: #0079bf;
        font-size: 1.1em;
        font-weight: bold;
    }
    .text-gratis{
        color: #0fa3d2;
    }
    .text-resaltado{
        //color:#efff00;
        font-size: 1.1em;
    }
   
    .portfolio-item-2{
        background: red;
    }    
    @media only screen and (max-width: 991px) {
        .titulo-p{
        display: none;
    }    
    }
    
</style>






<script type="text/javascript" src="<?=base_url('application/js/home/landing_page.js')?>"></script>
<input type="hidden" name="now" class="now" value="<?=base_url();?>">
<script type="text/javascript" src="<?=base_url('application/js/Organizacion/prospectos.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/sha1.js')?>"></script>


<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-92528604-1', 'auto');
  ga('send', 'pageview');

</script>
