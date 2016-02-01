/* ---------- START -----------*/
$(".add-usuario").hide();
$("img.relat-analytics").hide();
$("a.link_delete").hide();
$("a.link_update").hide();

/* ---------- FUNCTIONS -------*/

/* DATE ADD IMOVEL */
var data_insert = function(){ 
    now = new Date  
    var ano = now.getFullYear();
    var mes = parseInt(now.getMonth())+1;
    var dia = now.getDate();
    var hora = now.getHours();
    var minuto = now.getMinutes();
    var segundo = now.getSeconds();
    
    var date = ano + "-" + mes + "-" + dia + "/" + hora + ":" + minuto + ":" + segundo;
    
    $("#data_insert").attr("value",date);
};

/* SHOW ADD USUARIO */
var  show_addUsuario = function(){ 
    $(".add-usuario").slideDown(400);
};

/* HIDE ADD USUARIO */
var  hide_addUsuario = function(){ 
    $(".add-usuario").slideUp(200);
};

/* CONFIRMA DELETE USUARIO*/
var confirm_delete = function(){
	var atual_id = $(this).attr("id");
	var nome = $(".nome-"+atual_id).text();
	
	var id = $(this).attr("name");
	var link_delete = $(".link_delete").attr("href");
	var url = link_delete+"/"+id;
	
	$(".confirma-delete").attr("href",url);
	$(".name_user").text(nome);
};

/* UPDATE USUARIO*/
var update_usuario = function(){

	var atual_id = $(this).attr("id");
	var nome = $(".nome-"+atual_id).text();
	var email = $(".email-"+atual_id).text();
	var usuario = $(".usuario-"+atual_id).text();
	
	$(".up-nome").attr("value",nome);
	$(".up-email").attr("value",email);
	$(".up-usuario").attr("value",usuario);
	
	var id = $(this).attr("name");
	var link_update = $(".link_update").attr("href");
	var url = link_update+"/"+id;
	
	$(".update_usuario").attr("action",url);
};

/* ANALYTICS */
var  change_mounth = function(){
  
    $(".btn-relat").attr("value","");
    $(".btn-relat").removeClass("active");
    $(".btn-relat").removeClass("btn-primary");
    
    $(this).addClass("btn-primary");
    $(this).addClass("active");   
    
     var mounth_relat = $(this).attr("id");
    
    $("img.relat-analytics").hide();
    $("#img-"+mounth_relat).show();
};

$( ".btn-relat" ).each(function() {
    
    now = new Date;
    var mounth_relat = $(this).attr("id");
    
    var atualMounth = parseInt(now.getMonth())+1;
    var atualDate = now.getFullYear()+"-"+atualMounth;
    
    if(mounth_relat == atualDate){
        $(this).attr("value","active");
    }
    
    var status_btn = $(this).attr("value");
    
    if(status_btn == "active"){
        
        
        $(this).removeClass("btn-default");
        $(this).addClass("btn-primary");
        $(this).addClass("active");
        
        $("#img-"+mounth_relat).show();
    }  
});

/* ---------- EVENTS ---------*/
$("#btn-add-usuario").on("click",show_addUsuario);
$("#close-add-usuario").on("click",hide_addUsuario);
$(".btn-relat").on("click",change_mounth);
$(".delete-usuario").on("click",confirm_delete);
$(".edit-usuario").on("click",update_usuario);
$("#add_imovel").on("click",data_insert);

