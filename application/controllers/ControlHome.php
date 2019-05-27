<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

class ControlHome extends CI_Controller{

    public function index(){
        session_start();
        if(isset( $_SESSION[ 'nome' ] ) && isset( $_SESSION[ 'permissao' ] )){
            $nome = array("nomeUser"=>$_SESSION[ 'nome' ], "permissao"=>$_SESSION[ 'permissao' ]);
            $this->load->view('home', $nome);
        }else{
            header('Location: ../../');
            exit();
        }
        
    }

}