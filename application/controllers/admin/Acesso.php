<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Acesso extends CI_Controller {
	
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 * 	- or -
	 * 		http://example.com/index.php/welcome/index
	 * 	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function validar_sessao() {
		if (!$this->session->userdata('LOGADO')) {
			redirect('admin/acesso');
		}
		return true;
	}
	
	public function index() {
		
		if ($this->validar_sessao()) {
			$this->load->view('admin/includes/topo');
			$this->load->view('admin/includes/menu');
			$this->load->view('admin/painelview');
			$this->load->view('admin/includes/rodape');
		} else {
			redirect('admin/acesso');
		}
	}
	
	public function login($alert = null) {
		if ($this->session->userdata('LOGADO'))
			redirect('admin');
			$dados = null;
			if ($alert != null)
				$dados['alert'] = $this->msg($alert);
				$this->load->view('admin/acessoview', $dados);
	}
	
	public function logar() {
		
		$this->load->model('admin/acessomodel');
		
		$email = $this->input->post('email');
		$senha = md5($this->input->post('senha'));
		$usuario = $this->acessomodel->logar($email, $senha);
		
		if (count($usuario) === 1) {
			$dados['cod_usuario'] = $usuario[0]->cod_usuario;
			$dados['nome_usuario'] = $usuario[0]->nome_usuario;
			$dados['LOGADO'] = TRUE;
			$dados['imagem_usuario'] = $usuario[0]->imagem_usuario;
			
			$this->session->set_userdata($dados);
			redirect("admin/");
		} else {
			redirect("admin/acesso/2");
		}
	}
	
	public function logout() {
		$this->session->sess_destroy();
		redirect("admin/acesso");
	}
	
	public function configuracoes() {
		$this->validar_sessao();
		
		$this->load->view('admin/includes/topo');
		$this->load->view('admin/includes/menu');
		$this->load->view('admin/configuracoesview');
		$this->load->view('admin/includes/rodape');
		
	}
	
	public function msg($alert) {
		$str = '';
		if ($alert == 1)
			$str = 'success- Login realizado com sucesso!';
			else if ($alert == 2)
				$str = 'danger-Não foi possível entrar. Verifique o email e a senha e tente novamente!';
				else
					$str = null;
					return $str;
	}
	
}
