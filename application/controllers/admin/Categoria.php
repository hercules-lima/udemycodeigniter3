<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index()
	{	
		//Dados a serem enviados para o Cabeçalho

		$dados['titulo']= 'Painel de Controle';
		$dados['subtitulo']= 'Categoria';

		$this->load->view('backend/template/html-header',$dados);
		$this->load->view('backend/template/template');
		$this->load->view('backend/categoria');
		$this->load->view('backend/template/html-footer');
	}
}
