
/* ---------- START -----------*/
$("#submit").hide();
$("img.close-menu").hide();
$("span#contador").hide();
$("span#contador_bsc3").hide();
$("input#tipo_negocio").hide();
$("#busca-close").hide();

/* ----------FUNCTIONS --------*/

/* --- SHOW BSC ---*/

var show_busca = function(){ 
    $(".busca-rapida").slideDown(600);
    
    $(this).hide();
    $("#busca-close").fadeIn(600);
}

var hide_busca = function(){ 
    $(".busca-rapida").slideUp(600);
    
    $(this).hide();
    $("#btn-busca").fadeIn(600);
}

/* --- ACTIVE ---*/
var active_busca = function(event){ 
    event.preventDefault();
    
    /*DADOS*/
    var atualBsc = $(this).closest(".busca");
    var close_icon = $(this).closest(".busca").find("img.close-menu");
    
    /*EFEITOS VISUAIS*/
    atualBsc.addClass("active");
    $("#submit").slideDown(200);
    
    if(atualBsc.attr("id") != "bsc-3"){close_icon.fadeIn();}
    
    /*LÓGICA*/
        
        /*CONTADOR*/
        var atualCont = $("span#contador");
        var atualCont_value = atualCont.text();
        var newCont   = parseInt(atualCont_value) + 1;
    
        atualCont.text(newCont);
    
        /*BSC-1*/
        if(atualBsc.attr("id") == "bsc-1"){
            var selected = $(this).attr("id");
            $("#tipo_negocio").attr("value",selected);
            
            atualBsc.addClass("active-bsc1");
            if(selected == "aluguel")$("button#venda").fadeOut(400);
            if(selected == "venda")$("button#aluguel").fadeOut(400);
        }
        
        /*BSC-2*/
        if(atualBsc.attr("id") == "bsc-2"){     
            $(this).closest("select").attr("name","tipo_imovel");
            $(this).closest("select").attr("multiple","true");
            
            atualBsc.addClass("active-bsc2");
            var bsc2_height = atualBsc.height();
            var height_format= parseInt(bsc2_height)+10+"px";
            
            $(".busca").animate({height: height_format},200);
        }
            
        /*BSC-3*/
        if(atualBsc.attr("id") == "bsc-3"){
            var atualSelect = $(this).closest("select").attr("name");
            
            if(atualSelect == "cidade"){
                atualBsc.addClass("active-bsc3-1");
                $("img#bsc-3-1").fadeIn(200);
            }
            
            if(atualSelect == "bairro"){
                atualBsc.addClass("active-bsc3-2");
                $("img#bsc-3-2").fadeIn(200);
            }
            
            if(atualSelect == "cidade-0"){
                $(this).closest("select").attr("name","cidade");
                atualBsc.addClass("active-bsc3-1");
                $("img#bsc-3-1").fadeIn(200);
            }
            
            if(atualSelect == "bairro-0"){
                $(this).closest("select").attr("name","bairro");
                atualBsc.addClass("active-bsc3-2");
                $("img#bsc-3-2").fadeIn(200);
            }
            
            var atualCont_bsc3 = $("span#contador_bsc3");
            var atualCont_bsc3_value = atualCont_bsc3.text();
            var newCont_bsc3   = parseInt(atualCont_bsc3_value) + 1;
    
            atualCont_bsc3.text(newCont_bsc3);
        }
    
};

/* --- DESACTIVE ---*/
var desactive_bsc = function(){
    
    /*DADOS*/
    var atualBsc = $(this).closest(".busca");
    var idBsc = atualBsc.attr("id");
    
    /*EFEITOS VISUAIS*/
    
    if(idBsc != "bsc-3"){
        atualBsc.removeClass("active");
        atualBsc.removeClass("active-bsc1");
    }
    
    $(this).fadeOut();
    
    /*LÓGICA*/
        
        /*CONTADOR*/
        var atualCont = $("span#contador");
        var atualCont_value = atualCont.text();
        var newCont   = parseInt(atualCont_value) - 1;
    
        atualCont.text(newCont);
        
        if(newCont == 0){
            $("#submit").slideUp(200);
        }
           
        /*BSC-1*/
        if(idBsc == "bsc-1"){
            var atualValue = $("#tipo_negocio").attr("value");
            
            if(atualValue == "aluguel")$("button#venda").fadeIn(400);
            if(atualValue == "venda")$("button#aluguel").fadeIn(400);
            
            $("#tipo_negocio").attr("value","");      
        }
        
        /*BSC-2*/
        if(idBsc == "bsc-2"){
            var selected = atualBsc.find("select#tipo_imovel");
            selected.attr("name","tipo_imovel-0");
            
            var atualHeight = $(".busca").height();
            var newHeight = (parseInt(atualHeight)-17)+"px";
            
            $(".busca").removeClass("bsc-active2");
            $(".busca").animate({height: newHeight},200);
        }

        /*BSC-3*/
        if(idBsc == "bsc-3"){
            /*BSC-3*/
            if($(this).attr("id") == "bsc-3-1"){
                atualBsc.removeClass("active-bsc3-1");
                $("img#bsc-3-1").fadeOut(200);
                $("select.cidade").attr("name","cidade-0");
            }
            if($(this).attr("id") == "bsc-3-2"){
                atualBsc.removeClass("active-bsc3-2");
                $("img#bsc-3-2").fadeOut(200);
                $("select.bairro").attr("name","bairro-0");
            }  
            
            var atualCont_bsc3_value = $("#contador_bsc3").text();
            var newCont_bsc3   = parseInt(atualCont_bsc3_value) - 1;
            $("#contador_bsc3").text(newCont_bsc3);
            
            if($("#contador_bsc3").text() == 0){
                atualBsc.removeClass("active");
            }
        }
    
        /*BSC-4*/
        if(idBsc == "bsc-4"){
            $("input.valor-min").val("");
            $("input.valor-max").val("");
        }
              
}

/* --- MODAL ---*/
$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').focus()
})

/* ------------ EVENTOS --------------*/

/*SHOW BSC*/
$("#btn-busca").on("click",show_busca);

/*HIDE BSC*/
$("#busca-close").on("click",hide_busca);

/*ACTIVE BSC*/
$("button.bsc-active").on("click",active_busca);
$("input.bsc-active").on("click",active_busca);
$(".bsc-active").closest("select").on("change",active_busca);

/*DESACTIVE BSC*/
$("img.close-menu").on("click",desactive_bsc);
