
<?php  

// Including config.php file for connection with the database 
include_once('config.php');

// If the button Add Book is pressed, we will get the data that users added into the form, and insert them into the database
if (isset($_POST['submit'])) {

    // Get the form data
    $book_tittle = $_POST['tittle'];
    $book_desc = $_POST['description'];
    $book_author = $_POST['author'];
    $book_image = $_POST['image']; 
    
    $sql = "INSERT INTO books (tittle, description, author, image) 
            VALUES (:book_tittle, :book_desc, :book_author, :book_image)";

    // Prepare the statement
    $insertBook = $con->prepare($sql);

    // Bind parameters to the placeholders
    $insertBook->bindParam(':book_tittle', $book_tittle);
    $insertBook->bindParam(':book_desc', $book_desc);
    $insertBook->bindParam(':book_author', $book_author);
    $insertBook->bindParam(':book_image', $book_image);

    // Execute the query
    try {
        $insertBook->execute();
        // Redirect after successful insertion
        header("Location: addBooks.php");
    
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
