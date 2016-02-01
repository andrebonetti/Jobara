/* ----- START ----- */
$(".add-imovel").hide();
$("#btn_hide-add-imovel").hide();
$(".link_delete").hide();
$(".link_update").hide();

/* ----- FUNCTIONS ---- */

/* SHOW ADD IMOVEL */
var  show_addImovel = function(){
    
    now = new Date  
    var ano = now.getFullYear();
    var mes = parseInt(now.getMonth())+1;
    var dia = now.getDate();
    var hora = now.getHours();
    var minuto = now.getMinutes();
    var segundo = now.getSeconds();
    
    var date = ano + "-" + mes + "-" + dia + "/" + hora + ":" + minuto + ":" + segundo;
    $("#data_insert").attr("value",date);
    
    $("#btn_hide-add-imovel").fadeIn(400);
    $(".add-imovel").slideDown(400);
};

/* HIDE ADD IMOVEL */
var  hide_addImovel = function(){
    $("#btn_hide-add-imovel").hide(400);
    $(".add-imovel").slideUp(400);
};

/* SEARCH CODIGO */
var search_code = function() {
    var code 	= $("#code").val();  	        	     	
    var link 	= $('#url').attr("href");
    $(window.document.location).attr('href',link+"/id/"+code);   
};
/* SEARCH ENDERECO */
var search_endereco = function() {
    var endereco 	= $("#endereco").val();  	        	     	
    var link 	= $('#url').attr("href");
    
    $("#input-endereco").attr("value",endereco);
    document.forms['form_endereco'].submit();
    /*$(window.document.location).attr('href',link+"/endereco/"+endereco);*/   
};


/* UPDATE IMOVEL */
var update_imovel = function(){

	var atual_id        = $(this).attr("name");
    
	var imagem          = $(".img-"+atual_id).attr("src");
    var codigo          = $(".codigo-"+atual_id).text();
    var status          = $(".status-"+atual_id).attr("name");
    var tipo_imovel     = $(".tipo_imovel-"+atual_id).text();
    var tipo_negocio    = $(".tipo_negocio-"+atual_id).attr("name");
    var cidade          = $(".cidade-"+atual_id).text();
    var bairro          = $(".bairro-"+atual_id).text();
    var endereco        = $(".endereco-"+atual_id).text();
    var complemento     = $(".complemento-"+atual_id).attr("value");
    var quartos         = $(".quartos-"+atual_id).attr("value");
    var garagem         = $(".garagem-"+atual_id).attr("value");
    var area_total      = $(".area_total-"+atual_id).attr("value");
    var descricao       = $(".descricao-"+atual_id).attr("value");
    var valor           = $(".valor-"+atual_id).attr("value");
    
    var valor_iptu              = $(".valor_iptu-"+atual_id).attr("value");
    var proprietario_nome       = $(".prop_nome-"+atual_id).attr("value");
    var proprietario_telefone   = $(".prop_tel-"+atual_id).attr("value");
    var proprietario_email      = $(".prop_email-"+atual_id).attr("value");
     
    for(var i=1;i<=14;i++){
        var foto = ($(".foto-"+i+"_"+atual_id).attr("value"));
        if(foto != ""){$(".up_foto-"+i).attr("src",foto);}
    }
    
    $(".field-imagem").attr("src",imagem); 
    
    if(proprietario_nome != ""){$(".input-nome").attr("value",proprietario_nome);}
    if(proprietario_telefone != ""){$(".input-telefone").attr("value",proprietario_telefone);}
    if(proprietario_email != ""){$(".input-email").attr("value",proprietario_email);}
    
    if(codigo != ""){$(".input-codigo").attr("value",codigo);}
    
    $(".input-status").each(function(){
        if($(this).attr("value") ==  status){
           $(this).attr("checked",true);
        }
    });    
    $(".input-negocio").each(function(){
        if($(this).attr("value") ==  tipo_negocio){
           $(this).attr("checked",true);
        }
    });
    
    if(tipo_imovel != ""){
        $(".input-tipo").attr("value",tipo_imovel);
        $(".input-tipo").text(tipo_imovel);    
    }
      
    if(cidade   != ""){$(".input-cidade").attr("value",cidade);}
    if(bairro   != ""){$(".input-bairro").attr("value",bairro);}
    if(endereco != ""){$(".input-endereco").attr("value",endereco);}
    if(complemento != ""){$(".input-complemento").attr("value",complemento);}
    if(quartos != ""){$(".input-quartos").attr("value",quartos);}
    if(garagem != ""){$(".input-garagem").attr("value",garagem);}
    if(area_total != ""){$(".input-area_total").attr("value",area_total);}
    if(descricao != ""){$(".input-descricao").text(descricao);}
      
    if(valor   != ""){$(".input-valor").attr("value",valor);}
    if(valor_iptu != ""){$(".input-valor_iptu").attr("value",valor_iptu);}
    
    if(imagem != ""){$(".up_img_principal").attr("src",imagem);}
    
    var link_update = $(".link_update").attr("href");
	var url = link_update+"/"+atual_id;

	$("form.update_imovel").attr("action",url);      
};


