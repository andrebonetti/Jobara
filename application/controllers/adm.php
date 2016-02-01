<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Adm extends CI_Controller{
        
		public function signin(){	
			
            /*------------------- CONTENT ------------------------*/
			$usuario  = $this->input->post("usuario");
			$senha	  = $this->input->post("senha");		
			$senhaMd5 = md5($senha);

			$result = $this->usuarios_model->valida_usuario($usuario,$senhaMd5); 
			/*--- REDIRECT ---*/
			if (!empty ($result)){
				$this->session->set_userdata("usuario",$result['usuario']);			
				redirect("adm/home");}
			else{
				$this->session->set_flashdata('msg-error',"Usuário e senha inválidos");
				redirect("home");
			}
		}
		
		public function home(){
					
			/*------------------- VALIDACAO ---------------------------*/
			valida_usuario();
			
			/*------------------- CONTROLE ---------------------------*/
            $usuarios 	      = $this->usuarios_model->lista_usuarios();
            $relatorios 	  = $this->relatorios_model->lista_relatorios();
			$last_imoveis 	  = $this->imoveis_model->last_imoveis(4);
            $tipos_de_imoveis = $this->imoveis_model->lista_busca("tipo_imovel");
			$filtros = array("tipo_negocio"=>"","tipo_imovel"=>"","cidade"=>"","bairro"=>"","imoveis_fotos"=>"","valor-minimo"=>"","valor-maximo"=>"","id"=>"","order"=>"");
						
				$imoveis_cont = array();
				
				/* Tipo Negocio */
				$imoveis_tipo_negocio = array();
				$filtros["tipo_negocio"] = "aluguel";
                $filtros["endereco"] 		= "";
				$imoveis = $this->imoveis_model->lista_imoveis($filtros);
				$imoveis_tipo_negocio["aluguel"] = count($imoveis);
				
				$filtros["tipo_negocio"] = "venda";
				$imoveis = $this->imoveis_model->lista_imoveis($filtros);
				$imoveis_tipo_negocio["venda"] = count($imoveis);
				
				$filtros["tipo_negocio"] = "";				
				$imoveis_cont["tipo_negocio"] = $imoveis_tipo_negocio;
				
				/* Tipo Imovel */
				$tipos_imoveis = $this->imoveis_model->lista_busca("tipo_imovel");
				$imoveis_tipo = array();
				foreach($tipos_imoveis as $imovel){
					$filtros["tipo_imovel"] = $imovel["tipo_imovel"];
					$imoveis = $this->imoveis_model->lista_imoveis($filtros);
					$imoveis_tipo[$imovel["tipo_imovel"]] = count($imoveis);
				}
				$filtros["tipo_imovel"] = "";
				$imoveis_cont["tipo_imovel"] = $imoveis_tipo;
				
				/* Localizacao */
				
					/* Cidade */
					$cidades = $this->imoveis_model->lista_busca("cidade");
					$imoveis_cidades = array();
					foreach($cidades as $imovel){
						$filtros["cidade"] = $imovel["cidade"];
						$imoveis = $this->imoveis_model->lista_imoveis($filtros);
						$imoveis_cidades[$imovel["cidade"]] = count($imoveis);
					}
					$filtros["cidade"] = "";
					$imoveis_cont["cidade"] = $imoveis_cidades;
					
					/* Bairro */
					$bairros = $this->imoveis_model->lista_busca("bairro");
					foreach($bairros as $imovel){
						$filtros["bairro"] = $imovel["bairro"];
						$imoveis = $this->imoveis_model->lista_imoveis($filtros);
						$imoveis_bairros[$imovel["bairro"]] = count($imoveis);
					}
					$filtros["bairro"] = "";
					$imoveis_cont["bairro"] = $imoveis_bairros;	
            
                    
							
            $content = array("last_imoveis" => $last_imoveis,
							 "imoveis_cont"	=> $imoveis_cont,
                             "usuarios"     => $usuarios,
                             "tipos_imoveis"=> $tipos_de_imoveis,
                             "relatorios"   => $relatorios);
							
			/*------------------- VIEW ---------------------------*/
			$this->load->template_adm('adm/adm-home.php',$content);
		}
          		
		public function imoveis($type,$value,$visualizacao_tipo = "adm"){	
            
            $this->output->enable_profiler(FALSE);
			
			/*------------------- VALIDACAO ---------------------------*/
			valida_usuario();
			
			/*------------------- CONTROLE ---------------------------*/		
			$test 	= $this->session->userdata("$type");
			$value 	= no_acento_decode($value);
			
            if ($type != "id"){
                if(empty($test)){$this->session->set_userdata("$type",$value);}	
                if(!empty($test)){
                    if($test != $value){$this->session->set_userdata("$type",$value);}
                }
                if($type == "clean")	{$this->session->unset_userdata("id");}
            }
						
			/* ----- filtros ----- */
			$filtros = array();
			
			$filtros["id"] 				= $this->session->userdata("id");			//ID	
            $filtros["endereco"] 		= $this->input->post("endereco");			//ID
			
            if($type == "all")		{$total_imoveis = $this->imoveis_model->lista_imoveis($filtros);}
            if($type == "id")		{$total_imoveis = $this->imoveis_model->lista_imoveis($filtros);}
            if($type == "endereco")	{$total_imoveis = $this->imoveis_model->lista_imoveis($filtros);}
            if($type == "clean")	{$total_imoveis = $this->imoveis_model->last_imoveis(10);}
            if($type == "0")		{$total_imoveis = $this->imoveis_model->last_imoveis(10);}
            
            
            $tipos_de_imoveis 	= $this->imoveis_model->lista_busca("tipo_imovel");
			$cidades 			= $this->imoveis_model->lista_busca("cidade");
				
            $content = array("id"           => $filtros["id"],
                             "endereco"     => $filtros["endereco"],
                             "filtros"      => $filtros,
                             "imoveis"      => $total_imoveis,
                             "tipos_imoveis"=>$tipos_de_imoveis,
                             "cidades"      =>$cidades);
            
			/*------------------- VIEW ---------------------------*/
            if($visualizacao_tipo == "adm"){
               $this->load->template_adm('adm/adm-imoveis.php',$content);
            }
            if($visualizacao_tipo == "print"){
               $this->load->view('adm/adm-imoveis_print.php',$content);
            }
		}
		      
        function add_imovel(){
        	
			/*------------------- VALIDACAO ---------------------------*/
			valida_usuario();
			
            $this->output->enable_profiler(FALSE);
            
            $config['upload_path'] = './img/fotos';
            $config['allowed_types'] = 'gif|jpg|png';

           	$this->load->library('upload', $config);
            
           	$data_add = array();
			
			$foto_principalU = $this->upload->do_upload("foto_principal");
            if (!empty($foto_principalU))
            {
            	$data = $this->upload->data(); 
                $data_add["foto_principal"] = "fotos/".$data["file_name"];
            }
			
			$foto_1 = $this->upload->do_upload("foto1");
            if (!empty($foto_1))
            {
            	$data = $this->upload->data();            
				$data_add["foto1"] = "fotos/".$data["file_name"];
            }
			
			$foto_2 = $this->upload->do_upload("foto2");
            if (!empty($foto_2))
            {          
				$data = $this->upload->data();            
				$data_add["foto2"] = "fotos/".$data["file_name"];
            }
			
			$foto_3 = $this->upload->do_upload("foto3");
            if (!empty($foto_3))
            {          
				$data = $this->upload->data();            
				$data_add["foto3"] = "fotos/".$data["file_name"];
            }
			
			$foto_4 = $this->upload->do_upload("foto4");
            if (!empty($foto_4))
            {          
				$data = $this->upload->data();            
				$data_add["foto4"] = "fotos/".$data["file_name"];
            }
			
			$foto_5 = $this->upload->do_upload("foto5");
            if (!empty($foto_5))
            {          
				$data = $this->upload->data();            
				$data_add["foto5"] = "fotos/".$data["file_name"];
            }
			
			$foto_6 = $this->upload->do_upload("foto6");
            if (!empty($foto_6))
            {          
				$data = $this->upload->data();            
				$data_add["foto6"] = "fotos/".$data["file_name"];
            }
			
			$foto_7 = $this->upload->do_upload("foto7");
            if (!empty($foto_7))
            {          
				$data = $this->upload->data();            
				$data_add["foto7"] = "fotos/".$data["file_name"];
            }
			
			$foto_8 = $this->upload->do_upload("foto8");
            if (!empty($foto_8))
            {          
				$data = $this->upload->data();            
				$data_add["foto8"] = "fotos/".$data["file_name"];
            }
			
			$foto_9 = $this->upload->do_upload("foto9");
            if (!empty($foto_9))
            {          
				$data = $this->upload->data();            
				$data_add["foto9"] = "fotos/".$data["file_name"];
            }
			
			$foto_10 = $this->upload->do_upload("foto10");
            if (!empty($foto_10))
            {          
				$data = $this->upload->data();            
				$data_add["foto10"] = "fotos/".$data["file_name"];
            }
			
			$foto_11 = $this->upload->do_upload("foto11");
            if (!empty($foto_11))
            {          
				$data = $this->upload->data();            
				$data_add["foto11"] = "fotos/".$data["file_name"];
            }
			
			$foto_12 = $this->upload->do_upload("foto12");
            if (!empty($foto_12))
            {          
				$data = $this->upload->data();            
				$data_add["foto12"] = "fotos/".$data["file_name"];
            }
			
			$foto_13 = $this->upload->do_upload("foto13");
            if (!empty($foto_13))
            {          
				$data = $this->upload->data();            
				$data_add["foto13"] = "fotos/".$data["file_name"];
            }
			
			$foto_14 = $this->upload->do_upload("foto14");
            if (!empty($foto_14))
            {          
				$data = $this->upload->data();            
				$data_add["foto14"] = "fotos/".$data["file_name"];
            }

                           
                $data_add["codigo"] = $this->input->post("codigo"); 
                $data_add["status"] = "1";
                $data_add["usuario"] = $this->session->userdata('usuario');
                $data_add["destaque_order"] = $this->input->post("destaque_order");
                $data_add["data_insert"] = $this->input->post('data_insert');               
                $data_add["tipo_negocio"] = $this->input->post("tipo_negocio");
                $data_add["tipo_imovel"] = $this->input->post("tipo_imovel");
                $data_add["proprietario_nome"] = $this->input->post("proprietario_nome");
                $data_add["proprietario_telefone"] = $this->input->post("proprietario_telefone");
                $data_add["proprietario_email"] = $this->input->post("proprietario_email");
                $data_add["valor"] = $this->input->post("valor");
                $data_add["valor_iptu"] = $this->input->post("valor_iptu");
                $data_add["endereco"] = $this->input->post("endereco");
                $data_add["complemento"] = $this->input->post("complemento");
                $data_add["bairro"] = $this->input->post("bairro");
                $data_add["cidade"] = $this->input->post("cidade");
                $data_add["descricao"] = $this->input->post("descricao");
                $data_add["quartos"] = $this->input->post("quartos");
                $data_add["garagem"] = $this->input->post("garagem");
                $data_add["area_total"] = $this->input->post("area_total");
                       
                $this->imoveis_model->insert_content("imoveis",$data_add);
                $this->session->set_flashdata('msg-success',"Imóvel adicionado com sucesso!");
			    redirect("adm/imoveis/0/0");
        }
        
        public function update_imovel($id){
            
			 $this->output->enable_profiler(FALSE);
			/*------------------- VALIDACAO ---------------------------*/
			valida_usuario();
            
            $config['upload_path'] = './img/fotos';
            $config['allowed_types'] = 'gif|jpg|png';

           	$this->load->library('upload', $config);
			
			$data_add = array();
            
            $foto_principalU = $this->upload->do_upload("foto_principal");
            if (!empty($foto_principalU))
            {
            	$data = $this->upload->data(); 
                $data_add["foto_principal"] = "fotos/".$data["file_name"];
            }
			
			$foto_1 = $this->upload->do_upload("foto1");
            if (!empty($foto_1))
            {
            	$data = $this->upload->data();            
				$data_add["foto1"] = "fotos/".$data["file_name"];
            }
			
			$foto_2 = $this->upload->do_upload("foto2");
            if (!empty($foto_2))
            {          
				$data = $this->upload->data();            
				$data_add["foto2"] = "fotos/".$data["file_name"];
            }
			
			$foto_3 = $this->upload->do_upload("foto3");
            if (!empty($foto_3))
            {          
				$data = $this->upload->data();            
				$data_add["foto3"] = "fotos/".$data["file_name"];
            }
			
			$foto_4 = $this->upload->do_upload("foto4");
            if (!empty($foto_4))
            {          
				$data = $this->upload->data();            
				$data_add["foto4"] = "fotos/".$data["file_name"];
            }
			
			$foto_5 = $this->upload->do_upload("foto5");
            if (!empty($foto_5))
            {          
				$data = $this->upload->data();            
				$data_add["foto5"] = "fotos/".$data["file_name"];
            }
			
			$foto_6 = $this->upload->do_upload("foto6");
            if (!empty($foto_6))
            {          
				$data = $this->upload->data();            
				$data_add["foto6"] = "fotos/".$data["file_name"];
            }
			
			$foto_7 = $this->upload->do_upload("foto7");
            if (!empty($foto_7))
            {          
				$data = $this->upload->data();            
				$data_add["foto7"] = "fotos/".$data["file_name"];
            }
			
			$foto_8 = $this->upload->do_upload("foto8");
            if (!empty($foto_8))
            {          
				$data = $this->upload->data();            
				$data_add["foto8"] = "fotos/".$data["file_name"];
            }
			
			$foto_9 = $this->upload->do_upload("foto9");
            if (!empty($foto_9))
            {          
				$data = $this->upload->data();            
				$data_add["foto9"] = "fotos/".$data["file_name"];
            }
			
			$foto_10 = $this->upload->do_upload("foto10");
            if (!empty($foto_10))
            {          
				$data = $this->upload->data();            
				$data_add["foto10"] = "fotos/".$data["file_name"];
            }
			
			$foto_11 = $this->upload->do_upload("foto11");
            if (!empty($foto_11))
            {          
				$data = $this->upload->data();            
				$data_add["foto11"] = "fotos/".$data["file_name"];
            }
			
			$foto_12 = $this->upload->do_upload("foto12");
            if (!empty($foto_12))
            {          
				$data = $this->upload->data();            
				$data_add["foto12"] = "fotos/".$data["file_name"];
            }
			
			$foto_13 = $this->upload->do_upload("foto13");
            if (!empty($foto_13))
            {          
				$data = $this->upload->data();            
				$data_add["foto13"] = "fotos/".$data["file_name"];
            }
			
			$foto_14 = $this->upload->do_upload("foto14");
            if (!empty($foto_14))
            {          
				$data = $this->upload->data();            
				$data_add["foto14"] = "fotos/".$data["file_name"];
            }
            
            $data_add["codigo"] = $this->input->post("codigo");   
            $data_add["status"] = $this->input->post("status"); 
            $data_add["tipo_negocio"] = $this->input->post("tipo_negocio");
            $data_add["tipo_imovel"] = $this->input->post("tipo_imovel");
            $data_add["proprietario_nome"] = $this->input->post("proprietario_nome");
            $data_add["proprietario_telefone"] = $this->input->post("proprietario_telefone");
            $data_add["proprietario_email"] = $this->input->post("proprietario_email");
            $data_add["valor"] = $this->input->post("valor");
            $data_add["valor_iptu"] = $this->input->post("valor_iptu");
            $data_add["endereco"] = $this->input->post("endereco");
            $data_add["complemento"] = $this->input->post("complemento");
            $data_add["bairro"] = $this->input->post("bairro");
            $data_add["cidade"] = $this->input->post("cidade");
            $data_add["descricao"] = $this->input->post("descricao");
            $data_add["quartos"] = $this->input->post("quartos");
            $data_add["garagem"] = $this->input->post("garagem");
            $data_add["area_total"] = $this->input->post("area_total");
            
            $this->imoveis_model->update_content("imoveis",$id,$data_add);
            
            /*---- SUCCESS ----*/		
			$this->session->set_flashdata('msg-success',"Imóvel alterado com sucesso.");
			redirect("adm/imoveis/0/0");	
		}
        
        public function delete_imovel($id){
			
			/*------------------- VALIDACAO ---------------------------*/
			valida_usuario();
			
			/*------ DELETE -------*/
			$this->imoveis_model->delete_content("imoveis",$id);
					    
			/*---- SUCCESS ----*/		
			$this->session->set_flashdata('msg-success',"Imóvel deletado com sucesso.");
			redirect("adm/imoveis/0/0");	
						
		}

		function add_usuario(){
			
			/*------------------- VALIDACAO ---------------------------*/
			valida_usuario();
			
			$data = array();
			$data["nome"] = $this->input->post("nome"); 
            $data["email"] = $this->input->post("email"); 
            $data["usuario"] = $this->input->post("usuario");
            $data["senha"] = md5($this->input->post('senha'));   
			                         
            $this->imoveis_model->insert_content("usuarios",$data);
            $this->session->set_flashdata('msg-success',"Usuário adicionado com sucesso!");
			redirect("adm/home");
		}
		
		public function update_usuario($id){
			
			/*------------------- VALIDACAO ---------------------------*/
			valida_usuario();
			
			/*------------------- POST ----------------------*/
			$nome 		= $this->input->post("nome");
			$email 		= $this->input->post("email");
			$usuario    = $this->input->post("usuario");
			$senha 		= $this->input->post("senha");
					
			/*------------------ UPDATE ---------------------*/
			$data = array();
			$data['nome']		= $nome			;
			$data['email']		= $email		;
			$data['usuario']	= $usuario		;
			$data['senha']		= md5($senha)	;
		
			$this->imoveis_model->update_content("usuarios",$id,$data);
						
			/*------------------- SUCCESS--------------------*/
			$this->session->set_flashdata('msg-success',"Usuario ".$nome." alterado com sucesso.");
			redirect("adm/home");
		}
		
		public function delete_usuario($id){
			
			/*------------------- VALIDACAO ---------------------------*/
			valida_usuario();
			
			/*------ DELETE -------*/
			$this->imoveis_model->delete_content("usuarios",$id);
					    
			/*---- SUCCESS ----*/		
			$this->session->set_flashdata('msg-success',"Usuário deletado com sucesso.");
			redirect("adm/home");		
						
		}
        
        public function codigo(){
        
            $id = $this->input->post("codigo");
            $this->session->set_userdata("id",$id);
            redirect("adm/imoveis/id/0");
        }
			        
		public function signout(){
			$this->session->unset_userdata("usuario");
			/*--- REDIRECT ---*/
			redirect("home");
		}				
    }