<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

    public function verificar_sessao() {
        if ($this->session->userdata('logado')==false) {
            redirect('home/login');
        }       
    }
    public function index($indice = null) {
        $this->verificar_sessao();
        
        $this->load->model('usuario_model','usuario');
        $dados['usuario'] = $this->usuario->get_usuarios();
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
        $this->verificar_sessao();
        $this->load->view('includes/html_header');
        $this->load->view('includes/menu');
        $this->load->view('cadastro_usuario');
        $this->load->view('includes/html_footer');
    }

    public function cadastrar() {
        $this->verificar_sessao();
        $this->load->model('usuario_model','usuario');
        if ($this->usuario->cadastrar()) {
            redirect('usuario/1');
        } else {
            redirect('usuario/2');
        }
    }

    public function excluir($id) {
        $this->verificar_sessao();
        $this->load->model('usuario_model','usuario');
        if ($this->usuario->excluir($id)) {
            redirect('usuario/3');
        } else {
            redirect('usuario/4');
        }
    }

    public function atualizar($id = null, $indice = null) {
        $this->verificar_sessao();
        $this->db->where('id', $id);
        $data['usuario'] = $this->db->get('usuario')->result();

        $this->load->view('includes/html_header');
        $this->load->view('includes/menu');
        if ($indice == 1) {
            $data['msg'] = "Senha alterada com sucesso";
            $this->load->view('includes/msg_sucesso', $data);
        } else if ($indice == 2) {
            $data['msg'] = "Falha ao alterar senha!";
            $this->load->view('includes/msg_erro', $data);
        }
        $this->load->view('atualizar_usuario', $data);
        $this->load->view('includes/html_footer');
    }

    public function salvar_atualizacao() {
        $this->verificar_sessao();
        $this->load->model('usuario_model','usuario');

        if ($this->usuario->salvar_atualizacao()) {
            redirect('usuario/5');
        } else {
            redirect('usuario/6');
        }
    }

    public function alterar_senha() {
        $this->verificar_sessao();
        $this->load->model('usuario_model','usuario');

        $id = $this->input->post('id');

        if ($this->usuario->alterar_senha()) {
           redirect('usuario/atualizar/'.$id.'/1');
       } else {
        redirect('usuario/atualizar/'.$id. '/2');
    }
}

}
