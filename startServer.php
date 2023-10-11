<?php
session_start();
$ipaddress = $_SESSION['ipaddress'];
$port = $_SESSION['port'];



// Lấy ngày và giờ hiện tại dưới dạng timestamp
$currentTimestamp = time();

// Chuyển timestamp thành định dạng ngày tháng năm giờ phút giây
$currentDate = date('Ymd_His', $currentTimestamp);

// Tạo tên tệp log dựa trên ngày và giờ hiện tại
$logFileName = "logs/log_$currentDate.log";

exec("php server.php > $logFileName 2>&1 $ipaddress $port", $output, $returnCode);
if ($returnCode === 0) {
    echo "Lệnh thực hiện thành công.\n";
    foreach ($output as $line) {
        echo $line . "\n";
    }
} else {
    echo "Lệnh thực hiện không thành công.\n";
}
