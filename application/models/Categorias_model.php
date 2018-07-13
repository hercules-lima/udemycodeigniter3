<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias_model extends CI_Model {

	public $id;
	public $titulo;

	public function __construct(){
		parent::__construct();
	}

	public function listar_categorias(){
		$this->db->order_by('titulo','ASC');
		return $this->db->get('categoria')->result();
	}

}