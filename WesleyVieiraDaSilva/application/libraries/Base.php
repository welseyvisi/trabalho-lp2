<?php

/**
 * Conecta com o bannco de dados e pega os valores
 * @author Wesley Vieira
 *
 */
class Base{
	private $ci;
	private $db;

	function __construct(){
		$this->ci = & get_instance();
		$this->db = $this->ci->db;
	}

	function getAll(){
		$rs = $this->db->get('data');
		return $rs->result();
	}

	
	function write($data){
		return $this->db->insert('data', $data);
	}

	
	

}