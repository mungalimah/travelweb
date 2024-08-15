<?php
include('config/app.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
    $fullname = $_POST['fullname'];
    $user = $_POST['username'];
    $email = $_POST['email'];
    $sandi = $_POST['password'];

    // Pengecekan apakah username sudah ada
    $check_username_query = mysqli_query($db, "SELECT * FROM user WHERE username='$user'");
    if (mysqli_num_rows($check_username_query) > 0) {
        // Username sudah ada
        $register_error = "Username sudah tersedia, silakan gunakan username lain";
    } else {
        // Hash the password
        $hashed_password = password_hash($sandi, PASSWORD_DEFAULT);

        // Username belum ada, lanjutkan dengan registrasi
        $register_query = mysqli_query($db, "INSERT INTO user (fullname, username, email, password) VALUES ('$fullname', '$user', '$email', '$hashed_password')") or die(mysqli_error($db));

        if ($register_query) {
            header('Location: login.php');
            exit;
        } else {
            $register_error = "Registrasi gagal, silakan coba lagi";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('assets/img/gallery/backg-login.jpg'); /* replace with your background image URL */
            background-size: cover;
            background-position: center;
            height: 100vh;
            margin: 0;
            font-family: sans-serif;
        }
        h2 {
            color: white;
            text-align: center;
            margin-bottom: 20px;
        }
        .container {
            background-color: rgba(255, 255, 255, 0.1);
            border: 2px solid white;
            backdrop-filter: blur(10px);
            padding: 30px;
            border-radius: 10px;
            width: 50%; /* adjust the width to your liking */
            margin: 40px auto; /* adjust the margin to your liking */
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: white;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: none;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 5px;
            color: white;
        }
        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            outline: none;
            background-color: rgba(255, 255, 255, 0.2);
        }
        button[type="submit"] {
            background-color: whitesmoke;
            color: black;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2>Register</h2>
                <?php if (isset($register_error)): ?>
                    <div class="alert alert-danger"><?php echo $register_error; ?></div>
                <?php endif; ?>
                <form method="POST" action="register.php">
                    <div class="form-group">
                        <label for="fullname">Full Name:</label>
                        <input type="text" name="fullname" id="fullname" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" name="username" id="username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <button type="submit" name="register" class="btn btn-outline-success">Register</button>
                </form>
                <p class="mt-3">Sudah punya akun? <a href="login.php">Login disini</a></p>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
</body>
</html>
