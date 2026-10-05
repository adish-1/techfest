<?php
session_start();
header("Content-Type: application/json");
include("../config/db.php");
if(empty($_SESSION["admin_logged_in"])){
    http_response_code(401);
    echo json_encode(["success"=>false,"message"=>"Unauthorized."]);
    exit;
    }
if($_SERVER["REQUEST_METHOD"]!=="POST"){
    http_response_code(405);
    echo json_encode(["success"=>false,"message"=>"Method not allowed."]);
    exit;}
if(mysqli_query($conn,"DELETE FROM registrations"))
echo json_encode(["success"=>true,"message"=>"All registrations deleted."]);
else{
    http_response_code(500);
    echo json_encode(["success"=>false,"message"=>"Deletion failed."]);
}
?>