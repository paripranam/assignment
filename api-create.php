<?php 

header("Content-Type:application/json");
header("Access-Control-Allow_Origin:*");
header("Access-Control-Allow-Methods:POST");
header("Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-with");

$data = json_decode(file_get_contents("php://input"),true);

$department = $data['dept'];
$category = $data['cat'];
$subject = $data['sub'];
$description = $data['desc'];
$priority = $data['pri'];

include "config.php";

$sql = "INSERT INTO new_ticket(department,category,subject,description,priority) VALUES('{$department}','{$category}','{$subject}','{$description}','{$priority}')";
if(mysqli_query($conn,$sql))
{
	echo json_encode(array('message'=>'Ticket raised Successfully','status'=>true));
}else{
	echo json_encode(array('message'=>'Error','status'=>false));
}
?>