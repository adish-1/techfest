<?php
session_start();
header("Content-Type: application/json");
include("../config/db.php");
if(empty($_SESSION["admin_logged_in"])){
    http_response_code(401);
    echo json_encode(["success"=>false,"message"=>"Unauthorized."]);
    exit;
}
$result=mysqli_query($conn,"SELECT id,name,email,mobile,place,created_at FROM registrations ORDER BY id DESC");
$users=[];
while($row=mysqli_fetch_assoc($result))$users[]=$row;
echo json_encode(["success"=>true,"users"=>$users]);
?>