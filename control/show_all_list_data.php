<?php

header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Credentials: true');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
require("add_delete_function.php");

//$customer=$_GET["student_name"];
$customer="SHAHARIL";
$result=CartDao::all_list();
echo json_encode($result);

?>
