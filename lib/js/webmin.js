$(document).ready(function(){
    $('#front').load('./public/client/login.php');
    //$('#teste').text('teste');
    $('#navbar').load('./public/components/navbar.php');
    $('#navbarApp').load('../../public/components/navbar.php');
    $('#footer').load('./public/components/footer.php');

});

// Bind to State Change
History.Adapter.bind(window,'statechange',function(){ // Note: We are using statechange instead of popstate
    // Log the State
    var State = History.getState(); // Note: We are using History.getState() instead of event.state
    console.log('statechange:', State.data, State.title, State.url);
});

//######################################################################################################
//                              funções e rotas - V1.4
//######################################################################################################

function clientLogin(){
    $('#front').load('./public/client/login.php');
}

function emailLogin(){
    $('#front').load('./public/client/emailLogin.php');
}

function adminLogin(){
    $('#front').load('./public/admin/login.php');
}

function clientRegister(){
    $('#front').load('./public/client/register.php');
}

function adminLogin(){
    $('#front').load('./public/admin/login.php');
}

function appRoute(){
    $('#bodyClass').load('../../private/app/index.php');
}

function contacts(){
    $('#bodyClass').load('../../private/app/contacts.php');
}

function grupos(){
    $('#bodyClass').load('../../private/app/groups.php');
}

function profile(){
    $('#bodyClass').load('../../private/app/profile.php');
}

//######################################################################################################
//                             Rotas do App
//######################################################################################################

function login(){
    History.pushState({pagina:1, url: clientLogin()}, "SmartChat - login", "/");
}

function register(){
    History.pushState({pagina:2, url: clientRegister()}, "SmartChat - register", "/");
}

function email(){
    History.pushState({pagina:3, url: emailLogin()}, "SmartChat - email login", "/");
}

function app(){
    History.pushState({pagina:3, url: appRoute()}, "SmartChat - app", "#");
}

function appContacts(){
    History.pushState({pagina:4, url: contacts()}, "SmartChat - Contacts", "#");
}

function appGroups(){
    History.pushState({pagina:5, url: grupos()}, "SmartChat - Grupos", "#");
}

function appProfile(){
    History.pushState({pagina:6, url: profile()}, "SmartChat - profile", "#");
}

function admLogin(){
    History.pushState({pagina:7, url: adminLogin()}, "SmartChat - admin Login", "#");
}

