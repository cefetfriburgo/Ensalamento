<?php
require_once './controlDAO.php';
require_once '../model/modeloLogin.php';

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $login = new ModeloLogin($email, $senha); 

    
    $controle = new ControlDAO();
    $resposta = $controle->conferir($login->getEmail(), $login->getSenha());
    
    if($resposta){
        session_start();
        $_SESSION['email'] = $email;
        //echo 'logou';
        header('location: ../view/home.html');
    }else{
        echo 'nao logou';
        // header('location: ../view/index.html');
    }   
?>