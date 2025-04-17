
<?php 
/*Creating a session  based on a session identifier, passed via a GET or POST request.
  We will include config.php for connection with database.
  */ 
  
   include_once('config.php');

   $user_id = $_SESSION['id'];
   
/*
If the user is admin we will fetch some datas from database and show them,
 and if user is not admin we will fetch some data based on his id and show those datas. 
 If the user is admin we will create a option to approve or decline a booking.
 If we want to approve a booking we will create a link which will link us with approve.php file,
  and if we want to decline we will create a link which will link us with decline.php file.
*/
   if ($_SESSION['is_admin'] == '1') {

     $sql = "SELECT books.tittle, users.email, bookings.id, bookings.borrow_duration, bookings.reservation_date, bookings.comments, bookings.is_approved FROM books
     INNER JOIN bookings ON books.id = bookings.book_id
     INNER JOIN users ON users.id = bookings.user_id";
            

    $selectBookings = $con->prepare($sql);
    $selectBookings->execute();

    $bookings_data = $selectBookings->fetchAll();
   }else {
    
      $sql = "SELECT books.tittle, users.email, bookings.borrow_duration, bookings.reservation_date,  bookings.comments, bookings.is_approved
            FROM books INNER JOIN bookings ON books.id = bookings.book_id 
            INNER JOIN users ON users.id = bookings.user_id WHERE bookings.user_id = :user_id";

    $selectBookings = $con->prepare($sql);
    $selectBookings->bindParam(':user_id',$user_id);
    $selectBookings->execute();

    $bookings_data = $selectBookings->fetchAll();

   }
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Dashboard</title>
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
	<meta name="theme-color" content="#7952b3">

<style>
thead {
  background-color: #f4f5f7;
  color: #333;
}

th {
  padding: 12px 18px;
  font-size: 14px;
  font-weight: 600;
  text-align: left;
  border-bottom: 1px solid #d1d8e3;
  text-transform: capitalize;
  letter-spacing: 0.5px;
}

tr:nth-child(even) {
  background-color: #fafbfc;
}

tr:nth-child(odd) {
  background-color: #ffffff;
}

tr:hover {
  background-color: #f0f4f8;
}

td {
  padding: 12px 18px;
  font-size: 14px;
  color: #555;
  border-bottom: 1px solid #e0e7f3;
}

td:hover {
  background-color: #f1f5f9;
  cursor: pointer;
}

</style>

 </head>
 <body>
 
 
 <header class="navbar navbar-dark sticky-top bg-primary flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#"><?php echo "Welcome to dashboard ".$_SESSION['username']; ?></a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-50" type="text" placeholder="Search" aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="logout.php">Sign out</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
      <ul class="nav flex-column">
           <?php if ($_SESSION['is_admin'] == '1') { ?>
            <li class="nav-item">
              <a class="nav-link" href="index.php">
                <span data-feather="file"></span>
                Home
              </a>
            </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="dashboard.php">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="list_books.php">
              <span data-feather="file"></span>
              Books
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="bookings.php">
              <span ></span>
              Bookings
            </a>
          </li>
        
        <?php }else{ ?>
          <li class="nav-item">
              <a class="nav-link" href="index.php">
                <span data-feather="file"></span>
                Home
              </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="bookings.php">
              <span ></span>
              Bookings
            </a>
          </li>
        <?php  }?>


        
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
       
      </div>

    

      <h2>Bookings</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
        
              <th scope="col">Book Name</th>
              <th scope="col">User Email</th>
              <th scope="col">Borrow Duration </th>
              <th scope="col">Reservation Date</th>
              <th scope="col">Comments</th>
              <th scope="col">Is Approved</th>

            </tr>
          </thead>
          <tbody>
          <?php if ($_SESSION['is_admin'] == '1') { ?>
            <?php foreach ($bookings_data as $booking_data) { ?>
                
               <tr>
                <td><?php echo $booking_data['tittle']; ?></td>
                <td><?php echo $booking_data['email']; ?></td>
                <td><?php echo $booking_data['borrow_duration']; ?></td>
                <td><?php echo $booking_data['reservation_date']; ?></td>
                <td><?php echo $booking_data['comments']; ?></td>
                <td style="color: <?php echo $booking_data['is_approved'] == 'true' ? 'blue' : 'red'; ?>;">
                   <?php echo $booking_data['is_approved']; ?>
                </td>

                <td>
  <a href="approve.php?id=<?= $booking_data['id'];?>" class="btn btn-primary">Approve</a>
</td>
<td>
  <a href="decline.php?id=<?= $booking_data['id'];?>" class="btn btn-danger">Decline</a>
</td>

              
           <?php }} else{ ?>
            <?php foreach ($bookings_data as $booking_data) { ?>
            <tr>
            <td><?php echo $booking_data['tittle']; ?></td>
            <td><?php echo $booking_data['email']; ?></td>
            <td><?php echo $booking_data['borrow_duration']; ?></td>
            <td><?php echo $booking_data['reservation_date']; ?></td>
            <td><?php echo $booking_data['comments']; ?></td>
            <td ><?php echo $booking_data['is_approved']; ?></td>
           </tr>
            
           <?php } ?>
          <?php } ?>
           
            
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>

	<script src="/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


 </body>
 </html>
