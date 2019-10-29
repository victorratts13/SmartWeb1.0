<?php
session_start();
require('../../lib/php/lib.php');
if($user_session == 'admin'){
    //ok
}else{
    header('location: http://'.$_SERVER['HTTP_HOST']);
};
?>
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.2.0/socket.io.slim.js"></script>
        <script src="../../lib/js/history.js"></script>
        <script src="../../lib/js/webmin.js"></script>
        <div id="navbarApp"></div>
        <div id="bodyClass" class="d-flex justify-content-center">
<div class="card " style="width: 50rem;">
  <div class="card-body">
    <h5 class="card-title">Cadastrar Contato</h5>
    <p class="card-text">
      <div>
    <div id="registerInput" class="input-group mb-3">
        <form id="regPut" >
            <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">@</span>
            <input class="form-control" type="text" placeholder="usuario" id="user" name="user">
            </div>
            <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><img src="http://icons.iconarchive.com/icons/icons8/windows-8/256/Security-Password-2-icon.png"  width="15px" /></span>
            <input class="form-control" type="password" placeholder="senha" id="pass" name="pass">
            </div>
            <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><img src="https://image.flaticon.com/icons/png/512/83/83922.png"  width="15px" /></span>
            <input class="form-control" type="text" placeholder="@email" id="email" name="email">
            </div>
            <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><img src="http://pluspng.com/img-png/user-png-icon-male-user-icon-512.png"  width="15px" /></span>
            <input class="form-control" type="text" placeholder="nome" id="name" name="name">
            </div>
            <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><img src="http://pluspng.com/img-png/user-png-icon-male-user-icon-512.png"  width="15px" /></span>
            <input class="form-control" type="text" placeholder="sobrenome" id="sName" name="sName">
            </div>
            <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><img src="https://image.flaticon.com/icons/png/512/54/54718.png"  width="15px" /></span>
            <input class="form-control" type="text" placeholder="telefone" id="phone" name="phone">
            </div>
            <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><img src="https://image.flaticon.com/icons/png/512/49/49875.png"  width="15px" /></span>
            <input class="form-control" type="text" placeholder="pais" id="coutry" name="coutry">
            </div><br />
            <input class="btn btn-outline-success my-2 my-sm-0" type="submit" value="register">
        </form>
        </div>
      </div>
    </p>
    <div class="alert alert-success" role="alert" id="alerta">
        Usuario Cadastrado com Sucesso
    </div>
  </div>
</div>
</div>

<script>
$(document).ready(function(){
    $('#alerta').hide();
    $('#regPut').submit(function(){
        var fdata = $('#regPut').serialize();
        var send_ok = $('#alerta').show();
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