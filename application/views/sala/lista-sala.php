<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html >
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive sidebar template with sliding effect and dropdown menu based on bootstrap 3">
    <title>SRS - CEFET</title>
    <!-- BOOTSTRAP -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="../../static/css/side-bar.css">
    <link rel="stylesheet" href="../../static/css/lista-sala.css">
 
</head>

<body>
<div class="page-wrapper chiller-theme toggled">
  <a id="show-sidebar" class="btn btn-sm btn-dark mt-5" href="#">
    <i class="fas fa-bars"></i>
  </a>
  <!-- MENU LATERAL -->
  <nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
      <div class="sidebar-brand">
        <a href="../controlHome/">Reserva de Salas</a>
        <div id="close-sidebar">
          <i class="fas fa-times"></i>
        </div>
      </div>
      <!-- SIDE-BAR HEADER -->
      <div class="sidebar-header">
        <div class="user-info">
            
        <span class="user-name">
            <?php echo "<strong>".$_SESSION[ 'nome' ]."</strong>"; ?>
          </span>
          <span class="user-role">
            <?php 
              if($_SESSION[ 'permissao' ] == 1){ echo "<strong>Administrador(a)</strong>"; }
              if($_SESSION[ 'permissao' ] == 2){ echo "<strong>Usuário(a)</strong>"; }
            ?>
        </span>
        <span class="user-status">
            <i class="fa fa-circle"></i>
            <span>Online</span>
          </span>
        </div>
      </div>
      <!-- FIM SIDE-BAR HEADER -->

      <!-- SIDE-BAR MENU -->
      <div class="sidebar-menu">
        <ul>
          <li class="header-menu">
            <span>General</span>
          </li>
          <li>
              <a href="../controlHome/">
                <i class="fas fa-home"></i>
                <span>Home</span>
              </a>
            </li>
          <li class="sidebar-dropdown">
            <a href="#">
                <i class="far fa-folder-open"></i>
              <span>Salas</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a  onclick="bread('Registrar Sala')" href="../controlSala/viewRegistrar">Registrar Salas</a>
                </li>
                <li>
                    <a onclick="bread('Listar Sala')"href="../controlSala/viewListar">Listar Salas</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="sidebar-dropdown">
            <a href="#">
                <i class="fas fa-tasks"></i>
              <span>Atividades</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a onclick="bread('Registrar Atv.')" href="../controlAtividade/viewRegistrar">Registrar Atividade

                  </a>
                </li>
                <li>
                  <a onclick="bread('Listar Atv.')" href="../controlAtividade/viewListar">Listar Atividades</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="sidebar-dropdown">
            <a href="#">
                <i class="far fa-user"></i>
              <span>Usuários</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a onclick="bread('Listar Usuário')" href="../controlUser/viewRegistrar">Registrar Usuário</a>
                </li>
                <li>
                  <a onclick="bread('Listar Usuário')" href="../controlUser/viewListar">Listar Usuários</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="header-menu">
            <span>Extra</span>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-book"></i>
              <span>Documentos</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="far fa-calendar-alt"></i>
              <span>Calendário</span>
            </a>
          </li>
        </ul>
      </div>
      <!-- FIM SIDE-BAR MENU -->
    </div>
    <!-- SIDE-BAR FOOTER  -->
    <div class="sidebar-footer">
      <a href="#">
        <i class="fa fa-bell"></i>
        <span class="badge badge-pill badge-warning notification">3</span>
      </a>
      <a href="#">
        <i class="fa fa-envelope"></i>
        <span class="badge badge-pill badge-success notification">7</span>
      </a>
      <a href="#">
        <i class="fa fa-cog"></i>
        <span class="badge-sonar"></span>
      </a>
      <a href="../controlLogin/logout">
        <i class="fa fa-power-off"></i>
      </a>
    </div>
    <!-- FIM SIDE-BAR FOOTER -->
  </nav>
  
  <!-- ---------------------------------------------------- PÁGINA CONTEÚDO ------------------------------------------------------- -->

   <!-- INÍCIO HEADER  -->
   <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="home.html">Sistema de reserva de salas</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </nav>
    </header>
    <!-- FIM HEADER -->

    <!-- PÁGINA CONTENT -->
  <main class="page-content">
    <div class="container-fluid">
        <nav aria-label="breadcrumb w-80">
            <ol class="breadcrumb" id="meu-breadcrumb">
              <li class="breadcrumb-item active" aria-current="page">Home</li>
            </ol>
          </nav>
      <div class="container">
          
         <!-- INÍCIO SEÇÃO DE LISTAGEM DE SALAS -->
         <h4>Lista de Salas</h4>
         <div class="bord"></div>

         <div class="input-group">
                 <div class="search">
                         <input type="text" name="search-sala" id="search-table" alt="table-striped" placeholder=" Buscar Salas">
                         <label for="search-sala" id="search-sala-label"><i class="fas fa-search"></i></label>
                 </div>
         </div>
         
         <table class="table  table-striped ">
                 <thead>
                     <tr>
                     <th scope="col" id="title-id">Id</th>
                     <th scope="col">Nome</th>
                     <th scope="col">Capacidade</th>
                     <th scope="col">Tipo</th>
                     <th scope="col">Local</th>
                     <th scope="col">Recursos</th>
                     <th scope="col">Opções</th>
                     </tr>
                 </thead>
                 <tbody>
                 <?php
                    foreach ($salas as $key) {
                        echo "<tr>";
                          echo "<td id='body-id'>".$key->idSala."</td>";
                          echo "<td>".$key->codigo."</td>";
                          echo "<td>".$key->capacidade."</td>";
                          echo "<td>".$key->tipo."</td>";
                          echo "<td>".$key->local."</td>";
                          echo '<td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalVerRecursos">Vizualizar</button></td>';
                          echo '<td><button type="button" id="btn-edit"class="btn btn-success" data-toggle="modal" data-target="#modalEdit">Editar</button>';
                          echo ' <button type="button" id="btn-delete"class="btn btn-danger" data-toggle="modal" data-target="#modalExcluir">Excluir</button></td>';
                        echo "</tr>";
                    }
                    
                 ?>
                 </tbody>
         </table>
         <!-- FIM SEÇÃO LISTAGEM DE SALAS -->
      </div>
    </div>
  </main>
  <!-- FIM PÁGINA CONTENT -->
  <!-- ---------------------------------------------------- FIM PÁGINA CONTEÚDO ------------------------------------------------------- -->

  <!-- MODAIS -->
  <!-- MODAL VER RECURSOS -->
  <div class="modal fade" id="modalVerRecursos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Recursos da Sala</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="list-group">
                    <li class="list-group-item">Projetor</li>
                    <li class="list-group-item">Acesso à Internet</li>
                    <li class="list-group-item">Quadro branco</li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <!-- <button type="button" id="submit-recurso" class="btn btn-primary">Inserir Recurso</button> -->
            </div>
            </div>
        </div>
    </div>
