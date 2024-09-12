<?php
if (isset($_POST['action']) && $_POST['action'] == 'getLatestFile') {
    echo getLatestFile();
}
if (isset($_POST['action']) && $_POST['action'] == 'getFile') {
    echo getFile();
}

function getLatestFile() {
    $folderPath = 'logs';
    $files = glob($folderPath . '/*'); // Lấy tất cả các tệp trong thư mục

    if ($files !== false) {
        $latestFile = null;
        $latestTimestamp = 0;

        foreach ($files as $file) {
            if (is_file($file)) {
                $fileTimestamp = filectime($file); // Lấy thời gian tạo tệp

                if ($fileTimestamp > $latestTimestamp) {
                    $latestTimestamp = $fileTimestamp;
                    $latestFile = $file;
                }
            }
        }
    }
    echo $latestFile;
}
function getFile() {
    $_name=$_POST['formattedDate'];
    $folderPath = 'logs';
    $files = glob($folderPath . '/*'); // Lấy tất cả các tệp trong thư mục

    if ($files !== false) {
        $matchingFiles = array();

        foreach ($files as $file) {
            if (is_file($file)) {
                $filename = basename($file);
                // Sử dụng biểu thức chính quy để so sánh tên tệp với định dạng YYYYMMDD
                if (preg_match('/log_(\d{8})_\d{6}\.log/', $filename, $matches)) {
                    $fileDate = $matches[1];
                    if ($fileDate == $_name) {
                        $matchingFiles[] = $filename;
                    }
                }

            }
        }
        // $matchingFiles bây giờ chứa danh sách các tệp phù hợp với ngày đầu vào
        echo json_encode($matchingFiles);
    }
}

