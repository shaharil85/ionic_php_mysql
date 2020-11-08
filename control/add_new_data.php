<?php

header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Credentials: true');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
require("add_delete_function.php");

date_default_timezone_set("Asia/Kuala_Lumpur");

$p=new stdClass();
$p->name=$_GET["student_name"];
//$p->price=$_GET["price"];
//$p->qty=$_GET["qty"];
//$p->customer="Raja";

//$p->name="norafifah";
//$p->date="2020-10-22";
//$p->time="14:00:00";

$p->date = date("Y/m/d");
$p->time = date("H:i:s");

$result=CartDao::add_cart($p);
echo json_encode($result);


?>
