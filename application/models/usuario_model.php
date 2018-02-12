<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Usuario_model extends CI_Model{

	function __construct(){

		parent::__construct();
	}

	public function cadastrar() {
		$data['nome'] = $this->input->post('nome');
		$data['cpf'] = $this->input->post('cpf');
		$data['endereco'] = $this->input->post('endereco');
		$data['email'] = $this->input->post('email');
		$data['senha'] = md5($this->input->post('senha'));
		$data['status'] = $this->input->post('status');
		$data['nivel'] = $this->input->post('nivel');

		return $this->db->insert('usuario', $data); 
	}

	public function excluir($id) {
		$this->db->where('id', $id);
		if ($this->db->delete('usuario')){
			return true;
		}else{
			return false;
		}
	}

	public function salvar_atualizacao() {
		$id = $this->input->post('id');
		$data['nome'] = $this->input->post('nome');
		$data['cpf'] = $this->input->post('cpf');
		$data['endereco'] = $this->input->post('endereco');
		$data['email'] = $this->input->post('email');
		$data['status'] = $this->input->post('status');
		$data['nivel'] = $this->input->post('nivel');

		$this->db->where('id', $id);
		return $this->db->update('usuario', $data); 
	}

	 public function alterar_senha() {

        $id = $this->input->post('id');
        $senha_antiga = md5($this->input->post('senha_antiga'));
        $nova_senha = md5($this->input->post('nova_senha'));

        $this->db->select('senha');
        $this->db->where('id', $id);
        $data['senha'] = $this->db->get('usuario')->result();
        $dados['senha'] = $nova_senha;

        if ($data['senha'][0]->senha == $senha_antiga) {
            $this->db->where('id', $id);
            $this->db->update('usuario', $dados);
            
            return true;
        } else {
            return false;
        }
    }

    function get_usuarios(){
    	$this->db->select('*');
        return $this->db->get('usuario')->result();
    }


}