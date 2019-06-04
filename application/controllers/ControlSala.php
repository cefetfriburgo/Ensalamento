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
            $max = 7;
            $start = (!$this->uri->segment("3")) ? 0 : $this->uri->segment("3");
            
            $config['base_url'] = '../../../controlSala/viewListar/';
            $config['total_rows'] = $this->sala->contaRegistros();
            $config['per_page'] = $max;
            $config['full_tag_open'] = '<ul class="pagination justify-content-center">';
            $config['full_tag_close'] = '</ul>';
            $config['attributes'] = ['class' => 'page-link'];
            $config['first_link'] = false;
            $config['last_link'] = false;
            $config['first_tag_open'] = '<li class="page-item">';
            $config['first_tag_close'] = '</li>';
            $config['prev_link'] = '&laquo';
            $config['prev_tag_open'] = '<li class="page-item">';
            $config['prev_tag_close'] = '</li>';
            $config['next_link'] = '&raquo';
            $config['next_tag_open'] = '<li class="page-item">';
            $config['next_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li class="page-item">';
            $config['last_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
            $config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
            $config['num_tag_open'] = '<li class="page-item">';
            $config['num_tag_close'] = '</li>';

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
        
        $inputs = array(
            "nome"       =>  $this->input->post('nome-sala'),
            "capacidade" =>  $this->input->post('capacidade'),
            "local"      =>  $this->input->post('local'),
            "tipo"       =>  $this->input->post('tipo')
        ); 
        // print_r( $inputs );
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

    public function alterar(){

        $idSala   =  $this->input->post('idSala');
        $nome         =  $this->input->post('nome-sala');
        $capacidade   =  $this->input->post('capacidade');
        $local        =  $this->input->post('local');
        $tipo         =  $this->input->post('tipo');

        $data = array(
            'idSala' => $idSala,
            'codigo' => $nome,
            'capacidade' => $capacidade,
            'idLocal' => $local,
            'idSalaTipo' => $tipo
        );

        // print_r( $data );   
        $this->db->where('idSala', $idSala);
        $this->db->update('sala', $data); 
        echo "<script> alert('Sala Alterada!'); </script>";
        $this->viewListar();

    }
    public function excluir(){

        $id = $_POST[ 'id-del' ];
        $this->db->where('idSala', $id);
        $this->db->delete('sala');
        header('Location: viewListar');
    }
    private function verificaInputs($array){
        foreach ($array as $key) {
            if(empty($key)){ throw new Exception("Não pode haver campos vazios."); }
        }
        return true;
    }
}