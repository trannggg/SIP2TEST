<?php
echo $_GET['action'];
switch ($_GET['action']){
    case 'startServer': startServer();
        break;
    case 'endServer':endServer();
        break;
}
function startServer(){
    session_start();
    $_SESSION['ipaddress']  = $_POST['ipaddress'];
    $_SESSION ['port'] = $_POST['port'];
    print_r($_SESSION['ipaddress']);
    print_r($_SESSION ['port']);
    echo 'ok';

}
function endServer(){
    $_SESSION['stopServer']='0';
}