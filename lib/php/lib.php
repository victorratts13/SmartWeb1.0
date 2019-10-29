<?php
session_start();
/*
    Biblioteca de funções smartChat V2.1
    author: Ratts, Victor
    ano: 2019
    Versão: 2.1.3.5
    lisença: MIT
    admin: admin13

*/

$conn = mysqli_connect('127.0.0.1', 'root', 'root', 'SmartDatabase');
date_default_timezone_set('UTC-3');

//======= variaveis de requisição ==============

// registro & login
$user = $_POST[user];
$email = $_POST[email];
$pass = $_POST[pass];
$phone = $_POST[phone];
$name = $_POST[name];
$sName = $_POST[sName];
$coutry = $_POST[coutry];

// administrator
$search = $_POST['buscar'];
$mensagem = $_POST['mensagem'];
$host = 'http://'.$_SERVER['HTTP_HOST'];

$adminName = $_POST[adminName];
$adminUser = $_POST[adminUser];
$adminPass = $_POST[adminPass];
$adminEmail = $_POST[adminEmail];
$adminContact = $_POST[adminContact];
$adminPrivil = $_POST[adminPrivil];

// geral
$addSelectContact = $_GET[addSelectContact];
$selectContact = $_GET[selectContact];
$selectContactPost = $_POST[selectContactPost];
$data = date('D-m-y H:i:s');
$user_session = $_SESSION['login'];
$grupName = $_POST[groupName];
$usersGroup = $_POST[usersGroup];
$logout = $_GET[logout];

//================== Funções =======================

function register($usuario, $senha, $emailUser, $telefone, $nome, $sobrenome, $pais){
    global $conn, $host;
    $pass = md5($senha);
    $user = '@'.str_replace(' ', '_', $usuario);
    $sql = "INSERT INTO user (user, pass, email, name, sName, phone, coutry, onl, groups, privilegy) VALUES ('$user', '$pass', '$emailUser', '$nome', '$sobrenome', '$telefone', '$pais', '1', '//', '2')";
    mysqli_query($conn, $sql);
    //$_SESSION['login'] = $usuario;
    //header('location:'.$host);
    //echo $sql;
}

function login($usuario, $usuarioEmail, $senha){
    global $conn, $host;
    $pass = md5($senha);
    if($usuario == true){
        $sql = "SELECT * FROM user WHERE user = '$usuario' AND pass = '$pass'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        if($usuario == $row[user]){
            $_SESSION['login'] = $row['user'];
            echo 'login user ok'.$row[user];
        }else{
            unset ($_SESSION['login']);
            unset ($_SESSION['senha']);
            header('location:'.$host);
            //echo $usuario.'<br>'.$pass;
        }
    }
    if($usuarioEmail == true){
        $sql = "SELECT * FROM user WHERE email = '$usuarioEmail' AND pass = '$pass'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        if($usuarioEmail == $row[email]){
            $_SESSION['login'] = $row['user'];
            //echo 'login email ok'.$row[email];
        }else{
            unset ($_SESSION['login']);
            unset ($_SESSION['senha']);
            header('location:'.$host);
            //echo $emailUser.'<br>'.$pass;
        }
    }
    
}

function admLogin($usuario, $senha){
    global $conn, $host;
    $pass = md5($senha);
    if($usuario == true){
        $sql = "SELECT * FROM admin WHERE user = '$usuario' AND pass = '$pass'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        if($usuario == $row[user]){
            $_SESSION['login'] = $row['user'];
            echo 'login user ok'.$row[user];
        }else{
            unset ($_SESSION['login']);
            unset ($_SESSION['senha']);
            header('location:'.$host);
            //echo $usuario.'<br>'.$pass;
        }
    }
}

function privateMansage($sms, $from, $to, $data){
    global $conn;
    $sql = "INSERT INTO privateMensages (fromUser, toUser, mensage, dataTime) VALUES ('$from', '$to', '$sms', '$data')";
    mysqli_query($conn, $sql);

    echo $sql;
}

function groupMensage($group, $usuario, $mensagem, $data){
    global $conn;
    $id = hash('sha256', $mensagem);
    $sql = "INSERT INTO $group (user, mensage, dataTime, mensageId) VALUES ('$usuario', '$mensagem', '$data', '$id')";
    mysqli_query($conn, $sql);

    //echo $sql;
}

