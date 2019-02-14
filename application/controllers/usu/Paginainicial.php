<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Paginainicial extends CI_Controller {
	

	public function index() {
		
		$this->load->view('usu/includes/topo');
		$this->load->view('usu/includes/menu');
		$this->load->model('admin/noticiasmodel');
		$data['noticias'] = $this->noticiasmodel->get_noticias(3);
		$this->load->view('usu/paginainicialview', $data);
		$this->load->view('usu/includes/rodape');

	}
	
	public function noticias($slug = null) {
		$this->load->view('usu/includes/topo');
		$this->load->view('usu/includes/menu');
		if ($slug == null) {
			$this->load->model('admin/noticiasmodel');
			$data['noticias'] = $this->noticiasmodel->get_noticias();
			$this->load->view('usu/listanoticiasview',$data);
		} else {
			$this->load->model('admin/noticiasmodel');
			$data['noticia'] = $this->noticiasmodel->get_noticia_slug($slug);
			$this->load->view('usu/listanoticiaview',$data);
		}
		$this->load->view('usu/includes/rodape');
	}
	public function contato() {
		$this->load->view('usu/includes/topo');
		$this->load->view('usu/includes/menu');
		$this->load->view('usu/contatoview');
		$this->load->view('usu/includes/rodape');
	}
	
}

