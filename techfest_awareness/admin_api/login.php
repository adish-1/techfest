<?php
session_start();
header("Content-Type: application/json");

if($_SERVER["REQUEST_METHOD"]!=="POST"){
    http_response_code(405);
    echo json_encode(["success"=>false,"message"=>"Method not allowed."]);
    exit;
}
$data=json_decode(file_get_contents("php://input"),true);
$username=trim($data["username"]??"");
$password=$data["password"]??"";
if($username==="admin"&&$password==="admin"){
    session_regenerate_id(true);
    $_SESSION["admin_logged_in"]=true;
    echo json_encode(["success"=>true,"message"=>"Login successful."]);
    exit;
}
http_response_code(401);
echo json_encode(["success"=>false,"message"=>"Invalid credentials."]);
?>