<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Imoveis extends CI_Controller{
		
	public function index($type,$value,$atual_page){
			
			$this->output->enable_profiler(FALSE);
			
			/*------------------- TAKE ------------------------*/	
			if(($type == "valores")&&($value!="cancel")){
				$valores = explode('-',$value);
				$this->session->set_userdata("valor-minimo",$valores['0']);
				$this->session->set_userdata("valor-maximo",$valores['1']);
			} 
			if(($type == "valores")&&($value="cancel")){
				$this->session->unset_userdata("valor-minimo");
				$this->session->unset_userdata("valor-maximo");
			}
			if(($type == "search")&&($value="cancel")){
				$this->session->unset_userdata("search");
				$this->session->unset_userdata("id");
			}
			
			$test 	= $this->session->userdata("$type");
			$value 	= no_acento_decode($value);
			
			if(empty($test)){$this->session->set_userdata("$type",$value);}	
			if(!empty($test)){
				if($test != $value){$this->session->set_userdata("$type",$value);}
			}
			if($value 	== "cancel"){$this->session->unset_userdata("$type");}
			if($type 	== "clean")	{$this->session->sess_destroy();}
						
			/* ----- filtros ----- */
			$filtros = array();
			
			$filtros["id"] 			    = $this->session->userdata("id");		//Codigo		
			$filtros["tipo_negocio"] 	= $this->session->userdata("tipo_negocio");	//Tipo Negocio		
			$filtros["tipo_imovel"] 	= $this->session->userdata("tipo_imovel");	//Tipo Imovel
			$filtros["cidade"] 			= $this->session->userdata("cidade");		//Cidade	
			$filtros["bairro"] 			= $this->session->userdata("bairro");		//Bairro	
			$filtros["quartos"] 		= $this->session->userdata("quartos");		//Quartos
			$filtros["imoveis_fotos"] 	= $this->session->userdata("imoveis_fotos");//Foto	
			$filtros["valor-minimo"] 	= $this->session->userdata("valor-minimo");	//Valor Mínimo
			$filtros["valor-maximo"] 	= $this->session->userdata("valor-maximo");	//Valor Máximo
			$filtros["order"] 			= $this->session->userdata("order");	//Valor Máximo
									
			/* ----- Menu ----- */		
			$tipos_de_imoveis = $this->imoveis_model->lista_busca("tipo_imovel");
			$cidades = $this->imoveis_model->lista_busca("cidade");
			
			
			$bairros = $this->imoveis_model->lista_busca_3($filtros,"bairro");
					
			$total_imoveis 	= $this->imoveis_model->lista_imoveis($filtros);
			
			/*------PAGINACAO-------*/
			$limite 			= '10';
			$pag				= $atual_page;
			$start				= ($pag*$limite)-$limite;
			$finish				= $pag*$limite;
			$num_imoveis 		= count($total_imoveis);	
			$num_pages 			= ($num_imoveis/$limite);
	
			$imoveis = array();
			
			for($n = $start; $n < $finish; $n++){
			if(!empty($total_imoveis[$n])){array_push($imoveis, $total_imoveis[$n]);}}
							
			/*------------------- CONTENT ------------------------*/
			$content = array(	"filtros"		=> $filtros				,
								"tipos_imoveis"	=> $tipos_de_imoveis	,
								"cidades"		=> $cidades				,
								"bairros"		=> $bairros				,
								"imoveis"		=> $imoveis				,
								"pag"			=> $pag					,
								"num_imoveis"	=> $num_imoveis			,
								"num_pages"		=> $num_pages			,
								"type"			=> $type				,
								"value"			=> $value				,
								"description"	=> ""					,
								"atualPage"		=> "imoveis"			,
								"title" 		=> "Imóveis | Apartamentos, Sobrados, Casas, Prédio Comerciais, chácaras");
					
			/*------------------- VIEW ---------------------------*/
			$this->load->template_conteudo('imoveis/imoveis.php',$content);
			
	}
        
    public function imoveis_temp(){
			
			$this->output->enable_profiler(TRUE);
			     
            $codigo         = $this->input->post("codigo");
            $tipo_negocio   = $this->input->post("tipo_negocio");
            $tipo_imovel    = $this->input->post("tipo_imovel");
            $cidade         = $this->input->post("cidade");
            $bairro         = $this->input->post("bairro");
            $val_min        = $this->input->post("val_min");
            $val_max        = $this->input->post("val_max");
            
            if($tipo_negocio != "0"){ $this->session->set_userdata("tipo_negocio",$tipo_negocio);}
            if($tipo_imovel != "0"){  $this->session->set_userdata("tipo_imovel",no_acento_decode($tipo_imovel));}
            if($cidade != "0"){       $this->session->set_userdata("cidade",no_acento_decode($cidade));}
            if($bairro != "0"){       $this->session->set_userdata("bairro",no_acento_decode($bairro));}
            if($val_min != "0"){      $this->session->set_userdata("valor-minimo",$val_min);}
			if($val_max != "0"){      $this->session->set_userdata("valor-maximo",$val_max);}
            if($codigo != "0"){ 
                $this->session->set_userdata("id",$codigo);
                 $this->session->unset_userdata("tipo_negocio");
            }
            
            redirect("imoveis");         
			
	}

	public function imovel_descricao($id){
			
			/*------------------- Control ------------------------*/
			$imovel      = $this->imoveis_model->imovel_descricao($id);
            
            $imovel_imgs = array(); 
        
            array_push($imovel_imgs,$imovel['foto_principal']);
            for($n = 1;$n<=15;$n++){
                if(!empty($imovel["foto$n"])){array_push($imovel_imgs,$imovel["foto$n"]);}
            }
        
            if($imovel['tipo_negocio'] == "venda"){
            $title = ucwords($imovel['tipo_imovel'])." a Venda em ".ucwords($imovel['bairro']);} 
            
            if($imovel['tipo_negocio'] == "aluguel"){
            $title = ucwords($imovel['tipo_imovel'])." para Alugar em ".ucwords($imovel['bairro']);}
			
			$imoveis_relat = $this->imoveis_model->lista_busca_relat($imovel['id'],$imovel['bairro'],$imovel['tipo_imovel'],$imovel['tipo_negocio']);
						
			/*------------------- CONTENT ------------------------*/
			$content = array(	"imovel"		=> $imovel				,
								"imoveis_relat"	=> $imoveis_relat		,
                                "imagens"       => $imovel_imgs         ,
								"description"	=> ""					,
								"atualPage"		=> "imoveis"			,
								"title" 		=> "Imóvel | ".$title."");
					
			/*------------------- VIEW ---------------------------*/
			$this->load->template_conteudo('imoveis/imovel_descricao.php',$content);
			
    }
    public function codigo(){
        
        $id = $this->input->post("codigo");
        $this->session->set_userdata("id",$id);
        redirect("imoveis");
    }
}