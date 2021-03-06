<!DOCTYPE html>
<head>       
    <title>
        Enid Service - <?=$titulo?>
    </title>            
    <?=$this->load->view("TemplateEnid/header_meta_enid")?>    
    <?=link_tag(base_url('application/img/Enid.png') , 'shortcut icon', 'image/ico');?>    
    <script src="<?=base_url('application/js/js/jquery-1.10.2.min.js')?>"></script>
    <script src="<?=base_url('application/js/js/bootstrap.min.js')?>"></script>            
    <script type="text/javascript" src="<?=base_url('application/js/main.js')?>"></script>              

    <?=link_tag('../css_global/css/style.css');?> 
    <?=link_tag('../css_global/template/main.css');?>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <?=link_tag('../css_global/agency.min.css');?>

</head>
<body>    
    <div class="header-section">            
        <a href="<?=base_url()?>">                
            <img class='img_icono_pagina'  src="<?=base_url('application/img/Enid.png')?>" alt="Enid Service">
        </a>   
        <?=$this->load->view("../../../view_tema/menu_right");?>               
    </div>        




