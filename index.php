<?php 
  include_once("Crud.php");
  $crud = new Crud();
  //fetching data
  $query = "SELECT * FROM user ORDER BY id DESC";
  $result = $crud->getData($query);

?>
<!DOCTYPE html>
<html>
<head>
	<title>INDEX</title>
</head>
<body>
	<a href="add.html">Add record</a>
	<table width="80%" border="0">
		<tr bgcolor="#ccccc">
			<td>Name</td>
			<td>Age</td>
			<td>Email</td>
			<td>Update</td>
		</tr>
		<?php
			foreach ($result as $key => $res) {
				//while($res= mysqli_fetch_array($result))
			 	echo "<tr>";
			 	echo "<td>".$res['name']."</td>";
			 	echo "<td>".$res['age']."</td>";
			 	echo "<td>".$res['email']."</td>";
			 	echo "<td><a href='edit.php?id=".$res['id']."'>Edit</a>|<a href='delete.php?id=".$res['id']."'\ onclick='return confirm('Are you sure you want to delete?')'>Delete</a></td>";
			 } 
		?>
	</table>
</body>
</html>