<!-- FIM MODAL VER RECURSOS -->

<!-- MODAL EDITAR -->
    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Sala</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="nome-sala">Nome</label>
                            <input type="text" class="form-control" id="nome-sala" name="nome-sala">
                        </div>
                        <div class="form-group">
                            <label for="capacidade">Capacidade</label>
                            <input type="number" class="form-control" id="capacidade" name="capacidade">
                        </div>
                        <div class="form-group">
                            <label for="local">Local</label>
                            <input type="text" class="form-control" id="local" name="local" placeholder="Campus I, Campus II...">
                        </div>
                        <div class="form-group">
                            <label for="tipo">Tipo</label>
                            <select class="form-control" id="tipo">
                                <option selected>Escolher...</option>
                                <option>Laboratório</option>
                                <option>Sala Normal</option>
                            </select>
                        </div>
                    </form>
                    <label for="#">Recursos</label><br>
                    <div class="form-group" id="recursos">
                        <div class="col" id="col1">
                            <div class="chiller_cb">
                                <input id="check-internet" name="check-internet" type="checkbox">
                                <label for="check-internet">Acesso à Internet</label>
                                <span></span>
                            </div>
                            <div class="chiller_cb">
                                <input id="check-quadro" type="checkbox">
                                <label for="check-quadro">Quadro Branco</label>
                                <span></span>
                            </div>
                            <div class="chiller_cb">
                                <input id="check-projetor" type="checkbox">
                                <label for="check-projetor">Projetor</label>
                                <span></span>
                            </div>
                            <div class="chiller_cb">
                                <input id="check-computador" type="checkbox">
                                <label for="check-computador">Computador</label>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="button" id="submit-recurso" class="btn btn-primary">Salvar Alteração</button>
                </div>
                </div>
            </div>
    </div>
<!-- FIM MODAL EDITAR -->

<!-- MODAL EXCLUI -->
<div class="modal fade" id="modalExcluir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmar Exclusão</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" id="submit-recurso" class="btn btn-primary">Confirmar</button>
            </div>
            </div>
        </div>
    </div>
</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="../../static/js/breadcrumb.js"></script>
    <script src="../../static/js/search.js"></script>
</body>
<style>
  #body-id, #title-id{
    display: none;
  }
</style>
</html>
<script>
    $(document).ready(function(){
      $("#meu-breadcrumb").append(localStorage.getItem('bread'));
      var url_atual = window.location.href;
    console.log(url_atual);
    })

   
    jQuery(function ($) {
        $(".sidebar-dropdown > a").click(function() {
            $(".sidebar-submenu").slideUp(200);
            if ($(this).parent().hasClass("active")) {
                $(".sidebar-dropdown").removeClass("active");
                $(this).parent().removeClass("active");
            }
            else {
                $(".sidebar-dropdown").removeClass("active");
                $(this).next(".sidebar-submenu").slideDown(200);
                $(this) .parent().addClass("active");
            }
        });

        $("#close-sidebar").click(function() {
            $(".page-wrapper").removeClass("toggled");
        });
        $("#show-sidebar").click(function() {
            $(".page-wrapper").addClass("toggled");
        });

});
</script>