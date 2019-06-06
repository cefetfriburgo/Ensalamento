<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

class ControlAtividade extends CI_Controller{

    public function viewRegistrar(){
        
        session_start();
        if(isset( $_SESSION[ 'logado' ]) ){
            $query = $this->db->query('select * from atividadetipo ;');
            $result =  $query->result();
            $param['tipoAtv'] = $result;
            $this->load->view('atividade/registro-atividade', $param);

        }else{
            header('Location: ../../');
            exit();
        }
    }
    public function viewListar(){
        session_start();
        if(isset( $_SESSION[ 'logado' ]) ){
            $this->load->library('pagination');
            $this->load->model("AtividadeModel", "atividade");
            $max = 7;
            $start = (!$this->uri->segment("3")) ? 0 : $this->uri->segment("3");
            
            $config['base_url'] = '../../../controlAtividade/viewListar/';
            $config['total_rows'] = $this->atividade->contaRegistros();
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

            $query = $this->db->query('select * from atividadetipo ;');
            $result =  $query->result();

            $param['tipoAtv'] = $result;
            $param["paginacao"] =  $this->pagination->create_links();
            $param["atvs"] =  $this->atividade->listar($start, $max);
            $this->load->view('atividade/lista-atividade', $param);
        
        }else{
            header('Location: ../../');
            exit();
        }
    }

    public function cadastrar(){
        $data = array(
            'nome'  => $this->input->post('nome-atv'),
            'tipo'  => $this->input->post('tipo-atv'),
            'curso' => $this->input->post('curso')
        );
        try{
            if($this->verificaInputs($data)){
                
                $this->load->model('AtividadeModel', 'atividade');
                
                $this->atividade->setNome($data['nome']);
                $this->atividade->setTipo($data['tipo']);
                $this->atividade->setCurso($data['curso']);
                
                $this->atividade->inserir($this->atividade);
                session_start();
                header('Location: ../controlAtividade/viewRegistrar');
            }
        }catch(Exception $e){
            session_start();
            $_SESSION[ 'erro' ] = $e->getMessage();     
            header('Location: ../controlAtividade/viewRegistrar');
        }
        
    }
    public function alterar(){
        $idAtv  =  $this->input->post('idAtv');
        $curso  =  $this->input->post('curso');
        
        $data = array(
            'atividade'  => $this->input->post('nome-atv'),
            'idAtividadeTipo'  => $this->input->post('tipo-atv')
        );
        $this->db->where('idAtividade', $idAtv);
        $this->db->update('atividade', $data);
        
        $sql = "update atividadeCurso set idCurso =".$curso." where idAtividade =".$idAtv;
        $this->db->query($sql);

        echo "<script> alert('Atividade Alterada!'); </script>";
        $this->viewListar();
    }
    public function excluir(){
        $id = $_POST[ 'idDel' ];
        $this->db->where('idAtividade', $id);
        $this->db->delete('atividade');
        $this->viewListar();
    }
    private function verificaInputs($array){
        
        foreach ($array as $key) {
            if(empty($key)){ throw new Exception("Não pode haver campos vazios."); }
        }
        return true;
    }

}