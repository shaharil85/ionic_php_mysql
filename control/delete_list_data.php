<?php

header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Credentials: true');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
require("add_delete_function.php");

$name=$_GET["student_name"];
//$id = "4";
//$name = "SHAHARIL";
$result=CartDao::delete_cart($name);

echo json_encode($result);

?>
