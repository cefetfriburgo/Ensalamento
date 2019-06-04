<?php   
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model{

    private $email;
    private $senha;
    
    public function login(LoginModel $login){
        
        $this->db->select('email, senha');
        $result = $this->db->get("usuario")->result();
        $cont = 0;
        foreach ($result as $key) {
            if($key->email == $login->getEmail() && $key->senha == sha1( $login->getSenha() )){
                echo "<script> alert('Login Efetuado!'); </script>";
                session_start();
                
                $this->db->select("nome, idPermissao");
                $this->db->where("email", $key->email);
                $res = $this->db->get("usuario")->result();

                $_SESSION[ 'logado' ] = true;
                $_SESSION[ 'nome' ] = $res[0]->nome;
                $_SESSION[ 'permissao' ] = $res[0]->idPermissao;
                $cont++;
            }
        }
    }
    
    //Getter's e Setter's
    public function setEmail($email){
        $this->db->select('email');
        $result = $this->db->get("usuario")->result();
        $cont = 0;
        foreach ($result as $key) {
            if($key->email == $email){ 
                ++$cont;
                $this->email = $email;
            }
        }
        if($cont == 0){
            throw new Exception("Email não cadastrado.");
        }
    }
    public function setSenha($senha){
        $this->db->select('senha');
        $result = $this->db->get("usuario")->result();
        $cont = 0;
        foreach ($result as $key) {
            if($key->senha == sha1($senha)){ 
                ++$cont;
                $this->senha = $senha;
            }
        }
        if($cont == 0){
            throw new Exception("Senha inválida.");
        }
    }
    public function getEmail()      { return $this->email; }
    public function getSenha()      { return $this->senha; }

   
}


