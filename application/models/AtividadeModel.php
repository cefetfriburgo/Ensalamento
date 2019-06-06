<?php   
defined('BASEPATH') OR exit('No direct script access allowed');

class AtividadeModel extends CI_Model{

    private $nome;
    private $tipo;
    private $curso;
    
    public function inserir(AtividadeModel $atividade){
        
        $dados = array(
            'atividade'  => $atividade->getNome(),
            'idAtividadeTipo'  => $atividade->getTipo()
        );
        $this->db->insert('atividade', $dados);
        
        //pegando o maxId da tabela atividade.
        $sql_id = "select max(idAtividade) as 'maxId' from atividade";
        $idMax = $this->db->query($sql_id)->result();
        $idAtv =  $idMax[0]->maxId;

        $sql = "insert INTO atividadeCurso (idAtividade, idCurso) VALUES (".$idAtv.", ".$atividade->getCurso().")";
        $this->db->query($sql);
        
        echo '<script>alert(" Atividade Inserida! ");</script>';
    }

    public function listar($max, $start){
        $query = $this->db->query("
        select a.idAtividade, a.atividade, atvT.tipo, c.curso 
        from atividade a join atividadetipo atvT on(a.idAtividadeTipo = atvT.idAtividadeTipo) 
        join atividadecurso atvC on(atvC.idAtividade = a.idAtividade) 
        join curso c on(atvC.idCurso = c.idCurso) limit $max, $start;");

        return $query->result();
    }
    function contaRegistros(){
        return $this->db->count_all_results('sala');
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
        header('Location: viewListar');
    }

    //Getter's e Setter's
    public function setNome($nome){
        if(mb_strlen($nome) < 5){
            throw new Exception("O nome precisa ter no mínimo 5 caracateres.");
        }
        $this->nome = $nome;
    }
    public function setTipo($tipo)   { $this->tipo = $tipo; }
    public function setCurso($curso) { $this->curso = $curso; }
    public function getNome()        { return $this->nome; }
    public function getCurso()       { return $this->curso; }
    public function getTipo()        { return $this->tipo; }

   
}