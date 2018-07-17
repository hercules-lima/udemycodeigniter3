<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index()
	{	
		//Dados a serem enviados para o Cabeçalho

		$dados['titulo']= 'Painel de Controle';
		$dados['subtitulo']= 'Home';

		$this->load->view('backend/template/html-header',$dados);
		$this->load->view('backend/template/template');
		$this->load->view('backend/home');
		$this->load->view('backend/template/html-footer');
	}

	public function pag_login(){
				//Dados a serem enviados para o Cabeçalho

		$dados['titulo']= 'Painel de Controle';
		$dados['subtitulo']= 'Entra no Sistema';

		$this->load->view('backend/template/html-header',$dados);
		$this->load->view('backend/login');
		$this->load->view('backend/template/html-footer');
	}
}
