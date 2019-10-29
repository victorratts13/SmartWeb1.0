<div id="registerInput">
    <form id="regPut" >
        <input type="text" placeholder="usuario" id="user" name="user">
        <input type="password" placeholder="senha" id="pass" name="pass">
        <input type="text" placeholder="@email" id="email" name="email">
        <input type="text" placeholder="nome" id="name" name="name">
        <input type="text" placeholder="sobrenome" id="sName" name="sName">
        <input type="text" placeholder="telefone" id="phone" name="phone">
        <input type="text" placeholder="pais" id="coutry" name="coutry">
        <input type="submit" value="register">
        <p> <a href="#" onclick="login()"> Login </a> </p>
    </form>
</div>

<script>
    $('#regPut').submit(function(){
        var fdata = $('#regPut').serialize();
        var send_ok = window.location.href = "<?php echo $host; ?>/private/app/index.php";
        $.ajax({
            type : 'POST',// metodo de envio
            url  : './lib/php/lib.php',//url para onde os dados serão enviados
            data : fdata, // dados capturados
            sucess: send_ok, // mensagen de sucesso
        });
        return false;
    });
</script>