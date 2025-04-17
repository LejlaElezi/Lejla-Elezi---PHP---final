

<?php 
	
	include_once('config.php');

	$id = $_GET['id'];

	$sql = "DELETE FROM users WHERE id=:id";
	$prep = $con->prepare($sql);
	$prep->bindParam(':id',$id);
	$prep->execute();

	header("Location: dashboard.php");

	/* in sql i added this code:

	-- Drop the existing foreign key constraint
    ALTER TABLE bookings
    DROP FOREIGN KEY bookings_ibfk_1;

    -- Add a new foreign key constraint with ON DELETE CASCADE
    ALTER TABLE bookings
    ADD CONSTRAINT bookings_ibfk_1
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE;

    so that when i delete a user all their bookings will be deleted too
     */

	?>