function createGroup($grupNome, $users){
    global $conn;
    $sql = "CREATE TABLE gp_$grupNome (user VARCHAR(2000), mensage VARCHAR(2000), dateTime VARCHAR(2000), mensageId VARCHAR(2000))";
    mysqli_query($conn, $sql);

//    $sqlAddUser = "INSERT INTO gp_$grupNome (user) VALUES ('$users')";
//    mysqli_query($conn, $sqlAddUser);
//    echo $sql;
}

function addContact($usuario, $contato){
    global $conn;
    $sqlQuery = "SELECT * FROM admin WHERE user = '$usuario'";
    $result = mysqli_query($conn, $sqlQuery);
    $row = mysqli_fetch_assoc($result);
    $contatos = $row[contacts];
    $addContactUser = $contatos.'/'.$contato.'/';
    $sql = "UPDATE admin SET contacts = '$addContactUser' WHERE user = '$usuario'";
    mysqli_query($conn, $sql);

    //echo $sql.'<br />'.$sqlQuery.'<br />'.$row[contacts];
}

function searchContact($busca){
    global $conn;
    $sql = "SELECT * FROM user WHERE user = '$busca'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if($busca == $row[user]){
        $busca = '<a href="contact.php?contactProfile='.$row[user].'">'.$row[user].'</a> '.$row[name].' - '.$row[phone].' <a href="'.$host.'/lib/php/lib.php?addSelectContact='.$row[user].'">Add Contato</a><br />';
    }else{
        $busca = '<br />Nem Um Resultado Encontrado :/';
    }

    echo $busca;
}

function contacts($session){
    global $conn;
    $sql = "SELECT contacts FROM admin WHERE user = '$session'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $contacts = $row[contacts];
    $regrex = '/\/(.*?)\//';
    preg_match_all($regrex, $contacts, $result);
    foreach($result[1] as $texto){
        echo '<a href="?selectContact='.$texto.'">'.$texto.'</a> ';
    }
}

function mySelectContactProfile($contactUser){
    global $conn;
    $sql = "SELECT * FROM user WHERE user = '$contactUser'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $user_u = $row['user'];
    $user_e = $row['email'];
    $user_n = $row['name'];
    $user_s = $row['sName'];
    $user_p = $row['phone'];
    $user_c = $row['coutry'];
    $resultArray = [
        'user' => $user_u,
        'email' => $user_e,
        'nome' => $user_n,
        'sobrenome' => $user_s,
        'phone' => $user_p,
        'pais' => $user_c
    ];
    
    return $resultArray;
}

function myProfile($session){
    global $conn;
    $sql = "SELECT * FROM user WHERE user = '$session'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $userName = $row[name];
    $userSbname = $row[sName];
    $userEmail = $row[email];
    $userPhone = $row[phone];
    $userCoutry = $row[coutry];
    $user = $row[user];
    $returnArray = [
        'nome' => $userName,
        'sobrenome' => $userSbname,
        'email' => $userEmail,
        'phone' => $userPhone,
        'county' => $userCoutry,
        'user' => $user
    ];

    return $returnArray;
}

function myProfileAdm($session){
    global $conn;
    $sql = "SELECT * FROM admin WHERE user = '$session'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $userName = $row[name];
    $userEmail = $row[email];
    $user = $row[user];
    $returnArray = [
        'nome' => $userName,
        'email' => $userEmail,
        'user' => $user
    ];

    return $returnArray;
}

function contactProfile($session){
    global $host, $conn;
    $user = '@'.str_replace(' ', '_', $nome);
    $sql = "SELECT contacts FROM admin WHERE user = '$session'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $contacts = $row[contacts];
    $regrex = '/\/(.*?)\//';
    preg_match_all($regrex, $contacts, $result);
    foreach($result[1] as $texto){
        echo '<a href="index.php?selectContact='.$texto.'">'.$texto.'</a><br />' ;
    }
}

