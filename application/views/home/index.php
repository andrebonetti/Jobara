<script src="<?= base_url("js/my_jassor_list.js")?>"></script>         

				     

        <div class="my-content home">
        	
        	<?php $msg = $this->session->flashdata('msg-error'); if (!empty($msg)){?>
				<p class="alert alert-danger"><?=$msg?></p>
			<?php } ?> 
					
            <div class="myContainer">
                <h1>Venda e Aluguel de Imóveis</h1>

                <span id="btn-busca"><img src='<?=base_url("img/setaDOWN.png")?>'>Busca Rápida</span>
                <span id="busca-close"><img src='<?=base_url("img/setaUP.png")?>'>Fechar</span>
            </div>    
        </div>
        
    	
        <div class="busca-rapida">
            <div class="myContainer">
                
                <?= form_open("imoveis/imoveis_temp",array("name"=>"busca-rapida"))?>
                
                <h2>Busca Rápida</h2>
                <div id="bsc-1" class="busca bsc-1" >
                    
                    <img class='close-menu' src='<?=base_url("img/close.png")?>'>
                    
                    <h3>Imóveis Para:</h3>
                    <button class="btn btn-info bsc-home_tipo bsc-active" id="aluguel" value="aluguel">Alugar</button>
                    <button class="btn btn-primary bsc-home_tipo bsc-active" id="venda" value="venda">Comprar</button>
                         
                    <h3>Procurar pelo Código</h3>
                    <input type="text" class="form-control bsc-active" id="codigo" name="codigo" placeholder="Código"> 
                    
                    <input type="text" id="tipo_negocio" name="tipo_negocio"> 

                </div>
                    
                <div id="bsc-2" class="busca bsc-2">
                    
                    <img class='close-menu' src='<?=base_url("img/close.png")?>'>
                    
                    <h3>Tipo de Imóvel:</h3>
                    <select multiple name="tipo_imovel" id="tipo_imovel" class="form-control">
                    
                        <?php foreach ($tipos_imoveis as $tipo){
                        if(($tipo['tipo_imovel'] != "0")&&($tipo['tipo_imovel'] != "")){?>
	                    	<option  class="bsc-active bsc-home_imovel" value="<?=no_acento_code($tipo['tipo_imovel'])?>">
                                <?=ucwords($tipo['tipo_imovel'])?>
                            </option>
	                    <?php }} ?>
                        
                    </select>
                    <img class="img_relat" src="<?= base_url('img/tipo/apartamento.jpg')?>">
                    
                </div>
                <div id="bsc-3" class="busca bsc-3">
                    
                    <h3>Localização:</h3>
                    
                    <img class='close-menu close-2' id="bsc-3-1" src='<?=base_url("img/close.png")?>'>
                    <select name="cidade" class="form-control cidade">
                        <option value="0">Cidade</option>
                        <?php foreach ($cidades as $cidade){?>	
	                    	<option  class="bsc-active" value="<?=no_acento_code($cidade['cidade'])?>">
                                <?=ucwords($cidade['cidade'])?>
                            </option>
	                    <?php } ?>
                    </select>
                    
                    <img class='close-menu close-2' id="bsc-3-2" src='<?=base_url("img/close.png")?>'>
                    <select name="bairro" class="form-control bairro">
                        <option value="0">Bairro</option>
                        <?php foreach ($bairros as $bairro){?>	
	                    	<option class="bsc-active" value="<?=no_acento_code($bairro['bairro'])?>">
                                <?=ucwords($bairro['bairro'])?>
                            </option>
	                    <?php } ?>
                    </select>
                    
                    <span id="contador_bsc3">0</span>
                    
                </div>
                <div id="bsc-4" class="busca bsc-4">
                                 
                    <img class='close-menu' src='<?=base_url("img/close.png")?>'>
                    
                    <h3>Valor:</h3>
                    
                    <div class="input-group">
                        <input type="text" name="val_min" class="form-control bsc-active valor-min" placeholder="Valor Máximo">
                        <div class="input-group-addon aft">,00</div>
                    </div>

                    <div class="input-group">
                        <input type="text" name="val_max" class="form-control bsc-active valor-max" placeholder="Valor Mínimo">
                        <div class="input-group-addon">,00</div>
                    </div>
                
                </div>
                
                <span id="contador">0</span>
                <button class="btn btn-primary" id="submit">Buscar</button>
                
                <?= form_close()?>
            </div>
        </div>
        
        <div class="my-content home-2">
            <div class="myContainer">
                
                <div class="slide-container" id="slider1_container">

                    <!-- Slides Container -->
                    <div class="slides-content" u="slides">
                        <?php foreach($last_imoveis as $imovel){?> 
                            <div>
                                <img src="<?= base_url("img/".$imovel['foto_principal']."")?>"/>
                                
                                <div class="imov_datelhes">
                                    <h2><?=ucwords($imovel['bairro'])?></h2>
                                    <h3><?=ucwords($imovel['tipo_imovel'])?> para <?=tipo_negocio_infinitivo($imovel['tipo_negocio'])?></h3>
                                    <?= anchor("imovel-para-".tipo_negocio_infinitivo($imovel['tipo_negocio'])."/".url_title($imovel['bairro'])."/id/".$imovel['id']."","Veja mais",array("class"=>"btn btn-primary"))?>

                                </div>
                                
                                <div u="thumb">
                                    <img class="i" src="<?= base_url("img/".$imovel['foto_principal']."")?>"/>
                                    <div class="t"><?=ucwords($imovel['bairro'])?></div>
                                    <div class="c"><?=ucwords($imovel['tipo_imovel'])?> para <?=$imovel['tipo_negocio']?></div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>

                    <div u="thumbnavigator" class="jssort11" style="position:relative;float:right;width:265px; height: 370px;">
                        <div class="nav-slides" u="slides">
                            <div u="prototype" class="p" style="width:260px; height:65px;">
                                <thumbnailtemplate></thumbnailtemplate>
                             </div>
                        </div>
                    </div>

                    <!-- Trigger -->
                    <script>
                        jssor_slider1_starter('slider1_container');
                    </script>
                </div>
                
            </div>
        </div>

        <div class="my-content home-3">
            <div class="myContainer">
                             
                <div class="imov-destac">
                    <h2>Imóveis em Destaque</h2>
                    <h3>Imóveis para Alugar</h3>
                    
                    <div class="boxes">
                        <?php foreach($destaque_aluguel as $imovel){?> 
                                 <div class="box-master">
                                    <div class="box">
                                        <div class="img-content">
                                            <?= anchor("imovel-para-".tipo_negocio_infinitivo($imovel['tipo_negocio'])."/".url_title($imovel['bairro'])."/id/".$imovel['id']."","
                                        <img src='".base_url("img/".$imovel['foto_principal']."")."'>")?>   
                                        </div>
                                        
                                        <h2><?= anchor("imovel-para-".tipo_negocio_infinitivo($imovel['tipo_negocio'])."/".url_title($imovel['bairro'])."/id/".$imovel['id']."", "".ucwords($imovel['bairro'].""))?></h2>
                                        
                                        <h3><?=$imovel['tipo_imovel']?></h3>
                                        <h4><?=numeroEmReais($imovel['valor'])?></h4>
                                    </div>        
                                </div>
                        <?php } ?>
                    </div>
                    
                    <h3>Imóveis para Comprar</h3>
                    
                    <div class="boxes">
                        <?php foreach($destaque_venda as $imovel){?> 
                                 <div class="box-master">
                                    <div class="box">
                                        <div class="img-content">
                                            <?= anchor("imovel-para-".tipo_negocio_infinitivo($imovel['tipo_negocio'])."/".url_title($imovel['bairro'])."/id/".$imovel['id']."","
                                        <img src='".base_url("img/".$imovel['foto_principal']."")."'>")?>   
                                        </div>
                                        
                                        <h2><?= anchor("imovel-para-".tipo_negocio_infinitivo($imovel['tipo_negocio'])."/".url_title($imovel['bairro'])."/id/".$imovel['id']."", "".ucwords($imovel['bairro'].""))?></h2>
                                        
                                        <h3><?=$imovel['tipo_imovel']?></h3>
                                        <h4><?=numeroEmReais($imovel['valor'])?></h4>
                                    </div>        
                                </div>
                        <?php } ?>
                    </div>
                    
                </div>
                 
                <div class="banners">
                    <a href="http://www.portoseguro.com.br"  target=”new”><img src="<?= base_url("img/fianca_locaticia.jpg")?>"></a>           
                    <a data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" href="#"><img class="atendimento" src="<?= base_url("img/atendimento.png")?>"></a>
                </div>

                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel">Atendimento On-line</h4>
                      </div>
                      <div class="modal-body">
                        <form>
                          <div class="form-group">
                            <label for="recipient-name" class="control-label">Email:</label>
                            <input type="text" class="form-control" id="recipient-name">
                          </div>
                          <div class="form-group">
                            <label for="message-text" class="control-label">Mensagem:</label>
                            <textarea class="form-control" id="message-text"></textarea>
                          </div>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        <button type="button" class="btn btn-primary">Enviar Mensagem</button>
                      </div>
                    </div>
                  </div>
                </div>
                
        </div> 
    </div>            
            
        <script>           
            var teste = function(){ 
                var value = $(this).val();
                $(".img_relat").attr("src","<?= base_url('img/tipo/"+value+".jpg')?>"); 
            }  
            $(".bsc-home_imovel").closest("select").on("change",teste);
        </script>  
        
       
         
        <script src="<?= base_url("js/my_scripts-home.js")?>"></script>