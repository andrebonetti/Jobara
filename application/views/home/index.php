<script src="<?= base_url("js/my_jassor_list.js")?>"></script>         
      
    <div id="slider1_container" style="height: 550px;">

            <!-- Loading Screen -->
            <div u="loading" class="loading">
                <div class="loading1"></div>
                <div class="loading2"></div>
            </div>

            <!-- Slides Container -->
            <div u="slides" class="uSlides">
                <div>
                    <div id="sliderh1_container" class="sliderh1 sliderH">

                        <!-- Slides Container -->
                        <div u="slides" class="uSlidesContent">
                            
                            <?php foreach($last_imoveis_aluguel as $imovel){?> 
                            
                                <!--<div><img u="image" src=" /*base_url("img/".$imovel['foto_principal']."")*/ "/></div>-->
                                <div><img u="image" src="http://jobara.com.br/img/<?=$imovel['foto_principal'].""?>"/></div>
                            
                            <?php } ?>
                        
                        </div>

                        <div u="navigator" class="jssorb03">
                            <div u="prototype" style="position: absolute; width: 21px; height: 21px; text-align:center; line-height:21px; color:white; font-size:12px;"><NumberTemplate></NumberTemplate></div>
                        </div>

                    </div>
                    <div u="thumb">
                        <div class="title_back my_thumb"></div>
                        <div class="title my_thumb">
                            Aluguel
                        </div>
                    </div>
                </div>
                <div>
                    <div id="sliderh2_container" class="sliderh2 sliderH">

                        <!-- Slides Container -->
                        <div u="slides" class="uSlidesContent">
                            
                            <?php foreach($last_imoveis_venda as $imovel){?> 
                            
                                <!--<div><img u="image" src=" /*base_url("img/".$imovel['foto_principal']."")*/ "/></div>-->
                                <div><img u="image" src="http://jobara.com.br/img/<?=$imovel['foto_principal'].""?>"/></div>
                            
                            <?php } ?>
                            
                        </div>

                        <div u="navigator" class="jssorb03">
                            <div u="prototype" style="position: absolute; width: 21px; height: 21px; text-align:center; line-height:21px; color:white; font-size:12px;"><NumberTemplate></NumberTemplate></div>
                        </div>

                    </div>
                    <div u="thumb">
                        <div class="title_back my_thumb"></div>
                        <div class="title my_thumb">
                            Venda
                        </div>
                    </div>
                </div>

            </div>
            <!-- ThumbnailNavigator Skin Begin -->
            <div u="thumbnavigator" class="jssort12" style="cursor: default; position:absolute; height: 50px; left:0px; bottom:0px; ">

                <div u="slides" id="cursorSlides" style="cursor: move;">
                    <div u="prototype" class=p style="POSITION: absolute; width: 700px; HEIGHT: 50px; TOP: 0; LEFT: 0;">
                        <thumbnailtemplate style="WIDTH: 100px; HEIGHT: 50px; border: none; position: absolute; TOP: 0; LEFT: 0; "></thumbnailtemplate>
                    </div>
                </div>

            </div>

            <a style="display: none" href="http://www.jssor.com">image carousel</a>

            

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
            
    
    <script type="text/javascript" src="<?= base_url("js/jssor.js")?>"></script>
    <script type="text/javascript" src="<?= base_url("js/my_jassor.js")?>"></script>
    <script type="text/javascript" src="<?= base_url("js/jssor.slider.js")?>"></script>
    <script type="text/javascript" src="<?= base_url("js/jssor.slide_nestedSource.js")?>"></script>
    <script type="text/javascript" src="<?= base_url("js/my_jassor2.js")?>"></script>