<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .book-card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .book-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        }

        /* Image container for zoom effect */
        .book-img-wrapper {
            position: relative;
            height: 300px;
            overflow: hidden;
            border-radius: 10px 10px 0 0;
        }

        .book-img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .book-img-wrapper:hover img {
            transform: scale(1.1); 
        }

        .card-body {
            padding: 15px;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
        }

        .card-text {
            font-size: 1rem;
            color: #555;
        }

        .btn-group button {
            margin-right: 5px;
        }


    </style>
</head>

<body>

    <?php
    include_once 'config.php';

    $sql = "SELECT * FROM books";
    $selectBooks = $con->prepare($sql);
    $selectBooks->execute();
    $books_data = $selectBooks->fetchAll();

    include_once 'header.php';
    ?>

    <div class="container mt-5">
        <h2 class="text-center mb-4 text-white">Our Book Collection</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php foreach ($books_data as $book) { ?>
                <div class="col" onclick="window.location.href='detailBook.php?id=<?php echo $book['id']; ?>';">
                    <div class="card book-card">
                        
                        <div class="book-img-wrapper">
                            <img src="book_images/<?php echo $book['image']; ?>" class="book-img" alt="Book Image">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $book['tittle']; ?></h5>
                            <p class="card-text"><?php echo $book['description']; ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <footer class="py-3 my-4 bg-white">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
      <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Home</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Features</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Pricing</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">FAQs</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">About</a></li>
    </ul>
    <p class="text-center text-body-secondary">© 2025 Company, Inc</p>
  </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
