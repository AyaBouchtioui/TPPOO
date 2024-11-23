<?php
$emailValue = $lnameValue = $fnameValue = $passwordValue = $errorMesage = $successMesage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $emailValue = $_POST["email"] ?? "";
    $lnameValue = $_POST["lastName"] ?? "";
    $fnameValue = $_POST["firstName"] ?? "";
    $passwordValue = $_POST["password"] ?? "";

    if (empty($emailValue) || empty($fnameValue) || empty($lnameValue) || empty($passwordValue)) {
        $errorMesage = "All fields must be filled out!";
    } elseif (strlen($passwordValue) < 8) {
        $errorMesage = "Password must contain at least 8 characters.";
    } elseif (!preg_match("/[A-Z]+/", $passwordValue)) {
        $errorMesage = "Password must contain at least one capital letter!";
    } else {
        include("database.php");
        $password = password_hash($passwordValue, PASSWORD_DEFAULT);
        $sql = "INSERT INTO testDb.Clients (firstname, lastname, email, password)
                VALUES ('$fnameValue', '$lnameValue', '$emailValue', '$password')";
        if (mysqli_query($conn, $sql)) {
            $successMesage = "Account created successfully!";
            $emailValue = $lnameValue = $fnameValue = "";
        } else {
            $errorMesage = "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page with Navbar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: url('hero-bg.jpg') no-repeat center center/cover;
            font-family: Arial, sans-serif;
        }
        nav.navbar {
            width: 100%;
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            position: fixed;
            top: 0;
            z-index: 1000;
        }
        nav.navbar a {
            color: white;
            text-decoration: none;
            margin-right: 15px;
        }
        nav.navbar a:hover {
            text-decoration: underline;
        }
        .container {
            width: 100%;
            max-width: 500px;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 100px; /* Offset for fixed navbar */
        }
        .form-title {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<nav class="navbar">
    <a href="#">Home</a>
    <a href="#">Portfolio</a>
    <a href="#">Courses</a>
    <a href="#">About Us</a>
    <a href="#">Contact</a>
</nav>
<div class="container">
    <h2 class="form-title">Sign Up</h2>
    <?php if (!empty($errorMesage)): ?>
        <div class="alert alert-danger"><?= $errorMesage; ?></div>
    <?php endif; ?>
    <?php if (!empty($successMesage)): ?>
        <div class="alert alert-success"><?= $successMesage; ?></div>
    <?php endif; ?>
    <form method="post">
        <div class="mb-3">
            <label for="fname" class="form-label">First Name</label>
            <input type="text" class="form-control" id="fname" name="firstName" value="<?= htmlspecialchars($fnameValue); ?>">
        </div>
        <div class="mb-3">
            <label for="lname" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="lname" name="lastName" value="<?= htmlspecialchars($lnameValue); ?>">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($emailValue); ?>">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" name="submit" class="btn btn-primary w-100">Sign Up</button>

        <p>you already have an account! <a href="login.php">login</a></p>
    </form>
</div>
</body>
</html>