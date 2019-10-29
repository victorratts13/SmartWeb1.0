<?php
session_start();
require('../../lib/php/lib.php');
//echo $user_session;

$sessao = sessionExist($user_session);

if($sessao == 1){
  if($user_session == 'admin'){
  echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="background-image: linear-gradient(-225deg, #7742B2 0%, #F180FF 52%, #FD8BD9 100%);">
        <a class="navbar-brand" href="#">SmartChat</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="'.$host.'/private/app/index.php">Chat <span class="sr-only">(página atual)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="'.$host.'/private/app/contacts.php" >Contatos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="'.$host.'/private/app/groups.php" >Grupos</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Opções
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="'.$host.'/private/app/profile.php" >Profile</a>
                <a class="dropdown-item" href="'.$host.'/private/app/mensage.php">Mensagens</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="'.$host.'/lib/php/lib.php?logout=logout">Sair</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="'.$host.'/private/app/cadContact.php" >Cadastrar Usuario</a>
            </li>
          </ul>
            Bem-Vindo <a class="nav-link" href="#">'.$user_session.'</a>
          <form class="form-inline my-2 my-lg-0" id="pesquisa" action="search.php" method="post">
            <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar contato" aria-label="Pesquisar" id="input_pesquisa" name="buscar">
            <button class="btn btn-dark" style="background-image: linear-gradient(-225deg, #3D4E81 0%, #5753C9 48%, #6E7FF3 100%);" type="submit">Pesquisar</button>
          </form>
        </div>
      </nav>';
  }else{
    echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="background-image: linear-gradient(-225deg, #7742B2 0%, #F180FF 52%, #FD8BD9 100%);">
        <a class="navbar-brand" href="#">SmartChat</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="'.$host.'/private/app/index.php">Chat <span class="sr-only">(página atual)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="'.$host.'/private/app/groups.php" >Grupos</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Opções
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="'.$host.'/private/app/profile.php" >Profile</a>
                <a class="dropdown-item" href="'.$host.'/private/app/mensage.php">Mensagens</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="'.$host.'/lib/php/lib.php?logout=logout">Sair</a>
              </div>
            </li>
            
          </ul>
            Bem-Vindo <a class="nav-link" href="#">'.$user_session.'</a>
          <form class="form-inline my-2 my-lg-0" id="pesquisa" action="search.php" method="post">
            <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar contato" aria-label="Pesquisar" id="input_pesquisa" name="buscar">
            <button class="btn btn-dark" style="background-image: linear-gradient(-225deg, #3D4E81 0%, #5753C9 48%, #6E7FF3 100%);" type="submit">Pesquisar</button>
          </form>
        </div>
      </nav>';
  }
}
if($sessao == 0){
  echo '<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">SmartChat</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>

</nav>';
}

?>
