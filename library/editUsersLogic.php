

<?php 
/*
We will get the changed data from editUsers.php file and update them into database
*/

	include_once('config.php');

	if (isset($_POST['submit'])) {
		$id = $_POST['id'];
		$username = $_POST['username'];
		$email = $_POST['email'];
		$is_admin = $_POST['is_admin'];

		$sql = "UPDATE users SET id=:id, username=:username, email=:email, is_admin=:is_admin WHERE id=:id";

		$prep = $con->prepare($sql);
		$prep->bindParam(':id',$id);
		$prep->bindParam(':username',$username);
		$prep->bindParam(':email',$email);
		$prep->bindParam(':is_admin',$is_admin);
		$prep->execute();
		header("Location: dashboard.php");
	}
 ?>
