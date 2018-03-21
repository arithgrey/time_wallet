
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
    <header>
        <div class="container">
            <div class="intro-text">  
                <div class="intro-heading2">
                   Una nueva forma de ver tu dinero. 
                </div>                              
                
            </div>
        </div>
    </header>



    <!-- Portfolio Grid Section -->
    <section id="resumen" >
        <div class='container'>
            <?=n_row_12()?>            
                    <center>
                        <div class="col-lg-12">
                            <h2 class="section-heading" style='color:white!important;'>
                               Negocios del mundo entienden que gran parte de su potencial en el mercado es gracias al buen uso de la información, ya que con está operan de forma consiente. 
                            </h2>                                               
                        </div>  
                        <div class="col-lg-8 col-lg-offset-2">
                            <p class='text-1'>
                                La productividad de tus negocios puede mejorar notablemente a través de una estrategia inteligente del uso del dinero, con la cual no solo puedas evaluar tus productos y servicios claves en el tiempo, sino también contar con un panorama que te permita mejorar tus decisiones al momento de invertir. 
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
                                   Esto les causa incertidumbre que les impide actuar rápidamente frente a posibles cambios, creamos Time Wallet con la finalidad de brindar lucidez de aquello que esta afectando o mejorando la economía de tu negocio o cuenta personal.
                                </p>                                                       
                                
                                <br>
                        </div>



                       











                         <div class="col-lg-8 col-lg-offset-2 portfolio-item">
                                <a href="#portfolioModal90" class="portfolio-link" data-toggle="modal">
                                    <img src="<?=base_url('application/img/12.png')?>" class="img-responsive" alt="">
                                </a>
                                <a>
                                    <h4 style='color:white'>
                                      Renta, salarios, comidas, gastos de la familia y 
                                      todas las categorias que imagines podrás incluir en tus cuentas time wallet 
                                    </h4>
                                </a>
                                <p class="text-1" style='color: white;'> 
                                   Podrás llevar el control de tus gastos personales, familiares o de negocios y éste se encargará de llevar el análisis que te hace falta para alcanzar eficazmente tus objetivos.  
                                </p>                                                       
                                <br>
                        </div>



                        <div class="col-lg-8 col-lg-offset-2 portfolio-item">
                            <a href="#portfolioModal4" class="portfolio-link" data-toggle="modal">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content">
                                        
                                    </div>
                                </div>

                                <img src="<?=base_url('application/img/31.png')?>" class="img-responsive" alt="">
                            </a>
                            <div class="portfolio-caption">
                                <a>
                                    <h4 style='color:white'>
                                        La solución es perfeccionada por ti. 
                                    </h4>
                                </a>
                                <p class="text-1" style='color: white;'> 
                                   Aprovechamos tu critica y enfocamos nuestras acciones, medios, técnicas y tecnologías con la finalidad de construir el instrumento que te encamine  a una mejor inteligencia financiera. 
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
                        Registrate
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
                        Registrar mi cuenta!
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

    <section id='contacto'>
        <div class='container'>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">
                        ¿Necesitas más información?
                    </h2>                   
                    
                </div>
            </div>


            <div class="row">
                <center>
                    <?=btn_call_to_action(1 , "page-scroll btn btn-xl" , "btn_contacto" , "" , "Contáctame",  url_developer()."#contacto")?>
                </center>
            </div>    
        </div>

    </section>


       
    
    
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
    header{background-image:url(<?=base_url('application/img/50.jpg')?>);background-repeat:no-repeat;background-attachment:scroll;background-position:center center;-webkit-background-size:cover;-moz-background-size:cover;background-size:cover;-o-background-size:cover;text-align:center;color:#fff}    
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

   
    

</style>






<script type="text/javascript" src="<?=base_url('application/js/home/landing_page.js')?>"></script>
<input type="hidden" name="now" class="now" value="<?=base_url();?>">
<script type="text/javascript" src="<?=base_url('application/js/Organizacion/prospectos.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/sha1.js')?>"></script>


