<?php

class ModeloLogin{
        private $email;
        private $senha;

        function __construct($email, $senha){
            $this->email = $email;
            $this->senha = md5($senha);
        }

        public function getEmail(){
            return $this->email;
        }

        public function getSenha(){
            return $this->senha;
        }       

}



?>