function showMensages($selectProf){
    global $conn;
    $userSession = $_SESSION['login'];

    $sqlChat = "SELECT * FROM privateMensages";
    $result = mysqli_query($conn, $sqlChat);
    $row = mysqli_fetch_assoc($result);
    $actualSession = $row[fromUser];
    $toUser = $row[toUser];

    do{
        if($row[fromUser] == $userSession){
            if($row[toUser] == $selectProf){
                //echo '<font color="green">'.$row[mensage].'</font><br />';
                echo '<br /><p><div class="sendToUser">
                        <div>'.$row[mensage].'</div>
                        <div class="dateTime">'.$row[dataTime].'</div>
                    </div></p> <br />'; 
            }
        }
        if($row[fromUser] == $selectProf){
            if($row[toUser] == $userSession){
                //echo '<font color="red">'.$row[mensage].'</font><br />';
                echo '<br /> <p><div class="sendFromUser">
                        <div>'.$row[mensage].'</div>
                        <div class="dateTime">'.$row[dataTime].'</div>
                    </div> </p><br />'; 
                
            }
        }

    }while($row = mysqli_fetch_assoc($result));
}

function showGroupMensages(){

}

function mensages(){
    global $conn, $user_session;
    $sql = "SELECT * FROM privateMensages ORDER BY id DESC LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

     if($row[fromUser] == $user_session){
        //echo '<a href="index.php?selectContact='.$row[fromUser].'">'.$row[mensage].'</a>';
        echo '<div class="chat_list active_chat">
                <a href="index.php?selectContact='.$row[toUser].'">
                <div class="chat_people">
                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                <div class="chat_ib">
                    <h5>'.$row[toUser].'<span class="chat_date"><font size="2">'.$row[dataTime].'</font></span></h5>
                    <p>'.$row[mensage].'</p><br />
                </div>
                </div>
                </a>
            </div>';
     }
     if($row[toUser] == $user_session){
       // echo '<a href="index.php?selectContact='.$row[toUser].'">'.$row[mensage].'</a>';
        echo '<div class="chat_list active_chat">
                <a href="index.php?selectContact='.$row[fromUser].'">
                <div class="chat_people">
                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                <div class="chat_ib">
                    <h5>'.$row[fromUser].'<span class="chat_date"><font size="2">'.$row[dataTime].'</font></span></h5>
                    <p>'.$row[mensage].'</p><br />
                </div>
                </div>
                </a>
            </div>';
     }
}

function mensage02(){
    global $conn, $user_session;
    $sqlFrom = "SELECT * FROM privateMensages WHERE fromUser = '$user_session' ORDER BY id DESC LIMIT 100";
    $resultFrom = mysqli_query($conn, $sqlFrom);
    $rowFrom = mysqli_fetch_assoc($resultFrom);

    $sqlTo = "SELECT * FROM privateMensages WHERE toUser = '$user_session' ORDER BY id DESC LIMIT 100";
    $resultTo = mysqli_query($conn, $sqlTo);
    $rowTo = mysqli_fetch_assoc($resultTo);

    if($rowTo[toUser] == $user_session){
        echo '<div class="chat_list active_chat">
                <a href="index.php?selectContact='.$rowTo[toUser].'">
                <div class="chat_people">
                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                <div class="chat_ib">
                    <h5>'.$rowTo[toUser].'<span class="chat_date"><font size="2">'.$rowTo[dataTime].'</font></span></h5>
                    <p>'.$rowTo[mensage].'</p><br />
                </div>
                </div>
                </a>
            </div>';
    }
    if($rowFrom[fromUser] == $user_session){
        echo '<div class="chat_list active_chat">
                <a href="index.php?selectContact='.$rowFrom[fromUser].'">
                <div class="chat_people">
                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                <div class="chat_ib">
                    <h5>'.$rowFrom[fromUser].'<span class="chat_date"><font size="2">'.$rowFrom[dataTime].'</font></span></h5>
                    <p>'.$rowFrom[mensage].'</p><br />
                </div>
                </div>
                </a>
            </div>';
    }
}

