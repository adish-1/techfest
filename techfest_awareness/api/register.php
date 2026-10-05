<?php
header("Content-Type: application/json");
include("../config/db.php");
if($_SERVER["REQUEST_METHOD"]!=="POST"){
    http_response_code(405);
    echo json_encode(["success"=>false,"message"=>"Method not allowed."]);
    exit;
}
$data=json_decode(file_get_contents("php://input"),true);
$name=trim($data["name"]??"");$email=trim($data["email"]??"");$mobile=trim($data["mobile"]??"");$place=trim($data["place"]??"");
if($name===""||$email===""||$mobile===""||$place===""){
    http_response_code(400);
    echo json_encode(["success"=>false,"message"=>"All fields are required."]);
    exit;
}
if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    http_response_code(400);
    echo json_encode(["success"=>false,"message"=>"Enter a valid email address."]);
    exit;
}
$stmt=mysqli_prepare($conn,"INSERT INTO registrations(name,email,mobile,place) VALUES(?,?,?,?)");
mysqli_stmt_bind_param($stmt,"ssss",$name,$email,$mobile,$place);
if(mysqli_stmt_execute($stmt)){echo json_encode(["success"=>true,"message"=>"Registration successful."]);}else{http_response_code(500);echo json_encode(["success"=>false,"message"=>"Could not save registration."]);}mysqli_stmt_close($stmt);
?>