<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contatos extends CI_Controller {

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
        
        $data = null;
        if ($alert != null)
            $data['alert'] = $this->msg($alert);
            
            $this->load->view('admin/includes/topo');
            $this->load->view('admin/includes/menu');
            $this->load->view('admin/contatosview', $data);
            $this->load->view('admin/includes/rodape');
     
    }

}

