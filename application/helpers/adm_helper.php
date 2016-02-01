<?php

	function valida_usuario(){
		$ci = get_instance();
		$usuario = $ci->session->userdata('usuario');
		if(empty($usuario)){
			$ci->session->set_flashdata('msg-error','Efetue o login para ter acesso a essa página.');
			redirect("home");
		}
	}
