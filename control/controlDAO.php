<?php
    include_once '../model/modeloLogin.php';
    include_once './conexaoDao.php';
    include_once './controlLogin.php';
  

    class ControlDAO{
        private $email;
        private $senha;

        function conferir($email, $senha){
            $this->email = $email;
            $this->senha = $senha;

            try{
                $pdo = Conexao::connect();
                $ps = $pdo->prepare('select senha from usuario where email = :email');
                $ps->execute(array(':email' => $this->email));
                $usuario = $ps->fetchAll();

                foreach($usuario as $valor => $user){
                    if($user[$valor] == $this->senha){
                        return true;
                    }
                }
                

            }catch(PDOException $e){
                echo 'Error' . $e->getmessage();
            }
        }
    }

   

    
?>