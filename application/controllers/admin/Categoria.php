<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('categorias_model','modelcategorias');
		$this->categorias = $this->modelcategorias->listar_categorias();
	}

	public function index()
	{	
		$this->load->library('table');
		$dados['categorias'] = $this->categorias;
		//Dados a serem enviados para o Cabeçalho

		$dados['titulo']= 'Painel de Controle';
		$dados['subtitulo']= 'Categoria';

		$this->load->view('backend/template/html-header',$dados);
		$this->load->view('backend/template/template');
		$this->load->view('backend/categoria');
		$this->load->view('backend/template/html-footer');
	}

	public function inserir(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('txt-categoria','Nome da Categoria','required|min_length[3]|is_unique[categoria.titulo]');
		if($this->form_validation->run() == FALSE){
			$this->index();
		}else{
			$titulo=$this->input->post('txt-categoria');
			if($this->modelcategorias->adicionar($titulo)){
				redirect(base_url('admin/categoria'));
			}else{
				echo "Houve um erro no sistema!";
			}
		}
	}

	public function excluir($id){

		if($this->modelcategorias->excluir($id)){
			redirect(base_url('admin/categoria'));
		}else{
			echo "Houve um erro no sistema!";
		}
	}
}
