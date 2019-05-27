<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ControlLogin extends CI_Controller{

    public function index(){
        session_start();     
        if(isset( $_SESSION[ 'logado' ] )){
            header('Location: index.php/controlHome/');
        }else { 
            $this->load->view('login/login'); 
        }
    }
    public function logar(){
        $email = addslashes( $_POST['email'] );
        $senha = addslashes( $_POST['senha'] );

        $this->db->select('email, senha');

        $result = $this->db->get("usuario")->result();
        $cont = 0;
        foreach ($result as $key) {
            if($key->email == $email && $key->senha ==  $senha){
                echo "<script> alert('Login Efetuado!'); </script>";
                session_start();

                $this->db->select("nome, idPermissao");
                $this->db->where("email", $key->email);
                $res = $this->db->get("usuario")->result();
                $nome = array("nomeUser"=>$res[0]->nome, "permissao"=>$res[0]->idPermissao);

                $_SESSION[ 'logado' ] = true;
                $_SESSION[ 'nome' ] = $res[0]->nome;
                $_SESSION[ 'permissao' ] = $res[0]->idPermissao;
                $this->load->view('home');
                $cont++;
            }
        }
        if($cont == 0){
            header('Location: ../../');  //retorna ao index.php
            exit();
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
} 
?>