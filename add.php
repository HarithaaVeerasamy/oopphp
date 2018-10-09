<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
// including database files
include_once("Crud.php");
include_once("Validation.php");
$crud = new Crud();
$validation = new Validation();
if(isset($_POST['submit'])){
	$name = $crud->escape_string($_POST['name']);
	$age  = $crud->escape_string($_POST['age']);
	$email= $crud->escape_string($_POST['email']);
	$msg = $validation->check_empty($_POST,array('name','age','email'));
	$check_age = $validation->is_age_valid($_POST['age']);
	$check_email = $validation->is_email_valid($_POST['email']);
	//checking empty fields
	if($msg !=null){
		echo $msg;
		echo "<br/><a href='javascript:self.history.back()'>Go Back</a>";
	}elseif(!$check_age){
		echo "Please provide proper age";
	}elseif(!$check_email){
		echo "Please provide proper email";
	}else{
		$result = $crud->execute("INSERT INTO user(name,age,email) VALUES ('$name','$age','$email')");
		echo "<font color='green'>Data Added Successfully</font>";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>