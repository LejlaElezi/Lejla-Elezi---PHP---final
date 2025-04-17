<?php include_once 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>Library Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-image: url(book_images/image1.jpg);
            background-size: cover;
            display: flex;
            flex-direction: column;
        }

        body form{
            align-items: center;
        }

        .login-card {

            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem;
        }
        .sform {
            background-color: rgba(255, 255, 255, 0.92);
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
        }

        .login-card h1 {
            font-size: 1.75rem;
            margin-bottom: 1.5rem;
            color: #333;
        }

        .form-floating:not(:last-child) {
            margin-bottom: 1rem;
        }

        .btn-primary {
            font-weight: 500;
        }
    </style>


    <?php
      include_once 'config.php';
    ?>
</head>
<body>

	
    <div class="login-card">
        <div class="sform">
        <form action="loginLogic.php" method="post">
            <h1 class="text-center">Library Login</h1>

            <div class="form-floating">
                <input type="text" class="form-control" id="usernameInput" name="username" placeholder="Username" required>
                <label for="usernameInput">Username</label>
            </div>

            <div class="form-floating">
                <input type="email" class="form-control" id="emailInput" name="email" placeholder="Email" required>
                <label for="emailInput">Email</label>
            </div>

            <div class="form-floating">
                <input type="password" class="form-control" id="passwordInput" name="password" placeholder="Password" required>
                <label for="passwordInput">Password</label>
            </div>

            <button class="w-100 btn btn-lg btn-primary mt-3" type="submit" name="submit">Sign In</button>
        </form>
    </div>
    </div>
    <footer class="py-3">
        <ul class="nav justify-content-center pb-3 mb-3">
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Home</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Features</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Pricing</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">FAQs</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">About</a></li>
        </ul>
        <p class="text-center text-body-secondary">© 2025 Company, Inc</p>
    </footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>


</body>
</html>
