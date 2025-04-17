<?php
include_once('config.php');

if (empty($_SESSION['id'])) {
    header("Location: login.php");
    exit;
}

// Get data from the form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['id'];
    $book_id = $_SESSION['book_id'];
    $reservation_date = $_POST['reservation_date'];
    $borrow_duration = $_POST['borrow_duration'];
    $comments = $_POST['comments'];

    // Insert the booking into the database
    $sql = "INSERT INTO bookings (user_id, book_id, reservation_date, borrow_duration, comments) 
            VALUES (:user_id, :book_id, :reservation_date, :borrow_duration, :comments)";

    $insertBooking = $con->prepare($sql);
    $insertBooking = $con->prepare($sql);

    $insertBooking->bindParam(":user_id", $user_id);
    $insertBooking->bindParam(":book_id", $book_id);
    $insertBooking->bindParam(":reservation_date", $reservation_date);
    $insertBooking->bindParam(":borrow_duration", $borrow_duration);
    $insertBooking->bindParam(":comments", $comments);
    $insertBooking->execute();

    header("Location: index.php");

}
?>

