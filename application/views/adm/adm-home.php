<div class="content-adm home-adm">

    
	<div class="myContainer">
        
        <h1>Área Administrativa - Home</h1>
        
        <div class="imoveis">
            
            <h2>Imóveis</h2>
            
            <div class="ultimos_imoveis">
                <h3>Ultimos Imóveis Adicionados</h3>
                <table class="table">
                	<tr>
                		<th>Imagem</th>
                        <th>Código</th>
                		<th>Tipo Imóvel</th>
                		<th>Tipo Negocio</th>
                		<th>Bairro</th>
                		<th>Valor</th>
                		<?php /* <th>Ação</th> */ ?>
                	</tr>
                <?php foreach($last_imoveis as $imovel){?>
                	<tr>
                		<td><img class="foto_slide" src="<?=base_url("img/".$imovel['foto_principal']."")?>"></td>
                		<td><?=$imovel["codigo"]?></td>
                        <td><?=$imovel["tipo_imovel"]?></td>
                		<td><?=$imovel["tipo_negocio"]?></td>
                		<td><?=$imovel["bairro"]?></td>
                		<td><?=numeroEmReais($imovel["valor"])?></td>
                        <?php /*
                		<td class="edit-buttons">
                			<button class="btn btn-primary">Editar</button>
                			<button class="btn btn-danger">Excluir</button>
                		</td>
                        */ ?>
                	</tr>
            	<?php } ?>
            	</table>
                
            	<?= anchor("adm/imoveis/0/0","Ver Lista Detalhada",array("class"=>"btn btn-default btn-lista-completa"))?>
                <button class="btn btn-success" id="add_imovel" data-toggle="modal" data-target="#myModal">Adicionar Imóvel</button>
                
            </div>

            <div class="relatorio_imoveis">
                <h3>Relatório de Imóveis Cadastrados</h3>
                
                	<div class="tipo-negocio filtro-cont">
		                <h4>Tipo de negócio</h4>
		                <?php foreach($imoveis_cont["tipo_negocio"] as $filtro => $value ) {?>
							<div class="count-content">
								<h5><?=ucwords($filtro)?></h5>
								<p><?=$value?></p>
							</div>
						<?php } ?>
					</div>
					
					<div class="tipo-imovel filtro-cont">
		                <h4>Tipos de Imóveis</h4>
		                <?php foreach($imoveis_cont["tipo_imovel"] as $filtro => $value ) {?>
							<div class="count-content">
								<h5><?=ucwords($filtro)?></h5>
								<p><?=$value?></p>
							</div>
						<?php } ?>
					</div>
					
					<div class="cidade filtro-cont">
		                <h4>Tipos de Imóveis</h4>
		                <?php foreach($imoveis_cont["cidade"] as $filtro => $value ) {?>
							<div class="count-content">
								<h5><?=ucwords($filtro)?></h5>
								<p><?=$value?></p>
							</div>
						<?php } ?>
					</div>
					
					<div class="bairro filtro-cont">
		                <h4>Tipos de Imóveis</h4>
		                <?php foreach($imoveis_cont["bairro"] as $filtro => $value ) {?>
							<div class="count-content">
								<h5><?=ucwords($filtro)?></h5>
								<p><?=$value?></p>
							</div>
						<?php } ?>
					</div>
            </div>
        
        </div>
        
        <hr>
        
        <h2>Usuários</h2>
        <div class="usuarios">
            
                <div class="img-content">
                    <img class="usuarios-icon" src="<?=base_url("img/usuarios_icon.png")?>">
                </div>
                <div class="usuarios-actions">
            	   <button id="btn-add-usuario" class="btn btn-success">Adicionar Usuário</button>
                </div>
            
                <div class="add-usuario">
                    
                    <img class='close-menu' id="close-add-usuario" src='<?=base_url("img/close.png")?>'>
                    
                    <h3>Novo usuário:</h3>
                    
                    <?= form_open("adm/add_usuario")?>
                        <input type="text" name="nome" class="form-control" placeholder="Nome Completo">
                        <input type="text" name="email" class="form-control" placeholder="E-mail">
                        <input type="text" name="usuario" class="form-control" placeholder="Nome usuario(Login)">
                        <input type="password" name="senha"  class="form-control" placeholder="Senha">
                    
                        <input type="submit" class="btn btn-success" value="Adicionar"> 
                    <?= form_close()?>
                    
                </div>    
                
                <div class="lista-usuarios">
                    <table class="table">
                        <tr>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>usuario</th>
                            <th>Ações</th>
                        </tr>
                        <?php foreach($usuarios as $usuario){?>
                        <tr>
                            <td class="nome-usuario-<?=$usuario["id"]?> nome-usuario_up-<?=$usuario["id"]?>"> <?=$usuario["nome"]?> </td>        
                            <td class="email-usuario_up-<?=$usuario["id"]?>"><?=$usuario["email"]?></td>        
                            <td class="usuario-usuario_up-<?=$usuario["id"]?>"><?=$usuario["usuario"]?></td>        
                            <td>
                                <button class="btn btn-primary edit-usuario" name="<?=$usuario["id"]?>" id="usuario_up-<?=$usuario["id"]?>" data-toggle="modal" data-target=".bs-example-modal-lg">Editar</button>
                                <button class="btn btn-danger delete-usuario" name="<?=$usuario["id"]?>" id="usuario-<?=$usuario["id"]?>" data-toggle="modal" data-target=".bs-example-modal-sm">Excluir</button>
                            </td>        
                        </tr>
                        <?php } ?>
                    </table>
                </div>
        </div>
        
        <hr>
        
        <h2>Relatórios</h2>
        <div class="relatorios">
            
            <div class="meses-buttons">
                <?php foreach($relatorios as $relatorio){?>
                    <button class="btn btn-relat <?php if($relatorio["imagem"] != ""){ echo 'btn-default';}?>" 
                    value="" 
                    id="<?=$relatorio["date"]?>"><?=$relatorio["mes-ano"]?></button>
                <?php } ?>
            </div>
            
            <?php foreach($relatorios as $relatorio){?>
                <img class="relat-analytics" id="img-<?=$relatorio["date"]?>" 
                     src="<?=base_url("img/analytics/".$relatorio["imagem"]."")?>">
            <?php } ?>
        </div>
        
    </div>
    
