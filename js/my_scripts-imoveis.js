$(".option-for-url").click(function() {
    var value 	= $(this).attr("value");
    var type 	= $(this).attr("name");
    var link 	= $('#url').attr("href");
    $(window.document.location).attr('href',link+"/"+type+"/"+value+"/pagina/1");   			
});

$("#submit-valor").click(function() {
    var min 	= $(".valor-min").val();
    var max 	= $(".valor-max").val();
    var link 	= $('#url').attr("href");

    if((min != 0)&&(max != 0)){ 
        if(min < max){
            $(window.document.location).attr('href',link+"/valores/"+min+"-"+max+"/pagina/1");
        }
        if(min >= max){alert("O valor mínimo tem que ser menor que o máximo");}
    }  
    if((min != 0)&&(max == 0)){ $(window.document.location).attr('href',link+"/valor-minimo/"+min+"/pagina/1");} 
        if((min == 0)&&(max != 0)){ $(window.document.location).attr('href',link+"/valor-maximo/"+max+"/pagina/1");} 
});

/* SHOW MENU */

var show_menu = function(){
    $(this).animate({"margin":"0 0 0 150%"},400);
    $(".menu").addClass("active_phone");
};

var hide_menu = function(){
    $("#btn-menu").animate({"margin":"0 0 0 0"},400);
    $(".menu").removeClass("active_phone");
};

$("#btn-menu").on("click",show_menu);
$("#btn-close-menu").on("click",hide_menu);