/* CONFIRMA DELETE IMOVEL*/
var confirma_delete = function(){
	var atual_id =     $(this).attr("name");
    
	var imagem   = $(".img-"+atual_id).attr("src");
	var codigo   = $(".codigo-"+atual_id).text();
    $(".field-imagem").attr("src",imagem); 
    $(".field-codigo").text(codigo);
        
	var link_delete = $(".link_delete").attr("href");
	var url = link_delete+"/"+atual_id;
	
	$(".confirma-delete").attr("href",url);
};

/* DETALHES IMOVEL */
var show_details = function(){

	var atual_id = $(this).attr("name");
      
	var imagem          = $(".img-"+atual_id).attr("src");
    var codigo          = $(".codigo-"+atual_id).text();
    var status          = $(".status-"+atual_id).text();
    var tipo_imovel     = $(".tipo_imovel-"+atual_id).text();
    var tipo_negocio    = $(".tipo_negocio-"+atual_id).text();
    var cidade          = $(".cidade-"+atual_id).text();
    var bairro          = $(".bairro-"+atual_id).text();
    var endereco        = $(".endereco-"+atual_id).text();
    var complemento     = $(".complemento-"+atual_id).attr("value");
    var quartos         = $(".quartos-"+atual_id).attr("value");
    var garagem         = $(".garagem-"+atual_id).attr("value");
    var area_total      = $(".area_total-"+atual_id).attr("value");
    var descricao       = $(".descricao-"+atual_id).attr("value");
    var valor           = $(".valor-"+atual_id).text();
    
    var usuario                 = $(".usuario-"+atual_id).attr("value");
    var data_insert             = $(".data_insert-"+atual_id).attr("value");
    var valor_iptu              = $(".valor_iptu-"+atual_id).attr("value");
    var proprietario_nome       = $(".prop_nome-"+atual_id).attr("value");
    var proprietario_telefone   = $(".prop_tel-"+atual_id).attr("value");
    var proprietario_email      = $(".prop_email-"+atual_id).attr("value");
    
    $(".field-imagem").attr("src",imagem); 
    $(".field-usuario").text(usuario);   
    if(data_insert != ""){$(".field-data_insert").text(data_insert);}
    
    if(proprietario_nome != ""){$(".field-nome").text(proprietario_nome);}
    if(proprietario_telefone != ""){$(".field-telefone").text(proprietario_telefone);}
    if(proprietario_email != ""){$(".field-email").text(proprietario_email);}
    if(codigo != ""){$(".field-codigo").text(codigo);}
    if(status != ""){$(".field-status").text(status);}
    if(tipo_imovel != ""){$(".field-tipo_imovel").text(tipo_imovel);}
    if(tipo_negocio != ""){$(".field-tipo_negocio").text(tipo_negocio);}
    if(cidade != ""){$(".field-cidade").text(cidade);}
    if(bairro != ""){$(".field-bairro").text(bairro);}
    if(endereco != ""){$(".field-endereco").text(endereco);}
    if(complemento != ""){$(".field-complemento").text(complemento);}
    if(quartos != ""){$(".field-quartos").text(quartos);}
    if(garagem != ""){$(".field-garagem").text(garagem);}
    if(area_total != ""){$(".field-area_total").text(area_total);}
    if(descricao != ""){$(".field-descricao").text(descricao);}
    if(valor != ""){$(".field-valor").text(valor);}
    if(valor_iptu != ""){$(".field-valor_iptu").text(valor_iptu);}
    
};

var show_name = function(){
   $(this).css("color","black");
}

/* ----- EVENTS ----- */ 
$("#btn-add-imovel").on("click",show_addImovel);
$("#btn_hide-add-imovel").on("click",hide_addImovel);
$(".btn-codigo").on("click",search_code);
$(".btn-endereco").on("click",search_endereco);
$(".show_details").on("click",show_details);
$(".edit_imovel").on("click",update_imovel);
$(".delete_imovel").on("click",confirma_delete);
$(".original_file").on("change",show_name);