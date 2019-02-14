<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Noticias extends CI_Controller {
	
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
	
	public function index($alert=null) {
		$this->validar_sessao();
		$this->load->model('admin/noticiasmodel');
		
		$data['noticias'] = $this->noticiasmodel->get_noticias();
		if ($alert != null)
			$data['alert'] = $this->msg($alert);
			
			$this->load->view('admin/includes/topo');
			$this->load->view('admin/includes/menu');
			$this->load->view('admin/listanoticiasview', $data);
			$this->load->view('admin/includes/rodape');
	}
	
	public function cadastro() {
		$this->validar_sessao();
		$this->load->model('admin/noticiasmodel', 'noticias');
		$data['tipos'] = $this->noticias->get_tipos();
		
		$this->load->view('admin/includes/topo');
		$this->load->view('admin/includes/menu');
		$this->load->view('admin/novanoticiaview', $data);
		$this->load->view('admin/includes/rodape');
	
	}
	
	public function atualizacao($codigo) {
		$this->validar_sessao();
		$this->load->model('admin/noticiasmodel', 'noticias');
		
		$data['tipos'] = $this->noticias->get_tipos();
		$data['noticia'] = $this->noticias->get_noticia($codigo);
		
		
		$this->load->view('admin/includes/topo');
		$this->load->view('admin/includes/menu');
		$this->load->view('admin/atualizanoticiaview', $data);
		$this->load->view('admin/includes/rodape');
	
	}
	
	public function salvar() {
		$this->validar_sessao();
		$this->load->model('admin/noticiasmodel');
		$data['titulo_noticia'] = $this->input->post('titulo');
		$data['subtitulo_noticia'] = $this->input->post('subtitulo');
		$data['slug_noticia'] = $this->input->post('slug');
		$data['tipos_cod_tipo'] = $this->input->post('tipo');
		$data['conteudo_noticia'] = $this->input->post('conteudo');
		$data['imagem_noticia'] = $this->upload_imagem();
		$nascimento = explode('/', $this->input->post('data'));
		$data['data_noticia'] = $nascimento[2] . '-' . $nascimento[1] . '-' . $nascimento[0];
		$data['titulo_noticia'] = $this->input->post('titulo');
		
		$result = $this->noticiasmodel->insert('noticias', $data);
		if ($result) {
			redirect('admin/noticias/1');
		} else {
			redirect('admin/noticias/2');
		}
	}
	
	public function salvar_update() {
		$this->validar_sessao();
		$this->load->model('admin/noticiasmodel');
		$data['titulo_noticia'] = $this->input->post('titulo');
		$data['subtitulo_noticia'] = $this->input->post('subtitulo');
		$data['slug_noticia'] = $this->input->post('slug');
		$data['tipos_cod_tipo'] = $this->input->post('tipo');
		$data['conteudo_noticia'] = $this->input->post('conteudo');
		
		//A funcção upload_imagem() tentará fazer o upload de uma imagem. Caso o usuario não tenha
		//selecionado alguma imagem, a função irá retornar null. Sendo assim, não será necessário
		// atualizar o campo 'imagem_noticia', somente quando a função retornar o nome de uma imagem.
		$upload = $this->upload_imagem();
		if ($upload != null) {
			$data['imagem_noticia'] = $upload;
		}
		
		$nascimento = explode('/', $this->input->post('data'));
		$data['data_noticia'] = $nascimento[2] . '-' . $nascimento[1] . '-' . $nascimento[0];
		$data['titulo_noticia'] = $this->input->post('titulo');
		
		$codigo = $this->input->post('codigo');
		
		$result = $this->noticiasmodel->update('noticias', $data, $codigo);
		if ($result) {
			redirect('admin/noticias/5');
		} else {
			redirect('admin/noticias/6');
		}
	}
	
	public function deletar($codigo) {
		$this->validar_sessao();
		$this->load->model('admin/noticiasmodel');
		$result = $this->noticiasmodel->delete('noticias', $codigo);
		if ($result) {
			redirect('admin/noticias/3');
		} else {
			redirect('admin/noticias/4');
		}
	}
	
	function upload_imagem() {
		
		$caminho = './imagens/noticias';
		$config['upload_path'] = $caminho;
		$config['allowed_types'] = "gif|jpg|jpeg|png";
		$config['max_size'] = "5000";
		$config['max_width'] = "5907";
		$config['max_height'] = "5280";
		$config['encrypt_name'] = true;
		
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		
		if (!$this->upload->do_upload("imagem")) {
			
			//            $error = array('error' => $this->upload->display_errors());
			//            echo '[' . realpath($config['upload_path']) . ']<br>';
			//            print_r($error);
			//            exit();
			return null;
		} else {
			//Deletar foto existente para subir a nova imagem
			$cod_noticia = $this->input->post('codigo');
			$this->db->select('cod_noticia,imagem_noticia');
			$this->db->where('cod_noticia', $cod_noticia);
			$data = $this->db->get('noticias')->result();
			
			if (isset($data[0]->imagem_noticia)) {
				unlink(realpath($caminho) . '/' . $data[0]->imagem_noticia);
			}
			// Fim do código de deletar a imagem
			
			$data = array('upload_data' => $this->upload->data());
			$config['image_library'] = 'GD2';
			$config['source_image'] = $caminho . '/' . $data['upload_data']['file_name'];
			$config['create_thumb'] = false;
			$config['maintain_ratio'] = false; //Redimensiona a imagem sem desconfiguralá-la;
			$config['quality'] = "100%";
			
			$config['width'] = 740;
			$config['height'] = 500;
			
			//Redimena a imagem
			$this->load->library('image_lib', $config);
			if (!$this->image_lib->resize()) {
				//Caso ocorrer algum erro, o CodeIgniter mostra na tela o que ocorreu.
				echo $this->image_lib->display_errors();
				exit();
			}
			return $data['upload_data']['file_name'];
		}
	}
	
	public function msg($alert) {
		$str = '';
		if ($alert == 1)
			$str = 'success- Notícia cadastrada com sucesso!';
			else if ($alert == 2)
				$str = 'danger-Não foi possível cadastrar a notícia. Por favor, tente novamente!';
				else if ($alert == 3)
					$str = 'success- Notícia removida com sucesso!';
					else if ($alert == 4)
						$str = 'danger-Não foi possível remover a notícia. Por favor, tente novamente!';
						elseif ($alert == 5)
						$str = 'success- Notícia atualizada com sucesso!';
						else if ($alert == 6)
							$str = 'danger-Não foi possível atualizar a notícia. Por favor, tente novamente!';
							else
								$str = null;
								return $str;
	}
	
}
