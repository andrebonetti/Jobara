<!DOCTYPE html>
<html lang="pt-br">
    <head>
    
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="shortcut icon" type="image/x-icon" href="<" title="" >
        <title> Área Administrativa </title>
                      
        <link rel="stylesheet" type="text/css" href="<?= base_url("css/bootstrap.css")?>">
        <link rel="stylesheet" type="text/css" href="<?= base_url("css/style-adm.css")?>">  
        
        <link rel="stylesheet/less" href="<?= base_url("less/index.less")?>">
        <link rel="stylesheet/less" href="<?= base_url("less/style-adm.less")?>">
        
        <script src="<?= base_url("js/jquery-2.1.3.min.js")?>"></script>
       	<script src="<?= base_url("js/less.js")?>"></script>
        <script src="<?= base_url("js/bootstrap.js")?>"></script>
		
	</head>

	<body>
        
        <header>
           <div class="myContainer">
                
                <div class="banner">
                	<div class="exit">
                		<?=anchor("adm/signout","
	                    	Sair
	                    	<img src='".base_url('img/exit.png')."'>
                    	")?>
                    </div> 
                    <img src="<?= base_url("img/logo_jobara.png")?>">   
                </div>
                    
            </div>    
        </header>
        
        <?php $msg = $this->session->flashdata('msg-success'); if (!empty($msg)){?>
		  <p class="alert alert-success"><?=$msg?></p>
	    <?php } ?>  
