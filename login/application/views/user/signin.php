<style type="text/css">
        .msj-recuperacion{
          color: #1464a2;
          font-size: 1.1em;
        }
        #olvide-pass:hover{
          cursor: pointer;
        }
        #olvide-pass{
          font-weight: bold;
          color: #166781 !important;
        }
        #olvide-pass:hover{
          text-decoration: none;
          color: #166781 !important;

        }
        .enid-service{
            
            margin-left: 5%;
            font-size: 6em;
            font-weight: bold;
            color: #223c48;
        }

        .enid-service{            
            font-size: 6em;
            font-weight: bold;
            color: #223c48;
            text-decoration: none;
        }        
        .login-btn, .registra-evento{
            display: none;
        }
        .crea-cuenta{
          text-decoration: none;
        }
        .crea-cuenta:hover{
          text-decoration: none;
        }        
        .msj-cuenta{
          color: #116AAB;
        }
</style>

<div>
  <div class='contenedor-principal'>                    
      <center>
          <h1 class='enid-service'>                                    
              <div class='text-service'>
                      Time wallet
              </div>                   
          </h1>                                        
          <span>
            <?=$mensaje_prospecto?>
          </span>
      </center>        
  </div>
</div>
<div class='row'>
    <div class=' col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4  col-sm-10 col-sm-offset-1'>
          <div class='row'>                  
                <form id="in" method="post" action="<?=base_url('index.php/api/sessionrestcontroller/start/format/json')?>">                        
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">
                        Usuario (@email)
                      </span>
                      <input type="mail" name='mail' id="mail"  class="form-control input-sm" >                                   
                    </div>
                    <div class="input-group">
                      <span class="input-group-addon" >
                        Contraseña
                      </span>
                      <input type="password" class="form-control input-sm"  name='pw' id="pw">
                      <input type='hidden' name='secret' id="secret">
                    </div>                                
                    <div class="control-group">                                                          
                      <label  id="reportesession" class='reportesession'>
                      </label>                                                          
                    </div>                
                    <button id="inbutton" class='btn btn-default btn_save recupera'>
                        Iniciar sesión
                    </button>                          
                    <a type="button" id='olvide-pass' class="recupara-pass pull-right "  data-toggle="modal" data-target="#recuperacion-pw" >                                                 
                      <strong>
                        Olvidé mi contraseña
                      </strong>
                    </a>
                    <center>
                        <strong>
                            <span class='place_status_inicio'> 
                            </span>
                        </strong>
                    </center>
                </form>
          </div> 
    </div>
  
</div>
<br><br>

<div class='row'>
  <center>
    <h2>
      <strong>
        ¿No tienes una cuenta?        
      </strong>
    </h2>
    
    <div class='row'>
      <a href="<?=url_prospectos()?>" class='crea-cuenta'>
        <strong>
          Regístrate  
          <strong style='color: #001114;font-size: 1.1em;'>
            ¡Es gratis! 
          </strong>
        </strong>
      </a>
    </div>
    
    
  </center>
</div>

<div class='row'>
</div>
<input type="hidden" name="now" class="now" value="<?=base_url();?>">
<?=$this->load->view("user/modal/config_inicio_session");?>
<script src="<?=base_url('application/js/sha1.js');?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/home/ini.js')?>"></script>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

