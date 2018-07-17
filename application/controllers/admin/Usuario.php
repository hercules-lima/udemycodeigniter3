<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index()
	{	
		if(!$this->session->userdata('logado')){
			redirect(base_url('admin/login'));
		}

		$this->load->library('table');
		$this->load->model('usuarios_model','modelusuarios');
		$dados['usuario']=$this->modelusuarios->listar_autores();
		//Dados a serem enviados para o Cabeçalho
		$dados['titulo']= 'Painel de Controle';
		$dados['subtitulo']= 'Usuários';

		$this->load->view('backend/template/html-header',$dados);
		$this->load->view('backend/template/template');
		$this->load->view('backend/usuario');
		$this->load->view('backend/template/html-footer');
	}


	public function inserir(){
			if(!$this->session->userdata('logado')){
			redirect(base_url('admin/login'));
		}
		$this->load->model('usuarios_model','modelusuarios');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('txt-nome','Nome do Usuário','required|min_length[3]');
		$this->form_validation->set_rules('txt-email','Email','required|valid_email');
		$this->form_validation->set_rules('txt-historico','Histórico','required|min_length[20]');
		$this->form_validation->set_rules('txt-user','User','required|min_length[3]|is_unique[usuario.user]');
		$this->form_validation->set_rules('txt-senha','Senha','required|min_length[3]');
		$this->form_validation->set_rules('txt-confir-senha','Confirmar Senha','required|matches[txt-senha]');
		if($this->form_validation->run() == FALSE){
			$this->index();
		}else{
			$nome=$this->input->post('txt-nome');
			$email=$this->input->post('txt-email');
			$historico=$this->input->post('txt-historico');
			$user=$this->input->post('txt-user');
			$senha=$this->input->post('txt-senha');
			if($this->modelusuarios->adicionar($nome,$email,$historico,$user,$senha)){
				redirect(base_url('admin/usuario'));
			}else{
				echo "Houve um erro no sistema!";
			}
		}
	}

	public function excluir($id){
			if(!$this->session->userdata('logado')){
			redirect(base_url('admin/login'));
		}

		$this->load->model('usuarios_model','modelusuarios');

		if($this->modelusuarios->excluir($id)){
			redirect(base_url('admin/usuario'));
		}else{
			echo "Houve um erro no sistema!";
		}
	}

	public function alterar($id){
			if(!$this->session->userdata('logado')){
			redirect(base_url('admin/login'));
		}
		$this->load->model('usuarios_model','modelusuarios');
		$this->load->library('table');
		$dados['categorias'] = $this->modelcategorias->listar_categoria($id);
		//Dados a serem enviados para o Cabeçalho

		$dados['titulo']= 'Painel de Controle';
		$dados['subtitulo']= 'Categoria';

		$this->load->view('backend/template/html-header',$dados);
		$this->load->view('backend/template/template');
		$this->load->view('backend/alterar-categoria');
		$this->load->view('backend/template/html-footer');
	}

	public function salvar_alteracoes(){
				if(!$this->session->userdata('logado')){
			redirect(base_url('admin/login'));
		}
		$this->load->model('usuarios_model','modelusuarios');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('txt-categoria','Nome da Categoria','required|min_length[3]|is_unique[categoria.titulo]');
		if($this->form_validation->run() == FALSE){
			$this->index();
		}else{
			$titulo=$this->input->post('txt-categoria');
			$id= $this->input->post('txt-id');
			if($this->modelcategorias->altera($titulo,$id)){
				redirect(base_url('admin/categoria'));
			}else{
				echo "Houve um erro no sistema!";
			}
		}
	}

	public function pag_login(){
				//Dados a serem enviados para o Cabeçalho

		$dados['titulo']= 'Painel de Controle';
		$dados['subtitulo']= 'Entra no Sistema';

		$this->load->view('backend/template/html-header',$dados);
		$this->load->view('backend/login');
		$this->load->view('backend/template/html-footer');
	}

	public function login(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('txt-user','Usuário','required|min_length[3]');
		$this->form_validation->set_rules('txt-senha','Senha','required|min_length[3]');
		if($this->form_validation->run() == FALSE){
			$this->pag_login();
		}else{
			$usuario = $this->input->post('txt-user');	
			$senha = $this->input->post('txt-senha');
			$this->db->where('user',$usuario);	
			$this->db->where('senha',md5($senha));	
			$userlogado = $this->db->get('usuario')->result();
			if(count($userlogado)==1){
				$dadosSessao['userlogado'] = $userlogado[0];
				$dadosSessao['logado'] = TRUE;
				$this->session->set_userdata($dadosSessao);
				redirect(base_url('admin'));
			}
			else{
				$dadosSessao['userlogado'] = NULL;
				$dadosSessao['logado'] = FALSE;
				$this->session->set_userdata($dadosSessao);
				redirect(base_url('admin/login'));
			}
		}
	}

	public function logout(){
		$dadosSessao['userlogado'] = NULL;
		$dadosSessao['logado'] = FALSE;
		$this->session->set_userdata($dadosSessao);
		redirect(base_url('admin/login'));
	}
}
