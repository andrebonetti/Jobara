<div class="content-adm imoveis-adm">
    
	<div class="myContainer">
               
        <?= anchor("adm/imoveis/all/0/print","<img src='".base_url('img/icone_impressora.png')."'>",array("class" => "btn-print"))?>
             
        
        <?= anchor("adm/home","<img src='".base_url('img/setaLEFT.png')."'> Voltar para Home",array("class" => "btn-back_home"))?>
             
        <button class="btn btn-primary" id="btn-add-imovel">Adicionar Imóvel</button>
        <button class="btn btn-danger" id="btn_hide-add-imovel">Cancelar</button>
         
        <!-- ADD IMOVEL -->
        <div class="add-imovel">
            
            <?= form_open_multipart('adm/add_imovel');?>
            
                <h2>Adicionar Imóvel</h2>
                
                <div class="part part-1">
                    <label>Código:</label>
                    <input type="text" class="form-control id" name="codigo">
      
                    <input type="hidden" id="data_insert" name="data_insert" value="">
                    <input type="hidden" name="destaque_order" value="0">

                    <label>Tipo Negócio:</label>
                    <input type="radio" name="tipo_negocio" value="venda">Venda<br>
                    <input type="radio" name="tipo_negocio" value="aluguel">Aluguel<br>
                    
                    <label>Valores:</label>
                    <div class="input-group valor">
                        <div class="input-group-addon prev">Valor:R$</div>
                            <input type="text" class="form-control" name="valor">
                        <div class="input-group-addon aft">,00</div>
			         </div>

                    <div class="input-group valor_iptu">
                        <div class="input-group-addon prev">Valor do IPTU:R$</div>
                            <input type="text" class="form-control" name="valor_iptu">
                        <div class="input-group-addon aft">,00</div>
			         </div>

                    <label>Tipo de Imovel:</label>
                    <select class="form-control tipo_imovel" name="tipo_imovel">
                        <option value="0">Escolha o tipo de imóvel</option>
                                                    <option value="apartamento">Apartamento</option>
                                                    <option value="assobrado">Assobrado</option>
                                                    <option value="casa">Casa</option>
                                                    <option value="chácara">Chácara</option>
                                                    <option value="comercial">Comercial</option>
                                                    <option value="galpão">Galpão</option>
                                                    <option value="predio comercial">Predio Comercial</option>
                                                    <option value="renda">Renda</option>
                                                    <option value="sala">Sala</option>
                                                    <option value="salão">Salão</option>
                                                    <option value="salão-salas">Salão-salas</option>
                                                    <option value="sobrado">Sobrado</option>
                                                    <option value="terreno">Terreno</option>
                    </select>
   
                    <label>Proprietario:</label>
                    <input type="text" class="form-control prop prop_nome" name="proprietario_nome" placeholder="Nome:">
                    <input type="text" class="form-control prop prop_tel" name="proprietario_telefone" placeholder="Telefone:">
                    <input type="text" class="form-control prop prop_email" name="proprietario_email" placeholder="Email:">
                    
                </div>
                <div class="part part-2">
                    
                    <?php /* for($n=1;$n <= 14;$n++){?>
                    <label>Foto <?=$n?>:</label>
                    <input type="file" name="foto<?=$n?>">
                    <?php } */ ?>

                    <label>Endereço:</label>
                    <input type="text" class="form-control endereco" name="endereco" placeholder="Rua:">
                    <input type="text" class="form-control complemento" name="complemento" placeholder="Complemento:">
                    
                    <select class="form-control estado" name="estado">
                        <option value="">Estado</option>
                        <option value="AC">AC</option>
                        <option value="AL">AL</option>
                        <option value="AM">AM</option>
                        <option value="AP">AP</option>
                        <option value="BA">BA</option>
                        <option value="CE">CE</option>
                        <option value="DF">DF</option>
                        <option value="ES">ES</option>
                        <option value="GO">GO</option>
                        <option value="MA">MA</option>
                        <option value="MG">MG</option>
                        <option value="MS">MS</option>
                        <option value="MT">MT</option>
                        <option value="PA">PA</option>
                        <option value="PB">PB</option>
                        <option value="PE">PE</option>
                        <option value="PI">PI</option>
                        <option value="PR">PR</option>
                        <option value="RJ">RJ</option>
                        <option value="RN">RN</option>
                        <option value="RS">RS</option>
                        <option value="RO">RO</option>
                        <option value="RR">RR</option>
                        <option value="SC">SC</option>
                        <option value="SE">SE</option>
                        <option value="SP">SP</option>
                        <option value="TO">TO</option>
                    </select>
                    
                    <input type="text" class="form-control cidade" name="cidade" placeholder="Cidade:">
                    <input type="text" class="form-control bairro" name="bairro" placeholder="Bairro:">
                    
                    <label>Descrição:</label>
                    <textarea class="form-control descricao" name="descricao"></textarea>
                    
                    <label>Especificações:</label>
                    <input type="number" class="form-control quartos" name="quartos" placeholder="Quartos">
                    <input type="number" class="form-control garagem" name="garagem" placeholder="Vagas Garagem">
                    <input type="text" class="form-control area_total" name="area_total" placeholder="Área total">
                    
                    <label>Foto_principal:</label>
                        <input type="file" name="foto_principal">   
                    
                </div> 
            
                    <div class="galeria-input">
                        
                        <label>Galeria:</label> 
                    
                        <?php for($n = 1;$n <= 14;$n++){?>  
                            <div  class="input-item">
                                <label>Foto <?=$n?>:</label>
                                <input type="file" name="foto<?=$n?>" class="original_file" id="file-original_<?=$n?>">
                            </div>    
                        <?php } ?>
                    </div>
            
                <input type="submit" class="btn btn-success btn-adicionar-imovel" value="Adicionar">
            <?= form_close();?>
                
        </div>
        
        <div class="busca-adm">
        <!-- BUSCA CODIGO -->
            <div class="bsc bsc-codigo">
                
                <?= form_open("adm/codigo")?> 
                    <div class="input-group">

                      <span class="input-group-addon" id="basic-addon1">Buscar por Código:</span>
                      <input type="text" name="codigo" class="form-control" id="code" placeholder="..." 
                             <?php if($id != false){?>
                             value="<?=$id?>"
                             <?php } ?> 
                        aria-describedby="basic-addon1">
                    </div>
                    <input type="submit" value="Buscar" class="btn btn-warning btn-codigo">
                
                <?= form_close()?>
                
            </div>
            <div class="bsc bsc-endereco">
                <div class="input-group">
                  <span class="input-group-addon" id="basic-addon1">Buscar por Endereço:</span>
                  <input type="text" class="form-control" id="endereco" placeholder="..." 
                        <?php if($endereco != false){?>
                         value="<?=$endereco?>"
                         <?php } ?>      
                    aria-describedby="basic-addon1">
                </div>

                <button class="btn btn-warning btn-endereco">Buscar</button>
                
                
            </div>
            
            <!-- CLEAN FILTRO -->
            <?php 
                $cont = 0; 	
                foreach($filtros as $filtro){if($filtro != NULL){ $cont++; }}
            ?>

            <?php if($cont >= 1){?>	          
               <div class="busca bsc-clean">
                   <?= anchor("adm/imoveis/clean/all","Limpar Busca",array("class"=>"btn btn-danger")) ?>
               </div>	        	
            <?php } ?>     
        </div>   
        
        <?= form_open("adm/imoveis/endereco/0",array("class"=>"form_endereco","name"=>"form_endereco"))?>
            <input type="hidden" name="endereco" id="input-endereco" class="form-control">
        <?= form_close()?>
        
        <table class="table table-striped">
                <tr>
                    <th>Imagem</th>
                    <th>Código</th>
                    <th>Status</th>
                    <th>Tipo do Imovel</th>
                    <th>Tipo de negócio</th>
                    <th>Cidade</th>
                    <th>Bairro</th>
                    <th>Endereço</th>
                    <th>Valor</th>
                    <th>Ações</th>
                </tr>
            <?php  foreach($imoveis as $imovel){?>
            
                <input type="hidden" class="usuario-<?=$imovel['id']?>" value="<?=$imovel['usuario']?>">
                <input type="hidden" class="data_insert-<?=$imovel['id']?>" value="<?=$imovel['data_insert']?>">
                <input type="hidden" class="valor_iptu-<?=$imovel['id']?>" value="<?=$imovel['valor_iptu']?>">
                <input type="hidden" class="prop_nome-<?=$imovel['id']?>" value="<?=$imovel['proprietario_nome']?>"> 
                <input type="hidden" class="prop_tel-<?=$imovel['id']?>" value="<?=$imovel['proprietario_telefone']?>">
                <input type="hidden" class="prop_email-<?=$imovel['id']?>" value="<?=$imovel['proprietario_email']?>">    
                <input type="hidden" class="complemento-<?=$imovel['id']?>" value="<?=$imovel['complemento']?>">  
                <input type="hidden" class="quartos-<?=$imovel['id']?>" value="<?=$imovel['quartos']?>">
                <input type="hidden" class="garagem-<?=$imovel['id']?>" value="<?=$imovel['garagem']?>">    
                <input type="hidden" class="area_total-<?=$imovel['id']?>" value="<?=$imovel['area_total']?>">  
                <input type="hidden" class="descricao-<?=$imovel['id']?>" value="<?=$imovel['descricao']?>"> 
                <input type="hidden" class="usuario-<?=$imovel['id']?>" value="<?=$imovel['usuario']?>">
                
                <?php for($n = 1;$n <= 14;$n++){?> 
                    <input type="hidden" class="foto-<?=$n?>_<?=$imovel['id']?>" value="<?= base_url("img/".$imovel["foto".$n.""]."")?>">
                <?php } ?>
            
                <tr>
                    <td >
                        <img class="img-<?=$imovel['id']?>" src="<?= base_url("img/".$imovel['foto_principal']."")?>">
                    </td>
                    <td class="codigo-<?=$imovel['id']?>"><?=$imovel['codigo']?></td>
                    
                    <?php if($imovel['status'] == "1"){?>
                        <td class="status-active status-<?=$imovel['id']?>" name="<?=$imovel['status']?>">Ativo</td>
                    <?php } ?>
                    <?php if($imovel['status'] == "0"){?>
                        <td class="status-desactive status-<?=$imovel['id']?>" name="<?=$imovel['status']?>">Desativado</td>
                    <?php } ?>
                    
                    <td class="tipo_imovel-<?=$imovel['id']?>"><?=ucwords($imovel['tipo_imovel'])?></td>
                    <td class="tipo_negocio-<?=$imovel['id']?>" name="<?=$imovel['tipo_negocio']?>"><?=ucwords($imovel['tipo_negocio'])?></td>
                    <td class="cidade-<?=$imovel['id']?>"><?=ucwords($imovel['cidade'])?></td>
                    <td class="bairro-<?=$imovel['id']?>"><?=ucwords($imovel['bairro'])?></td>
                    <td class="endereco-<?=$imovel['id']?>"><?=ucwords($imovel['endereco'])?></td>
                    <td class="valor-<?=$imovel['id']?>" value="<?=$imovel['valor']?>"><?=numeroEmReais($imovel['valor'])?></td>
                    <td>
                        <button class="btn btn-primary edit_imovel" name="<?=$imovel['id']?>" data-toggle="modal" data-target=".bs-example-modal-lg">Editar</button>
                        <button class="btn btn-danger delete_imovel" name="<?=$imovel['id']?>" data-toggle="modal" data-target=".bs-example-modal-sm">Excluir</button>
                        <button class="btn btn-warning show_details" name="<?=$imovel['id']?>" data-toggle="modal" data-target="#myModal">Detalhes</button>
                    </td>
                </tr>
            <?php } ?>
        </table>
        
        <?= anchor("adm/imoveis/all/0","Ver Todos os Imóveis",array("class"=>"btn btn-default all-imoveis"))?>
    </div>
    
