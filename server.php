<?php
session_start();
require_once 'getData.php';
require_once 'saveToJson.php';
require_once 'checkSum.php';
require_once 'messageHandler.php';


// Thiết lập giới hạn thời gian và thời gian chờ vô hạn
set_time_limit(0);
ini_set('default_socket_timeout', -1);
var_dump($argv);
// var_dump($_SESSION);
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
echo "Client connected\n";

while (true) {
    try {
        // Nhận dữ liệu từ client
        $data = @socket_read($client_socket, 1024);
        if ($stopServer==0){
            break;
        }
        if ($data === false) {
            $socket_error = socket_last_error($client_socket);

            // Kiểm tra nếu kết nối đã đóng
            if ($socket_error === 104 || $socket_error === 0) {
                echo "Client disconnected\n";
                break; // Thoát khỏi vòng lặp khi kết nối đã đóng
            } else {
                // Xử lý lỗi khác nếu có
                echo "Socket error: " . socket_strerror($socket_error) . "\n";
                break;
            }
        } elseif (empty($data)) {

            break;
        } else {
            echo "Received data: $data\n";
            // Tách dữ liệu và checksum từ chuỗi
            $msgToChecksumFull = explode('AZ', $data);
            $msgToChecksum = $msgToChecksumFull[0] . "AZ";
            // Tính checksum
            $checksum = applyChecksum($msgToChecksum);
            if (strcmp($checksum, $data)) {
                // Xử lý dữ liệu
                $data1 = getData($data);
                print_r($data1);
                saveToJson($data1);
                // Phản hồi tới client
                // list($data, $checksum1) = explode("AY", $data);
                // $response = "Server received: $data";
                // socket_write($client_socket, $data, strlen($response));
                $messageHandler = new messageHandler();
                $response = $messageHandler->decode($data);
                socket_write($client_socket, $response);

                // In dữ liệu nhận được
                echo "Response sent to client: $response\n";
            } else {
                echo "Error Checksum ";
            }
        }
    } catch (Exception $e) {
        // Xử lý lỗi và đóng kết nối
        echo "Error: " . $e->getMessage() . "\n";
    }
}
// Đóng kết nối socket con khi kết thúc
 socket_close($client_socket);

