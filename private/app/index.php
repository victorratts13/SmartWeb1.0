<?php
session_start();
if(!isset($_SESSION['login']) == true){
    unset($_SESSION['login']);
    header('location: http://'.$_SERVER['HTTP_HOST']);
};
require('../../lib/php/lib.php');
?>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <head>
        <title> SmartChat - Aplication Messenger </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="../../lib/css/chatStyle.css">
        <link rel="stylesheet" href="../../lib/css/chat.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="../../lib/js/jquery.js"></script>
    </head>
    <body style="">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="background-image: linear-gradient(-225deg, #7742B2 0%, #F180FF 52%, #FD8BD9 100%);">
        <a class="navbar-brand" href="#">SmartChat</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
            <span class="navbar-toggler-icon"></span>
        </button>

            <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo $host.'/private/app/index.php'; ?>">Chat <span class="sr-only">(página atual)</span></a>
                </li>
                <?php if($user_session == 'admin'){
                    echo '<li class="nav-item">
                            <a class="nav-link" href="'.$host.'/private/app/contacts.php" >Contatos</a>
                        </li>';
                    }
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $host.'/private/app/groups.php'; ?>" >Grupos</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Opções
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?php echo $host.'/private/app/profile.php'; ?>" >Profile</a>
                    <a class="dropdown-item" href="<?php echo $host.'/private/app/mensage.php'; ?>">Mensagens</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo $host.'/lib/php/lib.php?logout=logout'; ?>">Sair</a>
                    </div>
                </li><?php 
                if($user_session == 'admin'){
                    echo '<li class="nav-item">
                            <a class="nav-link" href="'.$host.'/private/app/cadContact.php" >Cadastrar Usuario</a>
                        </li>';
                    }
                ?>
                </ul>
                <font color="white">Bem-Vindo</font> <a class="nav-link" href="<?php echo $host.'/private/app/profile.php'; ?>"><?php echo $user_session; ?></a>
                <form class="form-inline my-2 my-lg-0" id="pesquisa" action="search.php" method="post">
                <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar contato" aria-label="Pesquisar" id="input_pesquisa" name="buscar">
                <button class="btn btn-dark" style="background-image: linear-gradient(-225deg, #3D4E81 0%, #5753C9 48%, #6E7FF3 100%);" type="submit">Pesquisar</button>
                </form>
            </div>
        </nav>
        <div id="bodyClass" class="d-flex justify-content-center ">
            <div class="card overflow-auto endScroll" style="width: 50rem; height: 80%;" id="card">
                <div class="card-body  ">
                    <h5 class="card-title">Smart Messenger</h5>
                    <p class="card-text ">
                    <div><?php echo 'de <b>'.$user_session.'</b> Para: <b>'.$selectContact.'</b>'; ?></div>
                        <div class="">
                            <div id="show" class="msg">
                                <?php echo showMensages($selectContact); ?>
                            </div>
                        </div>
                    </p>
                    <form class="form-inline my-2 my-lg-0 input-group mb-3 inputPaddin" id="sms" method="POST" action="../../lib/php/lib.php">
                        <input type="text" class="form-control mr-sm-2 " placeholder="mensagem..." id="sms_input" name="mensagem">
                        <input type="hidden" value="<?php echo $selectContact; ?>" name="selectContactPost">
                        <input type="submit" class="btn btn-outline-success my-2 my-sm-0" value="enviar" >
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>

<script>
$(document).ready(function(){
    setInterval(function(){
        $('#show').load(location.href=" #show>*", "");
    }, 1000);

    $('#sms').submit(function(){
        var fdata = $('#sms').serialize();
        var send_ok = $('#sms_input').val('');
            $.ajax({
                type : 'POST',// metodo de envio
                url  : '../../lib/php/lib.php',//url para onde os dados serão enviados
                data : fdata, // dados capturados
                sucess: send_ok, // mensagen de sucesso
            });
        return false;
    });
});
</script>