</div>



<!------- MODAIS ------->   



<!-- CONFIRMA DELETE -->
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content delete_screen">
            <img class="field-imagem" src="">
        	<p class="alert alert-warning">Tem certeza que deseja remover O imóvel: Código: <span class="field-codigo"></span></p>
        	<a href="" class="btn btn-primary confirma-delete">Confirmar</a>
         	<?= anchor("adm/delete_imovel/","",array("class" => "link_delete"))?>    
        	<?= anchor("#","Cancelar",array("class" => "btn btn-danger","id"=>"cancela-delete","data-dismiss"=>"modal"))?>    
    </div>
  </div>
</div>

<!-- DETALHES IMOVEIS -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content show-details">
        <h3>Detalhes do Imovel</h3>
        
            <img class="field-imagem" src="">
        
        <h4>Dados da Inserção</h4>
        <table class="table">
            
            <tr>
                <th>Imovel adicionado pelo usuário:</th>
                <td class="field-usuario"></td>
            </tr>
            <tr>
                <th>Imovel adicionado na data:</th>
                <td class="field-data_insert">--/--/----</td>
            </tr>
            
        </table>
        
        <h4>Dados do Proprietario</h4>
        <table class="table">
            
            <tr>
                <th>Nome:</th>
                <td class="field-nome">-----</td>
            </tr>
            <tr>
                <th>Telefone:</th>
                <td class="field-telefone">-----</td>
            </tr>
            <tr>
                <th>E-mail:</th>
                <td class="field-email">-----</td>
            </tr>
            
        </table>
        
        <h4>Dados do Imóvel</h4>
        <table class="table">
            
            <tr>
                <th>Código:</th>
                <td class="field-codigo">-----</td>
            </tr>
            <tr>
                <th>Status:</th>
                <td class="field-status">-----</td>
            </tr>
            <tr>
                <th>Tipo do Imovel:</th>
                <td class="field-tipo_imovel">-----</td>
            </tr>         
            <tr>
                <th>Tipo do Negócio:</th>
                <td class="field-tipo_imovel">-----</td>
            </tr>
             <tr>
                <th>Cidade:</th>
                <td class="field-cidade">-----</td>
            </tr>
            <tr>
                <th>Bairro:</th>
                <td class="field-bairro">-----</td>
            </tr>
            <tr>
                <th>Endereco:</th>
                <td class="field-endereco">-----</td>
            </tr>  
            <tr>
                <th>Complemento:</th>
                <td class="field-complemento">-----</td>
            </tr>   
            <tr>
                <th>Quarto:</th>
                <td class="field-quartos">-----</td>
            </tr>   
            <tr>
                <th>Garagem:</th>
                <td class="field-garagem">-----</td>
            </tr>   
            <tr>
                <th>Área Total:</th>
                <td class="field-area_total">-----</td>
            </tr>   
            <tr>
                <th>Descrição:</th>
                <td class="field-descricao">-----</td>
            </tr>   
            <tr>
                <th>Valor:</th>
                <td class="field-valor">-----</td>
            </tr>
            <tr>
                <th>Valor do IPTU:</th>
                <td class="field-valor_iptu">-----</td>
            </tr>
            
        </table>
        
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<!-- UPDATE IMOVEL -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content update-imovel">
        
        <img class="field-imagem" src="">
        <hr>
        
        <?= anchor("adm/update_imovel/","",array("class" => "link_update")) ?>
        <?= form_open_multipart('adm/update_imovel',array("class"=>"update_imovel"));?> 
            
            <div class="part_up-1"> 
                <h4>Dados do Proprietario</h4>

                <label>Nome:</label>
                <input type="text" name="proprietario_nome" class="input-nome form-control" placeholder=".....">
                <label>Telefone:</label>
                <input type="text" name="proprietario_telefone" class="input-telefone form-control" placeholder=".....">
                <label>E-mail:</label>
                <input type="text" name="proprietario_email" class="input-email form-control" placeholder=".....">

                <h4>Dados do Imóvel</h4>

                <label>Código:</label>
                <input type="text" name="codigo" class="input-codigo form-control" value="">    
                <label>Status:</label>
                <input type="radio" name="status" class="input-status" value="0">Desativado<br>
                <input type="radio" name="status" class="input-status" value="1">Ativado<br>

                <label>Tipo Negócio:</label>
                <input type="radio" name="tipo_negocio" class="input-negocio" value="venda">Venda<br>
                <input type="radio" name="tipo_negocio" class="input-negocio" value="aluguel">Aluguel<br>
                    
                <label>Cidade:</label>
                <input type="text" name="cidade" class="input-cidade form-control" value=""> 
                <label>Bairro:</label>
                <input type="text" name="bairro" class="input-bairro form-control" value=""> 
                <label>Endereço:</label>
                <input type="text" name="endereco" class="input-endereco form-control" value=""> 
                <label>Complemento:</label>
                <input type="text" name="complemento" class="input-complemento form-control" value="">     
                
            </div> 
        	 
            <div class="part_up-2">    
                <br><br>
                <label>Tipo de Imovel:</label>
                <select class="form-control tipo_imovel" name="tipo_imovel">
                    <option class="input-tipo" value="">Escolha o tipo de imóvel</option>
                    <?php foreach($tipos_imoveis as $tipo){?>
                        <option value="<?=$tipo["tipo_imovel"]?>"><?=ucwords($tipo['tipo_imovel'])?></option>
                    <?php } ?>
                </select>            

                <label>Quartos:</label>
                <input type="number" class="form-control input-quartos" name="quartos" placeholder="Quartos">
                <label>Garagem:</label>
                <input type="number" class="form-control input-garagem" name="garagem" placeholder="Vagas Garagem">
                <label>Área Total:</label>
                <input type="text" class="form-control input-area_total" name="area_total" placeholder="Área total">
                
                <label>Descrição:</label>
                    <textarea rows="8" class="form-control input-descricao" name="descricao"></textarea>
                         
                <label>Valor:</label>
                <input type="text" name="valor" class="input-valor form-control" value=""> 
                <label>Valor IPTU:</label>
                <input type="text" name="valor_iptu" class="input-valor_iptu form-control" value="">     
            </div> 
            
               
            <div class="imagens-imovel">
                <h3>Trocar Imagens</h3>
                
                <div class="input-item">
                    <label>Foto Principal</label>
                    <img class="up_img_principal" src="">
                    <input type="file" name="foto_principal" class="original_file">  
                </div>
                    
                <?php for($n = 1;$n <= 14;$n++){?> 
                    <div class="input-item">
                        <label>Foto <?=$n?></label>
                        <img class="up_foto-<?=$n?>" src="">
                        <input type="file" name="foto<?=$n?>" class="original_file">  
                    </div>    
                <?php } ?>
            </div>
                
            <input type="submit" class="btn btn-primary" value="Atualizar">    
                
        <?= form_close();?>       	
            
    </div>
  </div>
</div>
      
<span class="no-view"><?= anchor("adm/imoveis","teste",array("id"=>"url"))?></span> 

<script src="<?= base_url("js/my_scripts-adm-imoveis.js")?>"></script>