<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

class ControlSala extends CI_Controller{

    public function viewRegistrar(){
       
        session_start();
        if(isset( $_SESSION[ 'logado' ]) ){
            $this->load->view('sala/registro-sala');
        }else{
            header('Location: ../../');
            exit();
        }
    }
    public function viewListar(){
        
        session_start();
        if(isset( $_SESSION[ 'logado' ]) ){
            $this->load->view('sala/lista-sala');
        }else{
            header('Location: ../../');
            exit();
        }
    }
}