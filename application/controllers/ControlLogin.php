<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ControlLogin extends CI_Controller{

    public function index(){
        session_start();     
        if(isset( $_SESSION[ 'logado' ] )){
            header('Location: /controlHome');
        }else { 
            $this->load->view('login/login'); 
        }
    }
    public function logar(){

        try{
            $data = array(
                'email' => $this->input->post('email'),
                'senha' => $this->input->post('senha')
            );
            if($this->verificaInputs($data)){

                $this->load->model("LoginModel", "loginObj");
                $this->loginObj->setEmail($data['email']);
                $this->loginObj->setSenha($data['senha']);

                $this->loginObj->login($this->loginObj);
                header('Location: ../home/');
                
            }

        }catch(Exception $e){
            session_start();
            $_SESSION[ 'erro' ] = $e->getMessage();     
            header('Location: ../');
        }
    }
    public function verificaLogin(){
        if($_SESSION[ 'logado' ] == false){
            header('Location: ../../');
        }
    }
    public function logout(){
        session_start();
        session_destroy();
        header('Location: ../../');
        exit();
    }
    private function verificaInputs($array){
        foreach ($array as $key) {
            if(empty($key)){ throw new Exception("Não pode haver campos vazios."); }
        }
        return true;
    }
} 
?>