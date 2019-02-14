<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AcessoModel extends CI_Model {
	
	public function logar($email, $senha) {
		$this->db->where('email_usuario', $email);
		$this->db->where('senha_usuario', $senha);
		return $this->db->get('usuarios')->result();
	}
	
}