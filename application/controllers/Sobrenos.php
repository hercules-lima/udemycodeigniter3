<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sobrenos extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model('categorias_model','modelcategorias');
		$this->categorias = $this->modelcategorias->listar_categorias();
	}

	public function index($id, $slug=null)
	{	
		$dados['categorias'] = $this->categorias;
		$this->load->model('publicacoes_model','modelpublicacoes');
		$dados['postagem'] = $this->modelpublicacoes->categoria_pub($id);

		//Dados a serem enviados para o Cabeçalho

		$dados['titulo']= 'Categorias';
		$dados['subtitulo']= '';
		$dados['subtitulodb']= $this->modelcategorias->listar_titulos($id);

		$this->load->view('frontend/template/html-header',$dados);
		$this->load->view('frontend/template/header');
		$this->load->view('frontend/categoria');
		$this->load->view('frontend/template/aside');
		$this->load->view('frontend/template/footer');
		$this->load->view('frontend/template/html-footer');
	}

	public function autores($id,$slug=null){
			$dados['categorias'] = $this->categorias;
			$this->load->model('usuarios_model','modelusuarios');
			$dados['autores'] = $this->modelusuarios->listar_autor($id);

		//Dados a serem enviados para o Cabeçalho

		$dados['titulo']= 'Sobre Nós';
		$dados['subtitulo']= 'Autor';

		$this->load->view('frontend/template/html-header',$dados);
		$this->load->view('frontend/template/header');
		$this->load->view('frontend/autor');
		$this->load->view('frontend/template/aside');
		$this->load->view('frontend/template/footer');
		$this->load->view('frontend/template/html-footer');
	}
}
