<?php 

header("Content-Type:application/json");
header("Access-Control-Allow_Origin:*");

$data = json_decode(file_get_contents("php://input"),true);

$id = $data['id'];

include "config.php";

$sql = "SELECT * FROM new_ticket WHERE id = {$id}";
$result = mysqli_query($conn,$sql) or die("SQL query failed");

if(mysqli_num_rows($result) > 0){
	$output = mysqli_fetch_all($result,MYSQLI_ASSOC);
	echo json_encode($output);
}else{
	echo json_encode(array('message'=>'No record found','status'=>false));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title></title>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="include/css/bootstrap.min.css">
	<script type="text/javascript" src="include/js/jquery.min.js"></script> 
	<script type="text/javascript" src="include/js/bootstrap.min.js"></script>
	<style>
		.container{
               width:30%;
               margin-top:50px;
               background-color: #e7e7e7;
               box-shadow: 5px 5px 5px grey;
               padding:10px;
		}
		.blue{
			background-color: blue;
		}
	</style>
</head>
<body>

<div class="header">
  <a href="#default" class="logo">CompanyLogo</a>
  <div class="header-right">
    <a href="#">Home</a>
    <a href="#">My Area</a>
    <a href="#about">Knowledge Base</a>
  </div>
</div>
<h3 style="text-align:center">Ticket Information</h3>
<div class="container">
		<form id="new_ticket_form" method="post" action="http://localhost:81/php-rest-api/api-fetch-all.php">
			<div class="form-group">
				<label for="Department">Department</label>
				<input type="text" class="form-control" id="dept" name="dept"   placeholder="Enter Department">
			</div>
			<div class="form-group">
				<label for="Category">Category</label>
				<input type="text" class="form-control" id="cat" name="cat" placeholder="Enter Category">
			</div>
			<div class="form-group">
				<label for="Subject">Subject</label>
				<input type="text" class="form-control" id="sub" name="sub" placeholder="Enter Subject">
			</div>
			<div class="form-group">
				<label for="Description">Description</label>
				<input type="text" class="form-control" id="desc" name="desc" placeholder="Enter Description">
			</div>
			<div class="form-group">
				<label for="Priority">Priority</label>
				<input type="text" class="form-control" id="pri" name="pri" placeholder="Enter Priority">
			</div>
			<button type="submit" class="btn btn-primary blue center-block" id="submit" name="submit">SUBMIT</button>
		</form>
	</div>


</html> 