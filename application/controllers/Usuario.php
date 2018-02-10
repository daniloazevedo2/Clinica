<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

    public function index($indice = null) {
        $this->db->select('*');
        $dados['usuario'] = $this->db->get('usuario')->result();
        $this->load->view('includes/html_header');
        $this->load->view('includes/menu');
        if ($indice == 1) {
            $data['msg'] = "Usuário cadastrado com sucesso";
            $this->load->view('includes/msg_sucesso', $data);
        } else if ($indice == 2) {
            $data['msg'] = "Falha ao dastrar o usuário!";
            $this->load->view('includes/msg_erro', $data);
        } else if ($indice == 3) {
            $data['msg'] = "Usuário excluído com sucesso";
            $this->load->view('includes/msg_sucesso', $data);
        } else if ($indice == 4) {
            $data['msg'] = "Falha ao excluir usuário!";
            $this->load->view('includes/msg_erro', $data);
        } else if ($indice == 5) {
            $data['msg'] = "Usuário atualizado com sucesso";
            $this->load->view('includes/msg_sucesso', $data);
        } else if ($indice == 6) {
            $data['msg'] = "Falha ao alterar dados!";
            $this->load->view('includes/msg_erro', $data);
        }
        $this->load->view('listar_usuario', $dados);
        $this->load->view('includes/html_footer');
    }

    public function cadastro() {
        $this->load->view('includes/html_header');
        $this->load->view('includes/menu');
        $this->load->view('cadastro_usuario');
        $this->load->view('includes/html_footer');
    }

    public function cadastrar() {
        $data['nome'] = $this->input->post('nome');
        $data['cpf'] = $this->input->post('cpf');
        $data['endereco'] = $this->input->post('endereco');
        $data['email'] = $this->input->post('email');
        $data['senha'] = md5($this->input->post('senha'));
        $data['status'] = $this->input->post('status');
        $data['nivel'] = $this->input->post('nivel');

        if ($this->db->insert('usuario', $data)) {
            redirect('usuario/1');
        } else {
            redirect('usuario/2');
        }
    }

    public function excluir($id = null) {
        $this->db->where('id', $id);

        if ($this->db->delete('usuario')) {
            redirect('usuario/3');
        } else {
            redirect('usuario/4');
        }
    }

    public function atualizar($id = null) {
        $this->db->where('id', $id);
        $data['usuario'] = $this->db->get('usuario')->result();

        $this->load->view('includes/html_header');
        $this->load->view('includes/menu');
        $this->load->view('atualizar_usuario', $data);
        $this->load->view('includes/html_footer');
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
        if ($this->db->update('usuario', $data)) {
            redirect('usuario/5');
        } else {
            redirect('usuario/6');
        }
    }

}
