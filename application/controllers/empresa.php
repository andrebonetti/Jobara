<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Empresa extends CI_Controller{
		public function index(){	
			
			/*------------------- CONTENT ------------------------*/
			$content = array(	"description"	=> ""					,
								"atualPage"		=> "empresa"				,
								"title" 		=> "Empresa | Sobre a Imobiliária Jobara");
			
			/*------------------- VIEW ---------------------------*/
			$this->load->template_conteudo('empresa/empresa.php',$content);
			
		}
	}