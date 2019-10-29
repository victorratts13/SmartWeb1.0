<?php
session_start();
if(!isset($_SESSION['login']) == true){
    unset($_SESSION['login']);
    header('location: http://'.$_SERVER['HTTP_HOST']);
};

require('../../lib/php/lib.php');
//$mensagens = mensages();
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="../../lib/css/chatStyle.css">
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
            <h5 class="card-title">Mensagens</h5>
            <p class="card-text">
            <div>
            <?php mensage03($user_session); ?>
            </div>
            </p>
        </div>
    </div>
</div>