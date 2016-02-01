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
        
        <table class="table table-striped imoveis_print">
                <tr>
                    <th class="imagem">Imagem</th>
                    <th class="codigo">Código</th>
                    <th class="data_cadastro">Data Cadastro</th>
                    <th class="status">Status</th>
                    <th class="tipo_imovel">Tipo do Imovel</th>
                    <th class="tipo_negocio">Tipo de Negócio</th>
                    <th class="cidade">Cidade</th>
                    <th class="bairro">Bairro</th>
                    <th class="endereço">Endereço</th>
                    <th class="valor">Valor</th>
                </tr>
            <?php  foreach($imoveis as $imovel){?>
                            
                <?php for($n = 1;$n <= 14;$n++){?> 
                    <input type="hidden" class="foto-<?=$n?>_<?=$imovel['id']?>" value="<?= base_url("img/".$imovel["foto".$n.""]."")?>">
                <?php } ?>
            
                <tr>
                    <td class="imagem">
                        <img class="" src="<?= base_url("img/".$imovel['foto_principal']."")?>">
                    </td>
                    
                    <td class="codigo"><?=$imovel['codigo']?></td>
                    
                    <td class="data_cadastro"><?=dataMysqlParaPtBr_completo($imovel['data_insert'])?></td>
                    
                    <?php if($imovel['status'] == "1"){?>
                        <td class="status status-active status-<?=$imovel['id']?>" name="<?=$imovel['status']?>">Ativo</td>
                    <?php } ?>
                    <?php if($imovel['status'] == "0"){?>
                        <td class="status status-desactive status-<?=$imovel['id']?>" name="<?=$imovel['status']?>">Desativado</td>
                    <?php } ?>
                    
                    <td class="tipo_imovel tipo_imovel-<?=$imovel['id']?>"><?=ucwords($imovel['tipo_imovel'])?></td>
                    <td class="tipo_negocio tipo_negocio-<?=$imovel['id']?>" name="<?=$imovel['tipo_negocio']?>"><?=ucwords($imovel['tipo_negocio'])?></td>
                    <td class="cidade cidade-<?=$imovel['id']?>"><?=ucwords($imovel['cidade'])?></td>
                    <td class="bairro bairro-<?=$imovel['id']?>"><?=ucwords($imovel['bairro'])?></td>
                    <td class="endereco endereco-<?=$imovel['id']?>"><?=ucwords($imovel['endereco'])?></td>
                    <td class="valor valor-<?=$imovel['id']?>" value="<?=$imovel['valor']?>"><?=numeroEmReais($imovel['valor'])?></td>
                </tr>
            <?php } ?>
        </table>
        
    </body>
</html>        
        