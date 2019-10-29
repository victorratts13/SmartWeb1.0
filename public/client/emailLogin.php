<div id="userIsset">
    <form id="formEmail">
        <input type="text" placeholder="emial" id="email" name="email">
        <input type="password" placeholder="senha" id="pass" name="pass">
        <input type="submit" value="login">
        <p> <a href="#" onclick="register()"> Register </a> | <a href="#" onclick="login()"> user login</a></p>
    </form>    
</div>

<script>
    $('#formEmail').submit(function(){
        var fdata = $('#formEmail').serialize();
        var send_ok = console.log(fdata+' - send ok') + app();
        $.ajax({
            type : 'POST',// metodo de envio
            url  : './lib/php/lib.php',//url para onde os dados serão enviados
            data : fdata, // dados capturados
            sucess: send_ok, // mensagen de sucesso
        });
        return false;
    });
</script>