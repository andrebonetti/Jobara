<script src="<?= base_url("js/my_jassor_list.js")?>"></script>         

        <div class="busca-rapida">
            <div class="myContainer">
                
                <h1>Venda e Aluguel de Imóveis</h1>
                
                <?= form_open("imoveis/imoveis_temp",array("name"=>"busca-rapida"))?>
                
                    <input type="text" class="form-control" name="buscar" placeholder="Buscar"> 
                    
                    <input type="submit" class="search" value="">
                
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