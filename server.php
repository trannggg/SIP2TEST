<?php
require_once 'getData.php';
// Thiết lập giới hạn thời gian và thời gian chờ vô hạn
set_time_limit(0);
ini_set('default_socket_timeout', -1);

// Tạo socket
$socket = socket_create(AF_INET, SOCK_STREAM, 0);
socket_bind($socket, '127.0.0.1', 12346);
socket_listen($socket);
echo "Server is listening on 127.0.0.1:12346\n";

// Chấp nhận kết nối
$client_socket = socket_accept($socket);
echo "Client connected\n";

while (true) {
    // Nhận dữ liệu từ client
    $data = socket_read($client_socket, 1024);

    if ($data === false) {
        echo "No data received\n";
    } else {
        echo "Received data: $data\n";

        // Tách dữ liệu và checksum từ chuỗi
        list($data, $checksum) = explode("AY", $data);
        // Xử lý dữ liệu
        $data1=getData($data);
        print_r($data1);
        // Phản hồi tới client
        $response = "Server received: $data";
        socket_write($client_socket, $data, strlen($response));

        // In dữ liệu nhận được
        echo "Response sent to client: $response\n";
    }
}

// Đóng kết nối socket con khi kết thúc
socket_close($client_socket);

?>
