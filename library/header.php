
<?php
include_once 'config.php';

?>
<style>

</style>


    <header class="d-flex justify-content-center py-3 bg-white">
      <ul class="nav nav-pills">
        <li class="nav-item"><a href="index.php" class="nav-link active" aria-current="page">Home</a></li>
        <li class="nav-item"><a href="#" class="nav-link">Features</a></li>
        <li class="nav-item"><a href="#" class="nav-link">Pricing</a></li>
        <li class="nav-item"><a href="#" class="nav-link">FAQs</a></li>
        <li class="nav-item"><a href="#" class="nav-link">About</a></li> 
        <li><a href="dashboard.php" class="nav-link px-2 text-primary">Dashboard</a></li>
  
        </ul>

        <?php
      if(empty($_SESSION['username'])){
    ?>
      <div class="col-md-3 text-end">
        <button type="button" class="btn btn-outline-primary me-2" onclick="window.location.href='login.php';">Log In</button>
        <button type="button" class="btn btn-outline-primary me-2" onclick="window.location.href='signup.php';">Sign-up</button>
      </div>

        <?php
      }else{
    ?>
      <div class="col-md-3 text-end">
        <button type="button" class="btn btn-outline-primary me-2" onclick="window.location.href='logout.php';">Log Out</button>
      </div>
    <?php
      }
    ?>
      
    </header>
  </div>
