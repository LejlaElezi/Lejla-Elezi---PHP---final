
<?php 
/*
We will get the changed data from edit.php file and update them into database
*/
	include_once('config.php');
	


	if (isset($_POST['submit1'])) {
		$id = $_POST['id'];
		$book_tittle = $_POST['tittle'];
		$book_description = $_POST['description'];
		$book_image=$_POST['image'];
		

		$sql = "UPDATE books SET id=:id,  tittle=:book_tittle, description=:book_description, image=:book_image WHERE id=:id";

		$prep = $con->prepare($sql);
		$prep->bindParam(':id',$id);
		$prep->bindParam(':book_tittle',$book_tittle);
		$prep->bindParam(':book_description',$book_description);
		$prep->bindParam(':book_image',$book_image);
		
		$prep->execute();
		header("Location: dashboard.php");
	}
 ?>
