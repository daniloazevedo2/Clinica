<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {

	public function verificar_sessao() {
		if ($this->session->userdata('logado')==false) {
			redirect('home/login');
		} 		
	}

	public function index() {
		$this->verificar_sessao();
		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('view_home');
		$this->load->view('includes/html_footer');
	}

	public function login() {
		$this->load->view('view_login');
		$this->load->view('includes/html_header');
	}

	public function logar() {
		$email = $this->input->post('email');
		$senha = md5($this->input->post('senha'));

		$this->db->where('email',$email);
		$this->db->where('senha',$senha);
		$this->db->where('status',1);
		$data['usuario'] = $this->db->get('usuario')->result();

		if (count($data['usuario']) == 1) {
			$dados['nome'] = $data['usuario'][0]->nome;
			$dados['id'] = $data['usuario'][0]->id;
			$dados['logado'] = true;
			$this->session->set_userdata($dados);
			redirect('home');
		} else {
			redirect('home/login');
		}
	}

	public function sair() {
		$this->session->sess_destroy();
		redirect('home');
	}
}
