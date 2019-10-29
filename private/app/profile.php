<?php
session_start();
if(!isset($_SESSION['login']) == true){
    unset($_SESSION['login']);
    header('location: http://'.$_SERVER['HTTP_HOST']);
};

require('../../lib/php/lib.php');
if($user_session !== 'admin'){
    $userResult = myProfile($user_session);
}
if($user_session == 'admin'){
    $userResult = myProfileAdm($user_session);
}
?>

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
<div class="content">
    <form>
        <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <label class="control-label">Company</label>
                    <input placeholder="Company" disabled="" type="text" class="form-control" value="SmartChat">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">Username</label>
                    <input placeholder="Username" type="text" class="form-control" disabled="" value="<?php echo $userResult[user] ?>">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Email address</label>
                    <input placeholder="Email" type="email" class="form-control" value="<?php echo $userResult[email]; ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label">Nome</label>
                    <input placeholder="First name" type="text" class="form-control" value="<?php echo $userResult[nome]; ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label">Sobrenome</label>
                    <input placeholder="Last name" type="text" class="form-control" value="<?php echo $userResult[sobrenome]; ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Pais</label>
                    <input placeholder="Country" type="text" class="form-control" value="<?php echo $userResult[county]; ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="formControlsTextarea" class="control-label">Descrição</label>
                    <textarea rows="5" placeholder="Here can be your description" id="formControlsTextarea" class="form-control"></textarea>
                </div>
            </div>
        </div>
        <button type="submit" class="btn-fill pull-right btn btn-info">Update Profile</button>
        <div class="clearfix"></div>
    </form>
    <div class="footer">
        <div class="stats"><i></i> </div>
    </div>
</div>

</div>