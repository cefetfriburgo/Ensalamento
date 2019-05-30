<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ControlUser extends CI_Controller{

    public function viewRegistrar(){

        session_start();
        if(isset( $_SESSION[ 'logado' ]) ){
            $this->load->view('usuario/registro-user');
        }else{
            header('Location: ../../');
            exit();
        }
    }
    public function viewListar(){

        session_start();
        if(isset( $_SESSION[ 'logado' ]) ){
            $this->load->library('pagination');
            $this->load->model("UsuarioModel", "user");
            $max = 5;
            $start = (!$this->uri->segment("3")) ? 0 : $this->uri->segment("3");
            
            $config['base_url'] = '../../../index.php/controlUser/viewListar/';
            $config['total_rows'] = $this->user->contaRegistros();
            $config['per_page'] = $max;
            $config['first_link'] = 'Primeiro';
            $config['last_link'] = 'Último';
            $config['next_link'] = 'Próximo';
            $config['prev_link'] = 'Anterior';

            $this->pagination->initialize($config);

            $param["paginacao"] =  $this->pagination->create_links();
            $param["users"] =  $this->user->listar($start, $max);
            $this->load->view('usuario/lista-user', $param);
        
        }else{
            header('Location: ../../');
            exit();
        }
        
    }
    public function cadastrar(){
        $inputs = array(
        "nome"         =>  $this->input->post('nome-user'),
        "email"        =>  $this->input->post('email-user'),
        "permissao"    =>  $this->input->post('permissao'),
        "funcao"       =>  $this->input->post('funcao'),
        "senha"        =>  $this->input->post('senha-user'),
        "confirmSenha" =>  $this->input->post('confirm-user')
    );
        
        try{
            if($this->verificaInputs($inputs)){

                if($inputs['senha'] == $inputs['confirmSenha']){
            
                    $this->load->model("UsuarioModel", "user");       // crio o objeto User
                    
                    $this->user->setNome($inputs['nome']);
                    $this->user->setEmail($inputs['email']);
                    $this->user->setPermissao($inputs['permissao']);  // seto as variáveis 
                    $this->user->setFuncao($inputs['funcao']);
                    $this->user->setSenha($inputs['senha']);
                
                    $this->user->inserir($this->user);                // insiro o objeto no Banco
                    
                }else{ 
                    $_SESSION[ 'erro' ] = "As senhas fornecidas são diferentes.";
                    $this->load->view('usuario/registro-user');
                } 
            }
        }catch(Exception $e){
            session_start();
            $_SESSION[ 'erro' ] = $e->getMessage();     
            $this->load->view('usuario/registro-user');
        }
        
    }

    public function alterar(){
        
        $idUsuario    =  $this->input->post('idUser');
        $nome         =  $this->input->post('nome-user');
        $email        =  $this->input->post('email-user');
        $permissao    =  $this->input->post('permissao');
        $funcao       =  $this->input->post('funcao');
        $senha        =  $this->input->post('senha-user');
        $confirmSenha =  $this->input->post('confirm-user');
        if( $senha == $confirmSenha ){
            $data = array(
                'nome' => $nome,
                'email' => $email,
                'idPermissao' => $permissao,
                'idFuncao' => $funcao,
                'senha' => $senha
            );
            $this->db->where('idUsuario', $idUsuario);
            $this->db->update('usuario', $data); 
            echo "<script> alert('Usuário Alterado!'); </script>";
            $this->viewListar();
        }else{ 
            die('Senhas precisam ser iguais.'); }
        
    }
    public function excluir(){
        $id = $_POST[ 'id-del' ];
        $this->db->where('idUsuario', $id);
        $this->db->delete('usuario');
        echo "<script> alert('Usuário Alterado!'); </script>";
        header('Location: viewListar');
    }
    private function verificaInputs($array){
        foreach ($array as $key) {
            if(empty($key)){ throw new Exception("Não pode haver campos vazios."); }
        }
        return true;
    }
}

?>