</div> 

<!-- MODAIS -->

<!-- DELETE USUARIO -->
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content delete_screen">
        	<p class="alert alert-warning">Tem certeza que deseja remover <span class="name_user"></span></p>
        	<a href="" class="btn btn-primary confirma-delete">Confirmar</a>
         	<?= anchor("adm/delete_usuario/","",array("class" => "link_delete"))?>    
        	<?= anchor("#","Cancelar",array("class" => "btn btn-danger","id"=>"cancela-delete","data-dismiss"=>"modal"))?>    
    </div>
  </div>
</div>

<!-- UPDATE USUARIO -->

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content update-screen">

        <?= anchor("adm/update_usuario/","",array("class" => "link_update")) ?>
        <form action="" class="update_usuario" method="post" accept-charset="utf-8">        	
        	
        	<h3>Atualizar Usuário</h3>
        	
        	<input type="text" name="nome" class="form-control up-nome" value="">
            <input type="text" name="email" class="form-control up-email" value="">
            <input type="text" name="usuario" class="form-control up-usuario" value="">
            <input type="password" name="senha"  class="form-control" placeholder="Nova Senha:">
                    
            <input type="submit" class="btn btn-primary" value="Alterar"> 
        		
        <?= form_close();?>       	
            
    </div>
  </div>
</div>
    
<!-- ADD IMÓVEL -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content add-screeen">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Adicionar Imóvel</h4>
                  </div>
                  <div class="modal-body">
                   <div class="add-imovel">
            
            <?= form_open_multipart('adm/add_imovel');?>
                
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
                        <?php foreach($tipos_imoveis as $tipo){?>
                            <option value="<?=$tipo["tipo_imovel"]?>"><?=ucwords($tipo['tipo_imovel'])?></option>
                        <?php } ?>
                    </select>

                    <label>Foto_principal:</label>
                        <input type="file" name="userfile">
                    
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

                    </div>    
                           
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <input type="submit" class="btn btn-success btn-adicionar-imovel" value="Adicionar">
                      
                    <?= form_close();?>      
                  </div>
                </div>
              </div>
            </div>
  

<script src="<?= base_url("js/my_scripts-adm-home.js")?>"></script>