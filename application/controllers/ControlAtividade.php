<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

class ControlAtividade extends CI_Controller{

    public function viewRegistrar(){
        
        session_start();
        if(isset( $_SESSION[ 'logado' ]) ){
            $this->load->view('atividade/registro-atividade');
        }else{
            header('Location: ../../');
            exit();
        }
    }
    public function viewListar(){
        
        session_start();
        if(isset( $_SESSION[ 'logado' ]) ){
            $this->load->view('atividade/lista-atividade');
        }else{
            header('Location: ../../');
            exit();
        }
        
    }

}