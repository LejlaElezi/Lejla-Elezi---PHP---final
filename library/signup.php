<?php include_once 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        html, body {
            height: 100%;
            margin: 0;
        }

        body {
            background-image: url(book_images/image.jpg);
            background-size: cover;
            display: flex;
            flex-direction: column;
        }

        .sform-wrapper {
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

        h1 {
            text-align: center;
            margin-bottom: 1.5rem;
        }
    </style>
</head>
<body>

    <!-- Signup Form Area -->
    <div class="sform-wrapper">
        <div class="sform">
            <h1>Sign Up</h1>

            <form method="POST" action="signupLogic.php">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" id="username" required>
                </div>

                <div class="mb-3">
                    <label for="Email1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="Email1" required>
                    <div id="emailHelp" class="form-text">We'll never share your email.</div>
                </div>

                <div class="mb-3">
                    <label for="Password1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="Password1" required>
                </div>

                <button type="submit" name="submit" class="btn btn-primary w-100">Submit</button>
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
        <p class="text-center text-body-primary">© 2025 Company, Inc</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
