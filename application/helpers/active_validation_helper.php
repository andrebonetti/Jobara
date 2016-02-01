<?php

	function atual_page($atualPage, $page){
		if($page == $atualPage){return "active";}
	}
	
	function active_type($value){
		if($value != NULL){return "active";}
	}
	
	function active_value($atual,$value){
		if($atual == $value){return "active";}
	}
	
	function desactive($atual,$value){
		if($atual == $value){return "no-view";}
	}