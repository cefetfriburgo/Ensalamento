<?php   
defined('BASEPATH') OR exit('No direct script access allowed');

class UsuarioModel extends CI_Model{

    private $nome;
    private $email;
    private $senha;
    private $funcao;
    private $permissao;
    
    public function inserir(UsuarioModel $user){
       
        $dados = array(
            'nome'        => $user->getNome(),
            'email'       => $user->getEmail(),
            'senha'       => $user->getSenha(),
            'idPermissao' => $user->getPermissao(),
            'idFuncao'    => $user->getFuncao()
        );
        $this->db->insert('usuario', $dados);
        echo '<script>alert(" Usuário Inserido! ");</script>';
        session_start();
        $this->load->view('usuario/registro-user');
    }


    public function listar($max, $start){
        $query = $this->db->query("select u.idUsuario, u.nome, u.email, p.permissao, f.funcao from usuario u 
        join permissao p on(p.idPermissao = u.idPermissao) join funcao f on(f.idFuncao = u.idFuncao) limit $max, $start;");

        return $query->result();
    }
    function contaRegistros(){
        return $this->db->count_all_results('usuario');
    }
    //Getter's e Setter's
    public function setNome($nome){ 
        if(mb_strlen($nome) < 10){
            throw new Exception("O nome precia ter no mínimo 10 caracateres.");
        }
        $this->nome = $nome; 
    }
    public function setEmail($email){
        $this->db->select("email");
        $emails = $this->db->get("usuario")->result(); 
        foreach ($emails as $key) {
            if($key->email == $email){
                throw new Exception("Email já cadastrado.");
            }
        }
        $this->email = $email; 
    }
    public function setSenha($senha){
        if(mb_strlen($senha) < 8){
            throw new Exception("A senha precia ter no mínimo 8 caracateres.");
        }
        $this->senha = sha1($senha); 
    }

    public function setPermissao($permissao) { $this->permissao = $permissao; }
    public function setFuncao($funcao)       { $this->funcao = $funcao; }
    
    public function getNome()      { return $this->nome; }
    public function getEmail()     { return $this->email; }
    public function getPermissao() { return $this->permissao; }
    public function getFuncao()    { return $this->funcao; }
    public function getSenha()     { return $this->senha; }

}