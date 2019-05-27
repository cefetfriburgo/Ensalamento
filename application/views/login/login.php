<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="pt-br">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="static/css/login.css">
    </head>
    <body>
        <div class="container">
            <h2>Login</h2>
            <!-- <div class="erro">Dados inseridos Incorretos!</div> -->
            <form class="form" name="formulario" method="POST" action="index.php/controllogin/logar">
                <input type="email" name="email" placeholder="Email" required/>
                <input type="password" name="senha" required placeholder="Senha">
                <input type="submit" name="confirma" value="Confirmar"/>
                <input type="reset" name="cancelar" value="Cancelar"/>
            </form>
        </div>
       
    </body>
</html>