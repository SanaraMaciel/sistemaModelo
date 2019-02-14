<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Noticiasmodel extends CI_Model {
	
	
	public function get_noticias($limit = null) {
		$this->db->join('tipos', 'cod_tipo = tipos_cod_tipo', 'inner');
		if ($limit != null) {
			$this->db->limit($limit);
		}
		$this->db->order_by('cod_noticia','DESC');
		$result = $this->db->get('noticias')->result();
		return $result;
	}
	
	public function get_noticia($codigo) {
		$this->db->join('tipos', 'cod_tipo = tipos_cod_tipo', 'inner');
		$this->db->where('cod_noticia', $codigo);
		$result = $this->db->get('noticias')->result();
		return $result;
	}
	
	public function get_noticia_slug($slug) {
		$this->db->join('tipos', 'cod_tipo = tipos_cod_tipo', 'inner');
		$this->db->where('slug_noticia', $slug);
		$result = $this->db->get('noticias')->result();
		return $result;
	}
	
	public function get_tipos() {
		$result = $this->db->get('tipos')->result();
		return $result;
	}
	
	public function insert($tabela, $data) {
		$result = $this->db->insert($tabela, $data);
		return $result;
	}
	
	public function update($tabela, $data, $codigo) {
		$this->db->where('cod_noticia', $codigo);
		$result = $this->db->update($tabela, $data);
		return $result;
	}
	
	public function delete($tabela, $codigo) {
		$this->db->where('cod_noticia', $codigo);
		$result = $this->db->delete($tabela);
		return $result;
	}
	
}
