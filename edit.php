<?php
include_once("Crud.php");
$crud = new Crud();
$id = $crud->escape_string($_GET['id']);
$result = $crud->getData("SELECT * FROM user WHERE id=$id");
foreach ($result as $key) {
	$name = $key['name'];
	$age  = $key['age'];
	$email= $key['email'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>EDIT DATA</title>
</head>
<body>
<a href="index.php">Home</a>
<form name="form1" method="post" action="editaction.php">
	<table border="0">
		<tr>
			<td>Name</td>
			<td><input type="text" name="name" value='<?=$name?>'></td>
		</tr>
		<tr>
			<td>AGE</td>
			<td><input type="text" name="age" value='<?=$age?>'></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type="text" name="email" value='<?=$email?>'></td>
		</tr>
		<tr>
			<td><input type="hidden" name="id" value="<?=$_GET['id']?>"></td>
			<td><input type="submit" name="update" value='update'></td>
		</tr>
	</table>
	
</form>
</body>
</html>