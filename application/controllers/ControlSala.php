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
            $this->load->library('pagination');
            $this->load->model("SalaModel", "sala");
            $max = 4;
            $start = (!$this->uri->segment("3")) ? 0 : $this->uri->segment("3");
            
            $config['base_url'] = '../../../index.php/controlSala/viewListar/';
            $config['total_rows'] = $this->sala->contaRegistros();
            $config['per_page'] = $max;
            $config['first_link'] = 'Primeiro';
            $config['last_link'] = 'Último';
            $config['next_link'] = 'Próximo';
            $config['prev_link'] = 'Anterior';

            $this->pagination->initialize($config);

            $param["paginacao"] =  $this->pagination->create_links();
            $param["salas"] =  $this->sala->listar($start, $max);
            $this->load->view('sala/lista-sala', $param);
        
        }else{
            header('Location: ../../');
            exit();
        }
    }

    public function cadastrar(){
        $idTipo = 0;
        if($this->input->post('tipo') == 'Laboratório'){ $idTipo = 1; }
        if($this->input->post('tipo') == 'Sala de aula'){ $idTtipo = 1; }
        $inputs = array(
            "nome"       =>  $this->input->post('nome-sala'),
            "capacidade" =>  $this->input->post('capacidade'),
            "local"      =>  $this->input->post('local'),
            "tipo"       =>  $idTipo
        );
            
        try{
            if($this->verificaInputs($inputs)){

                $this->load->model("SalaModel", "sala");       // crio o objeto Sala
                
                $this->sala->setNome($inputs['nome']);
                $this->sala->setCapacidade($inputs['capacidade']);
                $this->sala->setLocal($inputs['local']);      // seto as variáveis 
                $this->sala->setTipo($inputs['tipo']);
                
                $this->sala->inserir($this->sala);            // insiro o objeto no Banco         
            }
        }catch(Exception $e){
            session_start();
            $_SESSION[ 'erro' ] = $e->getMessage();   
            $this->load->view('sala/registro-sala');
        }
    }

    private function verificaInputs($array){
        foreach ($array as $key) {
            if(empty($key)){ throw new Exception("Não pode haver campos vazios."); }
        }
        return true;
    }
}