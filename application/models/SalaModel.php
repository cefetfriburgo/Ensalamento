<?php   
defined('BASEPATH') OR exit('No direct script access allowed');

class SalaModel extends CI_Model{

    private $nome;
    private $capacidade;
    private $tipo;
    private $local;
    
    public function inserir(SalaModel $sala){
        $dados = array(
            'codigo'     => $sala->getNome(),
            'capacidade' => $sala->getCapacidade(),
            'idLocal'    => $sala->getLocal(),
            'idSalaTipo' => $sala->getTipo()
        );

        $this->db->insert('sala', $dados);
        echo '<script>alert(" Sala Adicionada! ");</script>';

        session_start();
        $this->load->view('sala/registro-sala');
    }


    public function listar($max, $start){
        $query = $this->db->query("SELECT s.idSala, s.codigo, s.capacidade, t.tipo, l.local from sala s join salatipo t on(t.idSalaTipo = s.idSalaTipo) join local l on (l.idLocal = s.idLocal) limit $max, $start;");

        return $query->result();
    }
    function contaRegistros(){
        return $this->db->count_all_results('sala');
    }


    //Getter's e Setter's
    public function setNome($nome){
        if(mb_strlen($nome) < 2){
            throw new Exception("O nome precia ter no mínimo 2 caracateres.");
        }
        $this->nome = $nome;
    }
    public function setCapacidade($capacidade){
        if($capacidade < 2 || $capacidade > 100){
            throw new Exception("Capacidade inválida. Válido entre 2 e 100.");
        }
        $this->capacidade = $capacidade; 
    }

    public function setLocal($local){ $this->local = $local; }
    public function setTipo($tipo)  { $this->tipo = $tipo; }
    
    public function getNome()      { return $this->nome; }
    public function getCapacidade(){ return $this->capacidade; }
    public function getLocal()     { return $this->local; }
    public function getTipo()      { return $this->tipo; }

   
}