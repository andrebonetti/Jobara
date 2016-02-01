<!DOCTYPE html>
<html lang="pt-br">
    <head>
    
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        
		<meta name="author" content="André Bonetti de Oliveira">
		<meta name='description' content=''>
		<meta name='keywords' content=''>
		<meta name="google-site-verification" content="UjR-caWzh33W7Wdsw0dKNgoeRNktABuUhtsk0U_q8QI" />
        <?php include_once("analyticstracking.php") ?>
        
        <link rel="shortcut icon" type="image/x-icon" href="<" title="" >
        <title> Venda e Aluguel de Imóveis Jobara | <?=$title?></title>
                      
        <link rel="stylesheet" type="text/css" href="<?= base_url("css/bootstrap.css")?>">
        
        <?php if($atualPage == "home"){?>
        <link rel="stylesheet" type="text/css" href="<?= base_url("css/jsson_list.css")?>"> 
        <?php } ?>
        <?php if($atualPage == "imoveis"){?>
        <link rel="stylesheet" type="text/css" href="<?= base_url("css/my_jassor.css")?>"> 
        <?php } ?>
        
        <link rel="stylesheet/less" href="<?= base_url("less/index.less")?>">
        
        <script src="<?= base_url("js/jquery-2.1.3.min.js")?>"></script>
       	<script src="<?= base_url("js/less.js")?>"></script>
        <script src="<?= base_url("js/jssor.js")?>"></script>
   		<script src="<?= base_url("js/jssor.slider.js")?>"></script>    
        <script src="<?= base_url("js/my_jassor.js")?>"></script>
        <script src="<?= base_url("js/bootstrap.js")?>"></script>
		
	</head>

	<body>
        
        <header>
            <div class="myContainer">
                
                <div class="banner">
                    <?=anchor("home","<img src='".base_url('img/logo_jobara.png')."'>")?>
                </div>
                    
                    <nav>
                        <ul>
                            <li class="<?= atual_page($atualPage, "home")?>"><?= anchor("home","Home")?></li>
                            <li class="<?= atual_page($atualPage, "empresa")?>"><?= anchor("empresa","Empresa")?></li>
                            <li class="<?= atual_page($atualPage, "imoveis")?>"><?= anchor("imoveis","Imóveis")?></li>
                            <li class="<?= atual_page($atualPage, "contato")?>"><?= anchor("contato","Contato")?></li>
                        </ul>    
                    </nav>
              
            </div>    
        </header>
