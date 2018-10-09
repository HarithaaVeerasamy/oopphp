<?php
include_once("Crud.php");
include_once("Validation.php");
$crud  = new Crud();
$validation = new Validation();
if(isset($_POST['update'])){
	$id = $crud->escape_string($_POST['id']);
	$name = $crud->escape_string($_POST['name']);
	$age = $crud->escape_string($_POST['age']);
	$email = $crud->escape_string($_POST['email']);
	$msg = $validation->check_empty($_POST,array('name','age','email'));
	$check_age = $validation->is_age_valid($_POST['age']);
	$check_email = $validation->is_email_valid($_POST['email']);
	if($msg){
		echo $msg;
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	}elseif(!$check_age){
		echo "Please provide proper age";
	}elseif(!$check_email){
		echo "please provide proper email";
	}else{
		$result = $crud->execute("UPDATE user SET name='$name',email='$email',age='$age' WHERE id='$id'");
		header('Location: index.php'); 
	}
}
?>