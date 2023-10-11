<?php

function postData($dataPost){
    $jsonData = json_encode($dataPost);
    // Địa chỉ URL của API
    $apiUrl = 'http://thuvienso-sandbox-qc.vnpt.edu.vn/admin/module/digitalLib/service/ticketBorrowDocument/ticketBorrowSIP';

    // Khởi tạo một session cURL
        $ch = curl_init($apiUrl);

    // Thiết lập tùy chọn cho session cURL
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Trả về kết quả

    // Thiết lập method là POST
        curl_setopt($ch, CURLOPT_POST, 1);

    // Thiết lập dữ liệu POST
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);

    // Thiết lập tiêu đề cho yêu cầu (nếu cần)
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            // Add other headers if needed
        ));

    // Thực hiện request và lấy kết quả
        $response = curl_exec($ch);

    // Kiểm tra lỗi (nếu có)
        if (curl_errno($ch)) {
            echo 'Lỗi cURL: ' . curl_error($ch);
        }

    // Đóng session cURL
        curl_close($ch);

    // Xử lý kết quả từ API (nếu cần)
        echo "Kết quả API: $response";
}
