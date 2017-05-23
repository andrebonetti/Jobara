<?php
	class Imoveis_model extends CI_Model {
		
		function lista_imoveis($filtros){
			
			/* -- WHERE -- */
			
			if(!empty($filtros['tipo_negocio'])){
			$this->db->where("tipo_negocio",$filtros['tipo_negocio']);}
			
			if(!empty($filtros['tipo_imovel'])){
			$this->db->where("tipo_imovel",$filtros['tipo_imovel']);}
			
			if(!empty($filtros['cidade'])){
			$this->db->where("cidade",$filtros['cidade']);}
			
			if(!empty($filtros['bairro'])){
			$this->db->where("bairro",$filtros['bairro']);}
            
            if(!empty($filtros['endereco'])){
			$this->db->like("endereco",$filtros['endereco']);}
			
				/*ID*/
				if(!empty($filtros['id'])){$this->db->where("codigo",$filtros['id']);}
							
				/*Fotos*/	
				if(!empty($filtros['imoveis_fotos']))	{$this->db->where("foto_principal !=","NULL");}
				
				if((!empty($filtros['valor-minimo']))&&(!empty($filtros['valor-maximo']))){
					$this->db->where("valor >=",$filtros['valor-minimo']);
					$this->db->where("valor <=",$filtros['valor-maximo']);
				}
				
				/*Valores*/
				if((!empty($filtros['valor-minimo']))&&(empty($filtros['valor-maximo']))){
					$this->db->where("valor >=",$filtros['valor-minimo']);}
				
				if((empty($filtros['valor-minimo']))&&(!empty($filtros['valor-maximo']))){
					$this->db->where("valor >=",$filtros['valor-minimo']);}
			
			
			/* -- ORDER --*/
			if(empty($filtros['order'])){$this->db->order_by("id");}
			if(!empty($filtros['order'])){
				if($filtros['order'] == "menor_preco"){	
					$this->db->order_by("valor");
				}
				if($filtros['order'] == "maior_preco"){	
					$this->db->order_by("valor","desc");
				}
                if($filtros['order'] == "codigo"){	
					$this->db->order_by("codigo");
				}
			}
			
			
			return $this->db->get("imoveis")->result_array();
		}

		function lista_busca($value){
			
			/* -- SELECT DISTINCS -- */
			$this->db->select($value);
			$this->db->distinct();
			
			$this->db->where("$value !=","");
			
			/* -- ORDER --*/
			$this->db->order_by($value);
			
			return $this->db->get("imoveis")->result_array();		
		}
		
		function lista_busca_2($select,$type,$value){
			
			/* -- SELECT DISTINCS -- */
			$this->db->select($select);
			$this->db->distinct();
			
			/* -- WHERE -- */
			$this->db->where("$type","$value");
			$this->db->where("$select !=","");
		
			/* -- ORDER --*/
			$this->db->order_by($select);
			
			return $this->db->get("imoveis")->result_array();
		}
		
		function lista_busca_3($filtros,$value){
			
			/* -- SELECT DISTINCS -- */
			$this->db->select($value);
			$this->db->distinct();
						
			/* -- WHERE -- */
			
			$this->db->where("bairro !=","");
			
			if($filtros['tipo_negocio'] != NULL){
			$this->db->where("tipo_negocio",$filtros['tipo_negocio']);}
			
			if($filtros['tipo_imovel'] != NULL){
			$this->db->where("tipo_imovel",$filtros['tipo_imovel']);}
			
			if($filtros['cidade'] != NULL){
			$this->db->where("cidade",$filtros['cidade']);}
					
				/*ID*/
				if($filtros['id'] != NULL){$this->db->where("id",$filtros['id']);}
							
				/*Fotos*/	
				if($filtros['imoveis_fotos'] != NULL)	{$this->db->where("foto_principal !=","NULL");}
				
				if(($filtros['valor-minimo'] != NULL)&&($filtros['valor-maximo'] != NULL)){
					$this->db->where("valor >=",$filtros['valor-minimo']);
					$this->db->where("valor <=",$filtros['valor-maximo']);
				}
				
				/*Valores*/
				if(($filtros['valor-minimo'] != NULL)&&($filtros['valor-maximo'] == NULL)){
					$this->db->where("valor >=",$filtros['valor-minimo']);}
				
				if(($filtros['valor-minimo'] == NULL)&&($filtros['valor-maximo'] != NULL)){
					$this->db->where("valor <=",$filtros['valor-maximo']);}
			
		
			/* -- ORDER --*/
			$this->db->order_by($value);
			
			return $this->db->get("imoveis")->result_array();
		}
		
		function imoveis_destaque($tipo){
			
			/* -- WHERE -- */
			$this->db->where("tipo_negocio",$tipo);
			$this->db->where("destaque_order >","0");
			 
			/* -- ORDER --*/
			$this->db->order_by("destaque_order");
			
			return $this->db->get("imoveis")->result_array();
		}
		
		function imovel_descricao($id){
			/* -- WHERE -- */
			$this->db->where("id",$id);
			
			return $this->db->get("imoveis")->row_array();
		}
		
		function lista_busca_relat($id,$bairro,$tipo,$negocio){
			/* -- WHERE -- */
			$this->db->where("bairro",$bairro);
			$this->db->where("tipo_imovel",$tipo);
			$this->db->where("tipo_negocio",$negocio);
			$this->db->where("id !=",$id);
			$this->db->where("foto_principal !=","");
			 
			/* -- LIMIT --*/
			$this->db->limit(5);
			
			return $this->db->get("imoveis")->result_array();
		}
		
		
	/* ------------------------ WHERE ------------------------ */	
	function last_imoveis($limit,$pTipo){
            /* -- ORDER --*/
			$this->db->order_by("data_insert","desc");
            
            if($pTipo != null){
                $this->db->where("tipo_negocio",$pTipo);
            }
        
			/* -- LIMIT --*/
			$this->db->limit($limit);
			
			return $this->db->get("imoveis")->result_array();
	}	
        
    /* -------------------------------------------- ADM ----------------------------------------*/
        
    /* INSERT */       
    function insert_content($table,$data){
        $this->db->insert($table, $data);
    } 
	
	/* UPDATE */        
    function update_content($table,$id,$data){
        $this->db->where 	('id', $id);
		$this->db->update	($table, $data);
    }   
	
	/* DELETE */        
    function delete_content($table,$id){
        $this->db->delete($table, array('id' => $id));
    }   
       		
}