function mensage03($session){
    global $conn;
    $sql = "SELECT * FROM privateMensages ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $total = mysqli_num_rows($result);
    $actualSession = $row[fromUser];
    $toUser = $row[toUser];


        $sqlRoot = "SELECT * FROM privateMensages WHERE fromUser = '$session' AND toUser = '$toUser' ORDER BY id DESC";
        $resultRoot = mysqli_query($conn, $sqlRoot);
        $rowRoot = mysqli_fetch_assoc($resultRoot);
    
        $sqlRiot = "SELECT * FROM privateMensages WHERE toUser = '$session' AND fromUser = '$toUser' ORDER BY id DESC";
        $resultRiot = mysqli_query($conn, $sqlRiot);
        $rowRiot = mysqli_fetch_assoc($resultRiot);

        if($total > 0){            
            if($session == $row[fromUser]){
                echo '<div class="chat_list active_chat">
                <a href="index.php?selectContact='.$row[toUser].'">
                <div class="chat_people">
                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                <div class="chat_ib">
                    <h5> enviada Para: '.$row[toUser].'<span class="chat_date"><font size="2">'.$row[dataTime].'</font></span></h5>
                    <p>'.$row[mensage].'</p><br />
                </div>
                </div>
                </a>
            </div>';
            }
            if($session == $row[toUser]){
                echo '<div class="chat_list active_chat">
                <a href="index.php?selectContact='.$row[fromUser].'">
                <div class="chat_people">
                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                <div class="chat_ib">
                    <h5> enviada de: '.$row[fromUser].'<span class="chat_date"><font size="2">'.$row[dataTime].'</font></span></h5>
                    <p>'.$row[mensage].'</p><br />
                </div>
                </div>
                </a>
            </div>';
            }
        }

    

}

function countMensages(){
    global $conn, $user_session;

}

function addAdmin($nome, $usuario, $email, $senha, $privilegio){
    global $conn, $host;
    $pass = md5($senha);
    $user = '@'.str_replace(' ', '_', $usuario);
    $sql = "INSERT INTO admin (name, user, email, pass, contacts, privilege) VALUES ('$nome', '$user', '$email', '$pass', '//', '$privilegio')";
    mysqli_query($conn, $sql);

    echo $sql;
}

function loginAdmin($usuario, $senha, $email){
    global $conn, $host;
    $pass = md5($senha);
    if(isset($usuario)){
        $sql = "SELECT * FROM admin WHERE user = '$usuario' AND pass = '$pass'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        if($usuario == $row[user]){
            $_SESSION['login'] = $row['user'];
        }else{
            unset ($_SESSION['login']);
            unset ($_SESSION['senha']);
            header('location:'.$host);
        }
    }
    if(isset($usuarioEmail)){
        $sql = "SELECT * FROM admin WHERE email = '$usuarioEmail' AND pass = '$pass'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        if($usuarioEmail == $row[email]){
            $_SESSION['login'] = $row['user'];
        }else{
            unset ($_SESSION['login']);
            unset ($_SESSION['senha']);
            header('location:'.$host);
        }
    }
 
}

function sessionExist($session){
    if($session == true){
        return 1;
    }else{
        return 0;
    }
}

function logout($logoutGet){
    global $host;
    
}

function contactSelected(){
    global $selectContact;
    echo $selectContact;
}

function hierarquia(){
    global $conn;
}
//###################################################################################################
//                                      Condicionais
//###################################################################################################

if($user == true){
    if($email == true){
        if($pass == true){
            register($user, $pass, $email, $phone, $name, $sName, $coutry);
        }
    }
}
//-----------------------------------
if($user == true){
    if($pass == true){
        login($user, false, $pass);
    }
}
if($email == true){
    if($pass == true){
        login(false, $email, $pass);
    }
}
if($adminUser == true){
    if($adminPass == true){
        admLogin($adminUser, $adminPass);
    }
}
//-----------------------------------
if($logout == 'logout'){
    session_destroy();
    header('location:'.$host);
    
}

if($user_session == true){
    if($mensagem == true){
        privateMansage($mensagem, $user_session, $selectContactPost , $data);
    }
}
//-----------------------------------
if($addSelectContact == true){
    addContact($user_session, $addSelectContact);
    header('location:'.$host.'/private/app/contacts.php');
}
//register($user, $pass, $email, $phone, $name, $sName, $coutry);

//groupMensage('groupSchema', $user, $mensagem, $data);

//createGroup($grupName, $usersGroup);

//addAdmin($adminName, $adminUser, $adminEmail, $adminPass, $adminPrivil);

//addContact('admin', 'teste');

//searchContact($search);

//contacts('admin');
