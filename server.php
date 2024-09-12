<?php
session_start();
require_once 'getData.php';
require_once 'saveToJson.php';
require_once 'checkSum.php';
require_once 'messageHandler.php';
require_once 'api.php';

// Thiết lập giới hạn thời gian và thời gian chờ vô hạn
set_time_limit(0);
ini_set('default_socket_timeout', -1);
//var_dump($argv);
// var_dump($_SESSION);

$_SESSION['stopServer'] = 2;

$ipaddress=isset($argv[1]) ?  $argv[1] : '127.0.0.1';
$port=isset($argv[2]) ?  $argv[2] : '12345';
$stopServer=isset($_SESSION['stopServer']) ? $_SESSION['stopServer'] : '1';

// Tạo socket
$socket = socket_create(AF_INET, SOCK_STREAM, 0);
socket_bind($socket, $ipaddress, $port);
socket_listen($socket,5);
echo "Server is listening on $ipaddress:$port\n";

// Chấp nhận kết nối
$client_socket = socket_accept($socket);
echo "\nClient connected\n";

while (true) {
    try {
        // Nhận dữ liệu từ client
        $stopServer = file_get_contents("http://localhost/SIP2TEST/stopServer.php");
        file_put_contents("stopServer.php", '<?php echo 1; ?>');
//        print_r($stopServer);
        $data = @socket_read($client_socket, 1024);
        if ($stopServer==0){
            break;
        }
        if ($data === false) {
            $socket_error = socket_last_error($client_socket);

            // Kiểm tra nếu kết nối đã đóng
            if ($socket_error === 104 || $socket_error === 0) {
                echo "\nClient disconnected\n";
                break; // Thoát khỏi vòng lặp khi kết nối đã đóng
            } else {
                // Xử lý lỗi khác nếu có
                echo "\nSocket error: " . socket_strerror($socket_error) . "\n";
                break;
            }
        } elseif (empty($data)) {
            break;
        } else {
            echo "\n--->Command message: $data\n";

            // Tách dữ liệu và checksum từ chuỗi
            $msgToChecksumFull = explode('AZ', $data);
            $msgToChecksum = $msgToChecksumFull[0] . "AZ";
            // Tính checksum
            $checksum = applyChecksum($msgToChecksum);

            if (strcmp($checksum, $data)) {
                // Xử lý dữ liệu
//                $data1 = getData($data);
                $data2 = callAPI($data);

//                print_r($data1);
//                saveToJson($data1);
                // Phản hồi tới client
                // list($getData, $checksum1) = explode("AY", $getData);
                // $response = "Server received: $getData";
                // socket_write($client_socket, $getData, strlen($response));
                $messageHandler = new messageHandler();
                $response = $messageHandler->decode($data);
                socket_write($client_socket, $response);

                // In dữ liệu nhận được
                echo "\n<---Response message: $response\n";
            } else {
                echo "\nError Checksum ";
            }
        }
    } catch (Exception $e) {
        // Xử lý lỗi và đóng kết nối
        echo "\nError: " . $e->getMessage() . "\n";
    }
}
// Đóng kết nối socket con khi kết thúc
echo "\nClient disconnected\n";
 socket_close($client_socket);

