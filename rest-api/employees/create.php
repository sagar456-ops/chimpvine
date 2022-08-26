<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database1.php';
include_once '../class/employees.php';

$database = new Database();
$db = $database->getConnection();

$items = new employees($db);

$data = json_decode(file_get_contents("php://input"));

if (!empty($data->id) && !empty($data->name) &&
      !empty($data->age) && !empty($data->salary)) 
      {
      $items->id = $data->id;
      $items->name = $data->name;
      $items->age = $data->age;
      $items->salary = $data->salary;

      if ($items->create()) {
            http_response_code(201);
            echo json_encode(array("message" => "Sucess."));
      } else {
            http_response_code(503);
            echo json_encode(array("message" => "Unable."));
      }
} else {
      http_response_code(400);
      echo json_encode(array("message" => "Unable. Data is incomplete."));
}

?>