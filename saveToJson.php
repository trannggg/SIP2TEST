<?php
function saveToJson($data){
    // Chuyển đổi mảng thành chuỗi JSON
    $jsonData = json_encode($data, JSON_PRETTY_PRINT);

    // Lấy đường dẫn tới thư mục hiện tại
    $currentDirectory = getcwd();

    // Đường dẫn và tên tệp JSON bạn muốn lưu (tại thư mục hiện tại)
    $filePath = $currentDirectory . 'data/getData.json';

    // Lưu chuỗi JSON vào tệp
    if (file_put_contents($filePath, $jsonData)) {
        echo "Dữ liệu đã được lưu vào tệp JSON thành công.\n";
    } else {
        echo "Lỗi khi lưu dữ liệu vào tệp JSON.\n";
    }
}
?>
