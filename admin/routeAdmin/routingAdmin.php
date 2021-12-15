<?php
$host = explode('?', $_SERVER['REQUEST_URI'])[0];
$num=substr_count($host, '/');
$path = explode('/', $host)[$num];

if ($path == '' OR $path == 'index.php' )
{
    // Главная страница - 
    $response = controllerAdmin::formLoginSite();
}
//------Вход------------------------------------------
elseif ($path == 'login')
{
    // Форма входа
    $response = controllerAdmin::loginAction();
}
elseif ($path == 'logout'){

    $response = controllerAdmin::logoutAction();
}

    //-------------------------------------------listNews
elseif($path=='newsAdmin'){
    $response=controllerAdminNews::NewsList();

}
//-------------------------------add news
    elseif($path=='newsAdd'){
        $response=controllerAdminNews::newsAddForm();

    }    
    elseif($path == 'newsAddResult') {
    $response = controllerAdminNews::newsAddResult();
}
//------------------------------------edit news
    elseif($path == 'newsEdit' && isset($_GET['id'])) {
        $response = controllerAdminNews::newsEditForm($_GET['id']);

}
elseif($path == 'newsEditResult' && isset($_GET['id'])) {
    $response = controllerAdminNews::newsEditResult($_GET['id']);
}

    else{

    $response=controllerAdmin::error404();
    
    }


