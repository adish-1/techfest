<?php
$db_host="localhost";
$db_user="root";
$db_password="";
$db_name="techfest";
$conn=mysqli_connect($db_host,$db_user,$db_password,$db_name);
if(!$conn){
    http_response_code(500);
    echo json_encode(["success"=>false,"message"=>"Database connection failed."]);
    exit;
}
mysqli_set_charset($conn,"utf8mb4");
?>