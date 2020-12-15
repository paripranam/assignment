<?php
include "config.php";
if(isset($_POST["submit"])){

$email = $_POST['email']; 
$password = $_POST['password'];
$sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
$result = mysqli_query($conn,$sql) or die("SQL query failed");
if(mysqli_num_rows($result) > 0){
	$output = mysqli_fetch_all($result,MYSQLI_ASSOC);
	header("Location:login_page.php");
}else{
	echo json_encode(array('message'=>'No record found','status'=>false));
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="include/css/bootstrap.min.css">
	<script type="text/javascript" src="include/js/jquery.min.js"></script> 
	<script type="text/javascript" src="include/js/bootstrap.min.js"></script>
	<style>
		.container{
               width:30%;
               margin-top:200px;
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
	<div class="container">
		<form method="post">
			<div class="form-group">
				<label for="emailAddress">Email</label>
				<input type="email" class="form-control" id="email" name="email"   placeholder="Enter email">
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
			</div>
			<button type="submit" class="btn btn-primary blue center-block" id="submit"   name="submit">LOGIN</button>
		</form>
	</div>
</body> 

</html> 
