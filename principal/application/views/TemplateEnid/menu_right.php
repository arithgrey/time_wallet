        <div class="menu-right">                        
            <ul id="notification-menu" class="notification-menu">                            
            <li>
                <a style="background:#024260;" title='Más opciones'  class="btn btn-default dropdown-toggle" data-toggle="dropdown">                        
                    <img src="">
                    <?=evalua_titulo_menu_principal($nombre ,  $email  , $id_usuario )?>
                    <i class="fa fa-sort-desc">
                    </i>                
                </a>                
                 <ul class="dropdown-menu dropdown-menu-usermenu pull-right">                                                                
                    <?=$menu?>
                 </ul>                                        
            </li>
        </ul>        
    </div>