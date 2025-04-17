
<?php 
  /*Creating a session  based on a session identifier, passed via a GET or POST request.
  We will include config.php for connection with database.
  We will get the data of films from database based on each films ids.
  Creating a form which will post some of those datas into book.php file
  */
  
    include_once'header.php';
   include_once('config.php');

if (empty($_SESSION['id'])) {
    header("Location: login.php");
    exit;  // Always use exit after header to stop the script
}

// Proceed with the rest of the code
$id = $_GET['id'];
$_SESSION['book_id'] = $id;  // Store the book id in session (not the user id)

// Fetch book data from database based on id
$sql = "SELECT * FROM books WHERE id=:id";
$selectBook = $con->prepare($sql);
$selectBook->bindParam(":id", $id);
$selectBook->execute();
$book_data = $selectBook->fetch();

?>
 <!DOCTYPE html>
 <html>
 <head>
  <title>Home</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <link rel="apple-touch-icon" href="/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
  <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
  <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
  <link rel="manifest" href="/docs/5.1/assets/img/favicons/manifest.json">
  <link rel="mask-icon" href="/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
  <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon.ico">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <meta name="theme-color" content="#7952b3">
  
  <style>
    .form-floating{
      margin: 20px 0;
    }
  </style>
 </head>
 <body>
 
  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Book your Book</h1>
        <p class="lead text-muted">You can borrow the book by clicking the button below</p>
      </div>
    </div>
  </section>
   <div class="album py-5 bg-light">
    <div class="container">
      <div class="container">
       <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-6">
                    <div class="white-box text-center" style="width: 100%;height: 100%;"><img src="book_images/<?php echo $book_data['image'];  ?>" class="img-responsive" style="width: 70%; height: 90%;"></div>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-6">
                    <h4 class="box-title mt-5"><?php echo $book_data['tittle']; ?></h4>
                    <p><?php echo $book_data['description']; ?></p>
                    <form action="book.php" method="POST">
    <!-- Borrow Duration (up to 21 days) -->
                      <div class="form-floating">
                        <input type="number" class="form-control" id="borrow_duration" placeholder="Number of days to borrow" name="borrow_duration" max="21" required>
                        <label for="borrow_duration">Borrow Duration (max 21 days)</label>
                      </div>

    <!-- Reservation Date (Calendar Picker) -->
                      <div class="form-floating">
                        <input type="date" class="form-control" id="reservation_date" placeholder="Reservation Date" name="reservation_date" required>
                        <label for="reservation_date">Reservation Date</label>
                      </div>

    <!-- Optional Comments (e.g. special requests, etc.) -->
                      <div class="form-floating">
                        <textarea class="form-control" id="comments" placeholder="Additional Comments (optional)" name="comments"></textarea>
                        <label for="comments">Additional Comments</label>
                      </div>

                      <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Book Now</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
  </div>
</div>
 </body>
 </html>
