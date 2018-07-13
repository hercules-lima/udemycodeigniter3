<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publicacoes_model extends CI_Model {

	public $id;
	public $categoria;
	public $titulo;
	public $subtitulo;
	public $conteudo;
	public $data;
	public $img;
	public $user;


	public function __construct(){
		parent::__construct();
	}

	public function destaques_home(){
		$this->db->limit(4);
		$this->db->order_by('data','DESC');
		return $this->db->get('postagens')->result();
	}

}