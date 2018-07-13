<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model('categorias_model','modelcategorias');
		$this->categorias = $this->modelcategorias->listar_categorias();
	}

	public function index()
	{	
		$dados['categorias'] = $this->categorias;
		$this->load->view('frontend/template/html-header',$dados);
		$this->load->view('frontend/template/header');
		$this->load->view('frontend/home');
		$this->load->view('frontend/template/aside');
		$this->load->view('frontend/template/footer');
		$this->load->view('frontend/template/html-footer');
	}
}
