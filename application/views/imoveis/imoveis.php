<div class="my-content imoveis">
    
	<div class="myContainer">
        <div class="menu <?php if($type != "0"){ echo "active_phone";}?> ">
            
            <div id="btn-close-menu"> <img src='<?=base_url("img/setaLEFT.png")?>'> Fechar Busca </div>
        
        	<! -- CLEAN FILTRO -->
        	<?php 
        		$cont = 0; 	
        		foreach($filtros as $filtro){if($filtro != NULL){ $cont++; }}
        	?>
        	
        	<?php if($cont > 1){?>	          
	        	<div class="busca bsc-clean">
	        		<?= anchor("imoveis/clean/all/pagina/1","Limpar Todos os Filtros",array("class"=>"btn btn-danger")) ?>
	        	</div>	        	
        	<?php } ?>
        
        	<! -- TIPO NEGÓCIO -- >
        	
            <div class="busca bsc-1 <?=active_type($filtros['tipo_negocio'])?>">
            
            	<?= anchor("imoveis/tipo_negocio/cancel/pagina/1","<img class='close-menu' src='".base_url("img/close.png")."'>")?>
            	
                <h2>Imóveis Para:</h2>
                <?= anchor("imoveis/tipo_negocio/venda/pagina/1","Comprar",array("class"=>"btn btn-default ".active_value("venda",$filtros['tipo_negocio']).""))?>
                <?= anchor("imoveis/tipo_negocio/aluguel/pagina/1","Alugar",array("class"=>"btn btn-default ".active_value("aluguel",$filtros['tipo_negocio']).""))?>	
            
            </div>
            
            <! -- BUSCA -- >
            <div class="busca bsc-2 <?=active_type($filtros['id'])?>">
            
                <?= anchor("imoveis/search/cancel/pagina/1","<img class='close-menu' src='".base_url("img/close.png")."'>")?>
            	
                <h2>Buscar</h2>
                              
                    <input type="text" id="key-word" class="no-view form-control search-for" placeholder="Buscar Palavra Chave">
                    <input type="submit" id="search-all" class="no-view btn btn-default" value="Buscar">
                       
                    <?= form_open("imoveis/codigo")?>
                        <input type="text" name="codigo" class="form-control" placeholder="Buscar pelo Código" <?php if($filtros['id'] != NULL){?> value="<?=$filtros['id'];}?>">
                        <input type="submit" id="search-code" class="btn btn-default" value="Buscar">
                    <?= form_close()?>    
                
            </div>
            
            <! -- TIPO IMOVEL -- >
            <div class="busca bsc-3 <?=active_type($filtros['tipo_imovel'])?>">
                
                <?= anchor("imoveis/tipo_imovel/cancel/pagina/1","<img class='close-menu' src='".base_url("img/close.png")."'>")?>
            	
                <h2>Tipo de Imóvel:</h2>
                
                    <select multiple class="form-control" name="tipo">
	                	                	
	                	<?php if($filtros['tipo_imovel'] != NULL){?>
	                		<option class="active-value" value="<?=$filtros['tipo_imovel']?>"><?=ucwords($filtros['tipo_imovel'])?></option>
	                	<?php } ?>
	                	  	 	
	                	<?php foreach ($tipos_imoveis as $tipo){?>	
	                    	<option name="tipo_imovel" class="option-for-url <?=desactive($filtros['tipo_imovel'],no_acento_code($tipo['tipo_imovel']))?>" value="<?=no_acento_code($tipo['tipo_imovel'])?>"><?=ucwords($tipo['tipo_imovel'])?></option>
	                    <?php } ?>
	                    
	                </select>
                
            </div>
            
            <div class="busca bsc-4 <?=active_type($filtros['cidade'])?> <?=active_type($filtros['bairro'])?>">
                                        
                <h2>Localização:</h2>
                        
	            <! -- CIDADES -- >  
	             
	            <?php if($filtros['cidade'] != NULL){$atual_value = "cidade";}else{$atual_value = "0";} ?>
	            <?= anchor("imoveis/cidade/cancel/pagina/1","<img class='close-menu2".active_value("cidade", $atual_value)."' src='".base_url("img/close.png")."'>")?>
	            
	            <label>Cidade:</label>
	            <select multiple class="form-control" name="tipo">
                   	                	
	                	<?php if($filtros['cidade'] != NULL){?>
	                		<option class="active-value" value="<?=$filtros['cidade']?>"><?=ucwords($filtros['cidade'])?></option>
	                	<?php } ?>
	                	  	 	
	                	<?php foreach ($cidades as $cidade){?>	
	                    	<option name="cidade" class="option-for-url <?=desactive($filtros['cidade'],$cidade['cidade'])?>" value="<?=no_acento_code($cidade['cidade'])?>"><?=ucwords($cidade['cidade'])?></option>
	                    <?php } ?>
                   
                </select>
               
                <! -- BAIRROS -- >
                <?php if($filtros['bairro'] != NULL){$atual_value = "bairro";}else{$atual_value = "0";} ?>
                <?= anchor("imoveis/bairro/cancel/pagina/1","<img class='close-menu2".active_value("bairro", $atual_value)."' src='".base_url("img/close.png")."'>")?>
                
                <label>Bairro:</label> 
                <select multiple class="form-control" name="tipo">
                	
	                	<?php if($filtros['bairro'] != NULL){?>
	                		<option class="active-value" value="<?=$filtros['bairro']?>"><?=ucwords($filtros['bairro'])?></option>
	                	<?php } ?>
	                	  	 	
	                	<?php foreach ($bairros as $bairro){?>	
	                    	<option name="bairro" class="option-for-url <?= desactive($filtros['bairro'],($bairro['bairro']))?>" value="<?=no_acento_code($bairro['bairro'])?>"><?=ucwords($bairro['bairro'])?></option>
	           		<?php } ?>
	           		
                </select>
                
            </div>
            
            <! -- VALORES -- >
            <div class="busca bsc-5 <?=active_type($filtros['valor-minimo'])?> <?=active_type($filtros['valor-maximo'])?>">
                
                <?= anchor("imoveis/valores/cancel/pagina/1","<img class='close-menu' src='".base_url("img/close.png")."'>")?>
                 
                <h2>Valor:</h2>
                
                <div class="input-group">
			      <div class="input-group-addon prev">Valor Mínimo: R$</div>
			      <input type="text" class="form-control valor-min" <?php if($filtros['valor-minimo'] != NULL){?> value="<?=$filtros['valor-minimo'];}?>">
			      <div class="input-group-addon aft">,00</div>
			    </div>
			    
			    <div class="input-group">
			      <div class="input-group-addon prev">Valor Máximo: R$</div>
			      <input type="text" class="form-control valor-max" <?php if($filtros['valor-maximo'] != NULL){?> value="<?=$filtros['valor-maximo'];}?>">
			      <div class="input-group-addon">,00</div>
			    </div>
                
                <input type="submit" id="submit-valor" class="btn btn-default" value="Buscar">
                
            </div>
            
            <! -- QUARTOS -- >
            <div class="busca bsc-6 <?=active_type($filtros['quartos'])?>">
                <?= anchor("imoveis/quartos/cancel/pagina/1","<img class='close-menu' src='".base_url("img/close.png")."'>")?>
                
                <h2>Número de Quartos:</h2>
                
                <ul class="pagination">
                	
                	<?php for ($n=1;$n<=5;$n++){?>
	                    <li><?= anchor("imoveis/quartos/$n/pagina/1","$n",array("class"=>active_value("$n",$filtros['quartos'])))?></li>
            		<?php } ?>

                </ul>
            </div>
            <div class="busca bsc-7 <?=active_type($filtros['imoveis_fotos'])?>">
            	
            	<?php if($filtros['imoveis_fotos'] != NULL){$atual_value = "foto";}?>
                <?= anchor("imoveis/imoveis_fotos/cancel/pagina/1","<img class='close-menu2".active_value("foto", $atual_value)."' src='".base_url("img/close.png")."'>")?>
                <?= anchor("imoveis/imoveis_fotos/1/pagina/1","Imóveis com foto",array("class"=>"btn btn-default ".active_value("foto",$atual_value).""))?>	
            
            </div>
        </div>
        
        <div class="imov-content">
            <h1>
            <?php if ($filtros['tipo_imovel'] == NULL){ ?>Imóveis<?php } ?>
            <?php if ($filtros['tipo_imovel'] != NULL){ echo ucwords($filtros['tipo_imovel']); } ?>
            <?php if ($filtros['tipo_negocio'] != NULL){ ?> para <?=tipo_negocio_infinitivo2($filtros['tipo_negocio'])?> <?php } ?>
            <?php if ($filtros['bairro'] != NULL){ ?> em <?=ucwords($filtros['bairro'])?> <?php } ?>
            <?php if ($filtros['cidade'] != NULL){ ?> - <?=ucwords($filtros['cidade'])?> <?php } ?></h1>
            
            <div class="cabecalho">
            	
            	<?php if ($num_imoveis == 0){?>
            		<p class="alert alert-warning">Nenhum Imóvel encontrado com estas especificações !</p>
            	<?php } else {?>
            	
	            	<p>Total de <?=$num_imoveis?> imóveis.</p>
	            	<select class="form-control" >
	            		
	            		<?php if ($filtros['order'] != NULL){?>
	            		 <option class="option-for-url active" name="order" value="<?= $filtros['order'] ?>"><?= changeView($filtros['order']) ?></option>
	            		 <?php } ?>
	            		 
	            		<?php if ($filtros['order'] == NULL){?> 
	            		<option>Ordenar por:</option>
	            		<?php } ?>
	            		
                        <option class="option-for-url <?= desactive($filtros['order'],"codigo") ?>" name="order" value="codigo">Código</option>
	            		<option class="option-for-url <?= desactive($filtros['order'],"menor_preco") ?>" name="order" value="menor_preco">Menor Preço</option>
	            		<option class="option-for-url <?= desactive($filtros['order'],"maior_preco") ?>" name="order" value="maior_preco">Maior Preço</option>
	            	</select>
            	<?php } ?>
            </div>
            
            <div id="btn-menu">Busca Personalizada <img src='<?=base_url("img/setaRIGHT.png")?>'></div>
            
            <?php foreach($imoveis as $imovel){?>
            <div class="box-master">
                <div class="box">
                
                <?php 
	                if($imovel["foto_principal"] != NULL){ $imagem = $imovel["foto_principal"];}
					if($imovel["foto_principal"] == NULL){ $imagem = "sem-foto.gif";}
                
                    if($imovel["bairro"] != NULL){ $bairro = $imovel["bairro"];}
                    if($imovel["bairro"] == NULL){ $bairro = "bairro";}
				?>	
			         
                    
                    <div class="head-box">
                        <?= anchor("imovel-para-".tipo_negocio_infinitivo($imovel['tipo_negocio'])."/".no_acento_code($bairro)."/id/".$imovel['id']."","
                            <img src='".base_url("img/".$imagem."")."'>
                            <h2>".ucwords($imovel['bairro'])."</h2>"
                        )?>

                        <h3 class="<?=$imovel['tipo_negocio']?>"><?=$imovel['tipo_imovel']?> para <?= tipo_negocio_infinitivo($imovel['tipo_negocio']) ?></h3>
                        <h4><?=numeroEmReais($imovel['valor'])?></h4>
                        <h5 class="codigo">Código: <?=$imovel["codigo"]?></h5>
                    </div>
                    
                    <p><?= ucfirst($imovel['descricao'])?>...<a href="">Leia mais</a></p>
                </div>        
            </div>
            <?php } ?>
            
            <!-- Pagination -->
            <ul class="pagination">
            	<?php if ($num_pages > 1){?>
            	
	                   		<!-- primeiro -->
			                <?php if($pag >= 4){?> 
			                    <li><?= anchor("imoveis/$type/$value/pagina/1","1......")?></li> 
			                <?php } ?> 
			                
			                <!-- anterior IF-PAG - 2 -->
			                <?php if(($pag != '1')&&(($pag-2) >= 1)) { $page = $pag-2?>
			                	<li><?= anchor("imoveis/$type/$value/pagina/$page",$page)?></li>  
			                <?php } ?> 
		                    
		                    <!-- anterior IF-PAG - 1 -->
			                <?php if($pag != '1'){ $page = $pag-1?>
			                	<li><?= anchor("imoveis/$type/$value/pagina/$page",$page)?></li>  
			                <?php } ?> 
		                    	
		                    <!-- atual -->
		                    <li class="active"><?= anchor("imoveis/$type/$value/pagina/$pag",$pag)?></li>   
		                    
		                    <!-- proximo IF-SET + 1-->
		                    <?php for($n=1;$n<10;$n++){
		                    	if(($pag+$n) <= $num_pages){?>
					                <?php if(($pag+0.1) <= $num_pages ){ $page = $pag+$n?>
					                	<li><?= anchor("imoveis/$type/$value/pagina/$page",$page)?></li>  
					                <?php }}} ?>
			                
		                    <!-- ultimo -->
			                <?php if((($pag+1.1) <= $num_pages)or(($pag+2.1) <= $num_pages)or($num_pages < '1')){ 
			                	$page = (int)($num_pages+1);
			                	if(($page > '3')){?>
			                		<li><?= anchor("imoveis/$type/$value/pagina/$page","......$page")?></li>   
			                <?php }} ?>
		    	<?php } ?>            	
        	</ul>
      
        </div>
	</div>
</div>

            <span class="no-view"><?= anchor("imoveis","",array("id"=>"url"))?></span>    
            <span class="no-view"><?= anchor("imoveis/codigo","",array("id"=>"url_code"))?></span>  
	    	
<script src="<?= base_url("js/my_scripts-imoveis.js")?>"></script>

