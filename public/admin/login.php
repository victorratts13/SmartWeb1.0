<div id="userIsset">
    <form id="formType">
        <input type="text" placeholder="usuario" id="userAdm" name="adminUser">
        <input type="password" placeholder="senha" id="passAdm" name="adminPass">
        <input type="submit" value="login">
        <p> <a href="#" onclick="login()"> User Login </a> </p>
    </form>    
</div>

<script>
    $('#formType').submit(function(){
        var fdata = $('#formType').serialize();
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