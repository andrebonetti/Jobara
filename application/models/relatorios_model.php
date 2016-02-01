<?php
	class Relatorios_model extends CI_Model {
		
        function lista_relatorios(){
			return $this->db->get("relatorios")->result_array();
		}
}