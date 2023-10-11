<?php
require_once 'postData.php';
function postCheckin($message)
{
    $data = getData($message);
    $dataPost['tk_login_device'] = "";
    $dataPost['ma_the'] = "";
    $dataPost['hinh_thuc'] ="tra";
    $dataPost['ngay_muon'] ='0000-00-00 00:00:00';
    $dataPost['dkcb_code'] = $data['Item Checkin']['Item Identifier (Barcode)'];
    $dataPost['ngay_hen_tra'] = '0000-00-00 00:00:00';
    $dataPost['ngay_tra'] = date_create_from_format("Ymd His", $data['Item Checkin']['Return Date'])->format("Y-m-d H:i:s");;
    $info = md5(
        $dataPost['tk_login_device'] .
        $dataPost['ma_the'].
        $dataPost['hinh_thuc'] .
        $dataPost['ngay_muon'] .
        $dataPost['dkcb_code'] .
        $dataPost['ngay_hen_tra'] .
        $dataPost['ngay_tra']
    );
    $KEY = '8OVnxWtoWdk8ftr9J7L7iZLSVGh9yNBS';
    $token = md5($KEY . $info);
    $dataPost['info'] = $info;
    $dataPost['token'] = $token;
    saveToJson($dataPost);// Chuyển đổi mảng thành chuỗi JSON (nếu API yêu cầu dữ liệu ở định dạng JSON)
    postData($dataPost);

}
