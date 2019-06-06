<?php 
  defined('BASEPATH') OR exit('No direct script access allowed'); 

?>
<!DOCTYPE html>
<html >
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive sidebar template with sliding effect and dropdown menu based on bootstrap 3">
    <title>SRS - CEFET</title>
    <!-- BOOSTRAP -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="../../../static/css/side-bar.css">
    <link rel="stylesheet" href="../../../static/css/lista-atv.css">
 

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
        <a href="../../controlHome/">Reserva de Salas</a>
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
              <a href="../../controlHome/">
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
                  <a  onclick="bread('Registrar Sala')" href="../../controlSala/viewRegistrar">Registrar Salas</a>
                </li>
                <li>
                    <a onclick="bread('Listar Sala')"href="../../controlSala/viewListar/">Listar Salas</a>
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
                  <a onclick="bread('Registrar Atv.')" href="../../controlAtividade/viewRegistrar">Registrar Atividade

                  </a>
                </li>
                <li>
                  <a onclick="bread('Listar Atv.')" href="../../controlAtividade/viewListar">Listar Atividades</a>
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
                  <a onclick="bread('Listar Usuário')" href="../../controlUser/viewRegistrar">Registrar Usuário</a>
                </li>
                <li>
                  <a onclick="bread('Listar Usuário')" href="../../controlUser/viewListar">Listar Usuários</a>
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
    <!-- SIDE-BAR FOOTER -->
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
      <a href="../../controlLogin/logout">
        <i class="fa fa-power-off"></i>
      </a>
    </div>
    <!-- FIM SIDE-BAR FOOTER -->
  </nav>

   <!-- --------------------------------------- PÁGINA CONTEÚDO------------------------------------------ -->
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
         <!-- INÍCIO SEÇÃO DE LISTAGEM  -->
         <h4>Lista de Atividades</h4>
         <div class="bord"></div>
         <div class="input-group">
                 <div class="search">
                         <input type="text" name="search-sala" id="search-table" alt="table-striped" placeholder=" Buscar Atividades">
                         <label for="search-sala" id="search-sala-label"><i class="fas fa-search"></i></label>
                 </div>
         </div>
         
         <table class="table table-striped ">
                 <thead>
                     <tr>
                     <th id="title-id">Id</th>
                     <th scope="col">Nome</th>
                     <th scope="col">Tipo</th>
                     <th scope="col">Curso Correlato</th>
                     <th scope="col">Informações</th>
                     <th scope="col">Opções</th>
                     </tr>
                 </thead>
                 <tbody>
                 <?php
                    foreach ($atvs as $key) {
                        echo "<tr>";
                          echo "<td id='body-id'>".$key->idAtividade."</td>";
                          echo "<td>".$key->atividade."</td>";
                          echo "<td>".$key->tipo."</td>";
                          echo "<td>".$key->curso."</td>";
                          echo '<td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalView">Visualizar</button></td>';
                          echo '<td><button type="button" id="btn-edit"class="btn btn-success" data-toggle="modal" data-target="#modalEdit">Editar</button>';
                          echo ' <button type="button" id="btn-delete"class="btn btn-danger" data-toggle="modal" data-target="#modalExcluir">Excluir</button></td>';
                        echo "</tr>";
                    }
                 ?>
                 </tbody>
         </table>
         <?php echo $paginacao;?>
         <!-- FIM SEÇÃO DE LISTAGEM -->
      </div>
    </div>
  </main>
  <!-- FIM PÁGINA CONTENT  -->
  <!-- ---------------------------------------------------- --FIM PÁGINA CONTEÚDO ------------------------------------------------------- -->

  <!-- MODAL VER INFORMAÇÕES DA ATIVIDADE -->
  <div class="modal fade" id="modalView" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Informações da Atividade</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table style="margin:0 auto;">
                    <tr>
                        <th scope="row" style="padding:10px;">Sala: </th>
                        <td style="padding:10px;">Sala 12</td>
                        
                    </tr>
                    <tr>
                        <th scope="row" style="padding:10px;">Local: </th>
                        <td style="padding:10px;">Campus II</td>
                    </tr>
                    <tr>
                        <th scope="row" style="padding:10px;">Utilizador: </th>
                        <td style="padding:10px;">Rodrigo R. Gomes</td>
                    </tr>
                    <tr>
                        <th scope="row" style="padding:10px;">Dia da semana: </th>
                        <td style="padding:10px;">Quarta-Feira</td>
                    </tr>
                    <tr>
                        <th scope="row" style="padding:10px;">Curso: </th>
                        <td style="padding:10px;">Sistemas de Informação</td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>            </div>
            </div>
        </div>
    </div>
<!-- FIM MODAL VER INFORMAÇÕES -->

<!-- MODAL EDITAR -->
    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editar Atividade</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <!-- <div class="erro">Dados inseridos Incorretos!</div> -->
            <form method="POST" action="../alterar">
                <input type="hidden" id="idAtv" name="idAtv">
                <div class="form-group">
                  <label for="nome-atv">Nome</label>
                  <input type="text" class="form-control" id="nome-atv" name="nome-atv">
                </div>
                <div class="form-group">
                <label for="email-user">Tipo</label>
                <select class="custom-select" name="tipo-atv">
                      <option selected value="0">Escolher...</option>
                      <?php
                        foreach($tipoAtv as $key){
                            echo "<option value='$key->idAtividadeTipo'>".$key->tipo."</option>";
                        }
                      ?>
                  </select>
              </div>
                <label for="email-user">Curso Associado</label>
                <div class="input-group mb-3">
                    
                    <select class="custom-select" name="curso">
                        <option selected value="0">Escolher...</option>
                        <option value="1">Engenharia Elétrica</option>
                        <option value="3">Licenciatura em Física</option>
                        <option value="2">Gestão do Turismo</option>
                        <option value="4">Sistemas de Informação</option>
                    </select>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                  <button type="submit" class="btn btn-primary">Salvar Registro</button>
                </div>
            </form>
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
            <form method="POST" action="../excluir">
              <input type="hidden" id="id_del" name="idDel">
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                  <input type="submit" class="btn btn-primary" value="Confirmar">
              </div>  
            </form>
            </div>
        </div>
    </div>
</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="../../../static/js/breadcrumb.js"></script>
    <script src="../../../static/js/search.js"></script>
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

      $("body").on('click', '#btn-edit', function(){
        var id_Usuario = $(this).parent().siblings(0).html();
        $("#idAtv").val(id_Usuario);
      })
      $("body").on('click', '#btn-delete', function(){
        var id_Usuario = $(this).parent().siblings(0).html();
        $("#id_del").val(id_Usuario);
      })
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