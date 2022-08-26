<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../database1.php';
include_once '../employees.php';

$database = new Database();
$db = $database->getConnection();
$item = new employees($db);

$item->id = isset($_GET['id']) ? $_GET['id'] : die();
$item->name = $_GET['name'];
$item->age = $_GET['age'];
$item->salary = $_GET['salary'];
if($item->update()){
echo json_encode("Employee data updated.");
} else{
echo json_encode("Data could not be updated");
}
