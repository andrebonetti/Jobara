<div class="my-content imovel-photos">
	<div class="myContainer">
	
		<?php  if($imovel['foto_principal'] == NULL){?>
			<img class="foto_slide" src="<?=base_url("img/sem-foto.gif")?>">	
		<?php } ?>
		
		<?php if(($imovel['foto_principal'] != NULL)&&(count($imagens) == 1)){?>
			<img class="foto_slide" src="<?=base_url("img/".$imovel['foto_principal']."")?>">	
		<?php } ?>
		
		<?php if(count($imagens) > 1){?>
		
        <div class="slide-show" id="slider1_container">
            
            <!-- Slides Container -->
            <div data-u="slides" class="slide-container">
                
                <?php for($n = 0;$n<count($imagens);$n++){?> 
                    <div class="content slide-<?=$n?>">            
                        <img class="foto_slide" src="<?=base_url("img/".$imagens["$n"]."")?>">
                    </div>
      			<?php } ?>
                
            </div>
                         
            <div data-u="navigator" class="jssorb21">
                <div data-u="prototype"
                style="POSITION: absolute; WIDTH: 18px; HEIGHT: 18px; text-align:center; color:White; font-size:12px;"></div>
            </div>
    
            <!-- Arrow Left -->
            <span data-u="arrowleft" class="jssora21l" style="">
            </span>
            <!-- Arrow Right -->
            <span data-u="arrowright" class="jssora21r" style="">
            </span>
            
        </div>        
        
        <?php } ?>
	</div>
</div>
<div class="my-content imovel-descricao">
	<div class="myContainer">
        <div class="part part-1">
            
            <!-- Bairro -->
            <h1> <?=ucwords($imovel['tipo_imovel'])?> em <?=ucwords($imovel['bairro'])?></h1>
            
            <!-- Tipo Negócio -->
            <?php if($imovel['tipo_negocio'] == "venda"){?>
            <h2 class=" negocio venda">Imóvel a Venda</h2><?php } ?>
            
            <?php if($imovel['tipo_negocio'] == "aluguel"){?>
            <h2 class="negocio aluguel">Imóvel para Aluguel</h2><?php } ?>
            
            <!-- Endereço -->
            <?php /*
            <h2>Endereço:</h2>
            <p><?=ucwords($imovel['endereco'])?>, <?=$imovel['complemento']?></p>
            <p><?=ucwords($imovel['cidade'])?>, <?=$imovel['estado']?></p>
            */ ?>
            
            <!-- Preço -->
       
            <h2>Preço:</h2>
            <p class="valor"><?=numeroEmReais($imovel['valor'])?></p>
            
            <!-- Codigo -->
            <h2 class="codigo">Código: <?=$imovel["codigo"]?></h2>
            
        </div>
        
        <div class="part part-2">
            
            <!-- Descrição -->
            
            <h2 class="descricao">Descrição</h2>
            <p><?=ucfirst($imovel['descricao'])?></p>
            
            <!-- Detalhes -->
            <h2>Detalhes</h2>
            <table class="table">
                <tr class="cab">
                    <th>Quartos</th>
                    <th>Vagas Garagem</th>
                    <th>Área Total</th>
                </tr>
                <tr class="content">
                    <td>
                    	<?php if($imovel['quartos'] != 0){?>
                    		<?= $imovel['quartos']?>
                    	<?php } ?>	
                    	<?php if($imovel['quartos'] == 0){?>
                    		Não informado
                    	<?php } ?>	
                    </td>
                    <td class="border">
                    	<?php if($imovel['garagem'] != 0){?>
                    		<?= $imovel['garagem']?>
                    	<?php } ?>	
                    	<?php if($imovel['garagem'] == 0){?>
                    		Não informado
                    	<?php } ?>	
                    <td>
                    	<?php if($imovel['area_total'] != 0){?>
                    		<?= $imovel['area_total']?>
                    	<?php } ?>	
                    	<?php if($imovel['area_total'] == 0){?>
                    		Não informado
                    	<?php } ?>	
                    </td>
                </tr>
            </table>
                
        </div>
        
	</div>
</div>

<div class="my-content imovel-relat">
	<div class="myContainer">
		<h2>Imóveis Relacionados</h2>
        <div class="boxes">
            <?php foreach($imoveis_relat as $imovel){?>
                <div class="box-master">
                    <div class="box">
                        <div class="img-content">
                            <?= anchor("imovel-para-".tipo_negocio_infinitivo($imovel['tipo_negocio'])."/".url_title($imovel['bairro'])."/codigo/".$imovel['id']."","
                                <img src='".base_url("img/".$imovel['foto_principal']."")."'>")?>
                           </div>
                            
                           <h2><?= anchor("imovel-para-".tipo_negocio_infinitivo($imovel['tipo_negocio'])."/".url_title($imovel['bairro'])."/codigo/".$imovel['id']."", "".ucwords($imovel['bairro'].""))?></h2>
                                
                        <h3><?=$imovel['tipo_imovel']?> para <?= tipo_negocio_infinitivo($imovel['tipo_negocio']) ?></h3>
                        <h4><?=numeroEmReais($imovel['valor'])?></h4>
                        
                    </div>
                </div>    
            <?php } ?>
        </div>
	</div>
</div>		

<script>
    jssor_slider1_starter('slider1_container');
</script>
<script src="<?= base_url("js/my_scripts-imoveisDescr.js")?>"></script>
