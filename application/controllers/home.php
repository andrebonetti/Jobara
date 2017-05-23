<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Home extends CI_Controller{
		public function index(){
			
			/*------------------- Control ------------------------*/
			$destaque_venda 	  = $this->imoveis_model->imoveis_destaque("venda");	
			$destaque_aluguel 	  = $this->imoveis_model->imoveis_destaque("aluguel");
            $last_imoveis_aluguel = $this->imoveis_model->last_imoveis(8,"aluguel");
            $last_imoveis_venda   = $this->imoveis_model->last_imoveis(8,"venda");
                      
            /* ----- Busca Rápida ----- */		
			$tipos_imoveis = $this->imoveis_model->lista_busca("tipo_imovel");
			$cidades = $this->imoveis_model->lista_busca("cidade");
			$bairros = $this->imoveis_model->lista_busca("bairro");
			
			/*------------------- CONTENT ------------------------*/
			$content = array(	"tipos_imoveis"           => $tipos_imoveis        ,
                                "cidades"                 => $cidades              ,
                                "bairros"                 => $bairros              ,
                                "destaque_venda"	      => $destaque_venda	   ,
								"destaque_aluguel"	      => $destaque_aluguel	   ,
								"description"		      => ""					   ,
								"atualPage"			      => "home"				   ,
                                "last_imoveis_aluguel"    => $last_imoveis_aluguel ,
                                "last_imoveis_venda"      => $last_imoveis_venda   ,
								"title" 			      => "Home | Apartamentos, Casas, Prédios Comerciais na Zona Leste de São Paulo");
			
			/*------------------- VIEW ---------------------------*/
			$this->load->template_conteudo('home/index.php',$content);
			
		}
	}