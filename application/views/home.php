<?php 
  // session_start();
  defined('BASEPATH') OR exit('No direct script access allowed');
  
  if(!isset($_SESSION['logado'])){
    header("Location:../../");
    exit();
  }
?>

 
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
    <link rel="stylesheet" href="../../static/css/style.css">
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
        <a href="../home/">Reserva de Salas</a>
        <div id="close-sidebar">
          <i class="fas fa-times"></i>
        </div>
      </div>

      <!-- SIDE-BAR HEADER  -->
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
              <a href="../home/">
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
                  <a  onclick="bread('Registrar Sala')" href="../sala/registro">Registrar Salas</a>
                </li>
                <li>
                    <a onclick="bread('Listar Sala')"href="../sala/lista/">Listar Salas</a>
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
                  <a onclick="bread('Registrar Atv.')" href="../atividade/registro">Registrar Atividade

                  </a>
                </li>
                <li>
                  <a onclick="bread('Listar Atv.')" href="../atividade/lista/">Listar Atividades</a>
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
                  <a onclick="bread('Listar Usuário')" href="../usuario/registro">Registrar Usuário</a>
                </li>
                <li>
                  <a onclick="bread('Listar Usuário')" href="../usuario/lista/">Listar Usuários</a>
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
      <a href="../login/logout">
        <i class="fa fa-power-off"></i>
      </a>
    </div>
    <!-- FIM SIDE-BAR FOOTER -->
  </nav>
   <!-- --------------------------------------- PÁGINA CONTEÚDO------------------------------------------ -->
   <!-- INÍCIO HEADER  -->
   <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="../home/">Sistema de reserva de salas</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </nav>
    </header>
    <!-- FIM HEADER -->

    <!-- PÁGINA CONTENT -->
  <main class="page-content">
    <div class="container-fluid">
      <!-- BREADECRUMB -->
        <nav aria-label="breadcrumb w-80 breadcrumb-dark bg-dark">
            <ol class="breadcrumb" id="meu-breadcrumb">
              <li class="breadcrumb-item active" aria-current="page">Home</li>
            </ol>
          </nav>
        <!-- FIM BREADCRUMB -->
      <div class="container">
            <div class="filter d-inline-block mt-2">
                <div class="search">
                    <input type="text" name="search-sala" id="search-sala" placeholder=" Buscar Salas">
                    <label for="search-sala" id="search-sala-label"><i class="fas fa-search"></i></label>
                </div>
                <button type="button" class="btn btn-light mt-2" data-target="#modal-filtro" data-toggle="modal"><i class="fas fa-filter"></i>&nbsp;&nbsp;Filtros</button>
            </div>
            <div class="section">
                    <div id="carousel-salas" class="carousel slide" >
                            <div class="carousel-inner">
                              <div class="carousel-item active">
                                <div class="alert alert-dark menu-sala" role="alert">
                                    LABORATÓRIO INFO 5
                                </div>
                              </div>
                              <div class="carousel-item">
                                    <div class="alert alert-dark menu-sala" role="alert">
                                            LABORATÓRIO INFO 4
                                    </div>                  
                              </div>
                              <div class="carousel-item">
                                    <div class="alert alert-dark menu-sala" role="alert">
                                            LABORATÓRIO INFO 3
                                        </div>            
                              </div>
                            </div>
                            <a class="carousel-control-prev" href="#carousel-salas" role="button" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="sr-only">Anterior</span>
                            </a>
                            <a class="carousel-control-next" href="#carousel-salas" role="button" data-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="sr-only">Próximo</span>
                            </a>
                        </div>
                  <div class="section-calendar">
                        <table class="table table-light table-striped">
                                <thead>
                                  <tr>
                                    <th scope="col">Horário - Tempo </th>
                                    <th scope="col">Segunda-Feira<br><div class="date">26/03/19</div></th>
                                    <th scope="col">Terça-Feira<br><div class="date">27/03/19</div></th>
                                    <th scope="col">Quarta-Feira<br><div class="date">28/03/19</div></th>
                                    <th scope="col">Quinta-Feira<br><div class="date">29/03/19</div></th>
                                    <th scope="col">Sexta-Feira<br><div class="date">30/03/19</div></th>
                                    <th scope="col">Sábado<br><div class="date">31/03/19</div></th>
                                  </tr>
                                </thead>
                                <tbody >
                                  <tr>
                                    <th scope="row">7:30 - 8:20</th>
                                    <td>    
                                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalExemplo5">
                                        Reservar
                                      </button></td>
                                    <td>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalExemplo1">
                                            Ocupado
                                          </button> 
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalExemplo1">
                                      Ocupado
                                    </button>       
                                    </td>
                                  </tr>
                                  <tr>
                                    <th scope="row">8:20 - 9:10</th>
                                    <td>
                                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalExemplo5">
                                        Reservar
                                      </button> 
                                    </td>
                                    <td>
                                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalExemplo1">
                                          Ocupado
                                        </button> 
                                    </td>
                                    <td>    
                                    </td>
                                    <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalExemplo5">
                                      Reservar
                                    </button>
                                    </td>
                                    <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalExemplo5">
                                      Reservar
                                    </button>
                                    </td>
                                    <td>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalExemplo1">
                                      Ocupado
                                    </button>
                                    </td>
                                  </tr>
                                  <tr>
                                    <th scope="row">9:20 - 10:00</th>
                                    <td>    
                                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalExemplo5">
                                        Reservar
                                      </button></td>
                                    <td>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalExemplo1">
                                            Ocupado
                                          </button>
                                    </td>
                                    <td></td>
                                    <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalExemplo5">
                                      Reservar
                                    </button>
                                    </td>
                                    <td></td>
                                    <td>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalExemplo1">
                                              Ocupado
                                        </button>    
                                    </td>
                                  </tr>
                                  <tr>
                                    <th scope="row">10:00 - 10:50</th>
                                    <td></td>
                                    <td></td>
                                    <td>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalExemplo1">
                                                    Ocupado
                                                  </button>
                                            
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">10:50 - 11:40</th>
                                    <td></td>
                                    <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalExemplo5">
                                            Reservar
                                          </button>
                                          
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">11:40 - 12:30</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalExemplo5">
                                                    Reservar
                                            </button>
                                    </td>
                                    <td></td>
                                    <td></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">12:30 - 13:20</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">13:20 - 14:10</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">14:10 - 15:00</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">15:00 - 15:50</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">15:50 - 16:40</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">16:40 - 17:30</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">17:30 - 18:20</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">18:20 - 19:10</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">19:10 - 20:00</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">20:00 - 20:50</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">20:50 - 21:40</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">21:40 - 22:30</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </tbody>
                            </div>
                              </table>
                  </div>
            </div>
            <!-- FIM GRADE DE SALAS -->
      </div>
    </div>
  </main>
  <!-- FIM PÁGINA CONTENT -->
  <!-- ---------------------------------------------------- --FIM PÁGINA CONTEÚDO ------------------------------------------------------- -->
   <!-- MODAL  RESERVAR-->
   <div class="modal fade" id="modalExemplo5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Reserva de Sala</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
                  <form>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="hora-inicio">Hora Inicio</label>
                          <input type="time" class="form-control" id="hora-inicio">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="hora-fim">Hora Fim</label>
                          <input type="time" class="form-control" id="hora-fim">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="input-group">Atividade</label>
                          <div class="input-group" id="input-group">
                            <input type="text" id="tipo-atv" aria-label="First name" class="form-control" placeholder="Tipo">
                            <input type="text" id="nome-atv" aria-label="Last name" class="form-control" placeholder="Nome">
                          </div>
                      </div>
                      <div class="form-group">
                        <label for="inputAddress2">Utilizador</label>
                        <input type="text" class="form-control" id="inputAddress2">
                      </div>
                    </form>
                      
                      <button type="button" class="btn btn-primary mt-2" id="personalizar" data-toggle="modal" data-target="#modalExemplo2">Repetir</button>
                    </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary">Reservar</button>
                  </div>
          </div>
        </div>
      </div>
    </div>
    <!-- FIM MODAL RESERVAR -->

    <!-- MODAL OCUPADO-->
    <div class="modal fade" id="modalExemplo1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Reserva de Sala</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body m-auto">
              <table>
                  <tr>
                      <th scope="row">Motivo:</th>
                      <td style="padding:10px;">Monitoria de Prog. Estruturada</td>
                      
                  </tr>
                  <tr>
                    <th scope="row">Professor(a):</th>
                    <td style="padding:10px;"> Rodrigo Reis G</td>
                  </tr>
              </table>
            </div>
            
            <div class="modal-footer" style="background:#fff;">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
          </div>
        </div>
    </div>
    <!-- FIM MODAL OCUPADO -->

    <!-- MODAL OCORRÊNCIA PERSONALIZADA-->
    <div class="modal fade" id="modalExemplo2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-right:19px;">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Reserva de Sala</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" >
                    <label for="dias">Repetir a cada: </label><input type="number" id="dias" placeholder="1">
                      <select id="pers-ocorrencias">
                        <option selected>dias</option>
                        <option>semanas</option>
                        <option>meses</option>
                      </select>
                      <br><br>
                      <label for="radio-termino">Termina em</label>
                      <div class="custom-control custom-radio">
                        <input type="radio" id="radio-nunca" name="customRadio" class="custom-control-input">
                        <label class="custom-control-label" for="radio-nunca">Nunca</label>
                      </div>
                      <br>
                      <div class="custom-control custom-radio">
                        <input type="radio" id="radio-em" name="customRadio" class="custom-control-input">
                        <label class="custom-control-label" for="radio-em">Em</label>
                      </div>
                      <br>
                      <div class="custom-control custom-radio">
                        <input type="radio" id="radio-apos" name="customRadio" class="custom-control-input">
                        <label class="custom-control-label" for="radio-apos">Após</label><input type="number" id="dias-term" placeholder="1"><div id="ocor" style="display: inline">ocorrencias</div>
                      </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <button type="button" class="btn btn-primary">Salvar</button>
          </div>
        </div>
      </div>
    </div>
    <!-- FIM MODAL OCORRÊNCIA PERSONALIZADA -->
    <!-- MODAL FILTROS-->
    <div class="modal fade" id="modal-filtro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Reserva de Sala</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

              <label for="filtro-prof"><b>Filtrar por Professor</b></label>
              <select class="custom-select w-40" id="filtro-prof">
                  <option selected>Escolher...</option>
                  <option value="1">Bruno Silva</option>
                  <option value="2">Thiago Souza</option>
                  <option value="3">Eliezér Silva</option>
                  <option value="1">Bruno Silva</option>
                  <option value="2">Thiago Souza</option>
                  <option value="3">Eliezér Silva</option>
                  <option value="1">Bruno Silva</option>
                  <option value="2">Thiago Souza</option>
                  <option value="3">Eliezér Silva</option>
                  <option value="1">Bruno Silva</option>
                  <option value="2">Thiago Souza</option>
                  <option value="3">Eliezér Silva</option>
              </select>

              <label class="mt-3" for="filtro-curso"><b>Filtrar por Curso</b></label>
              <select class="custom-select" id="filtro-prof">
                <option selected>Escolher...</option>
                <option value="1">Engenharia Elétrica</option>
                <option value="2">Física</option>
                <option value="3">Gestão de Turismo</option>
                <option value="4">Sistemas de Informações</option>
            </select>

            <label class="mt-3" for="filtro-curso"><b>Filtrar por Sala</b></label>
            <select class="custom-select" id="sala-home">
                <option selected>Escolher...</option>
                <option value="1">Laboratório 1</option>
                <option value="2">Laboratório 2</option>
                <option value="3">Sala CIEP 15</option>
                <option selected>Escolher...</option>
                <option value="1">Laboratório 1</option>
                <option value="2">Laboratório 2</option>
                <option value="3">Sala CIEP 15</option>
                <option selected>Escolher...</option>
                <option value="1">Laboratório 1</option>
                <option value="2">Laboratório 2</option>
                <option value="3">Sala CIEP 15</option>
                <option selected>Escolher...</option>
                <option value="1">Laboratório 1</option>
                <option value="2">Laboratório 2</option>
                <option value="3">Sala CIEP 15</option>
            </select>
            </div>
          <div class="modal-footer" style="background:#fff;">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <button type="button" class="btn btn-primary">Aplicar</button>
          </div>
        </div>
      </div>
  </div>
  <!-- FIM MODAL FILTROS -->
</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
        <script src="../../static/js/breadcrumb.js"></script>
    
</body>

</html>
<script>
  //Controle do Carousel
    $(document).ready(function(){
        $('.carousel').carousel({
            pause: true,
            interval: false
        });
    })

    //Controles no side bar
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