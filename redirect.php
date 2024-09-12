<?php
session_start();
echo $_GET['action'];
switch ($_GET['action']){
    case 'startServer': startServer();
        break;
    case 'stopServer': stopServer();
        break;
}
function startServer(){

    $_SESSION['ipaddress']  = $_POST['ipaddress'];
    $_SESSION ['port'] = $_POST['port'];
    print_r($_SESSION['ipaddress']);
    print_r($_SESSION ['port']);
    echo 'ok';

}
function stopServer(){
    file_put_contents('stopServer.php', '<?php echo 0; ?>');
}
