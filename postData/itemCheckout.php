<?php
require_once 'postData.php';
function postCheckout($message)
{
    $data = getData($message);
    $dataPost['tk_login_device'] = "";
    $dataPost['ma_the'] = $data['Item Checkout']['Patron identifier'];
    $dataPost['hinh_thuc'] ="muon";
    $dataPost['ngay_muon'] = date_create_from_format("Ymd His", $data['Item Checkout']['Transaction date'])->format("Y-m-d H:i:s");
    $dataPost['dkcb_code'] = $data['Item Checkout']['Item identifier'];
    $dataPost['ngay_hen_tra'] = date_create_from_format("Ymd His", $data['Item Checkout']['Transaction date'])->modify("+2 months")->format("Y-m-d H:i:s");
    $dataPost['ngay_tra'] = '0000-00-00 00:00:00';
    $info = md5(
        $dataPost['tk_login_device'] .
        $dataPost['ma_the'] .
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
