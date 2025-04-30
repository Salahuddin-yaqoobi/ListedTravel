<?php
session_start();
if(isset($_SESSION['username'])){
    header("Location: http://localhost/fancyshop/post.php");
    exit();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ADMIN | Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="font/font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="../css/style.css">
    <style>
        /* Custom Styles */
        body {
            background-color: #f4f7fc;
            font-family: Arial, sans-serif;
        }

        #wrapper-admin {
            padding-top: 100px;
            padding-bottom: 100px;
        }

        .logo {
            max-width: 120px;
            margin-bottom: 20px;
        }

        .heading {
            text-align: center;
            margin-bottom: 30px;
            font-size: 28px;
            color: #333;
        }

        .form-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .form-group label {
            font-size: 14px;
            color: #555;
        }

        .form-control {
            border-radius: 5px;
            padding: 10px;
            font-size: 16px;
        }

        .btn-primary {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            background-color: #007bff;
            border-color: #007bff;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .error-message {
            color: red;
            text-align: center;
            margin-top: 10px;
        }

        @media (max-width: 767px) {
            .col-md-4 {
                margin-left: 0 !important;
            }
            .col-md-offset-4 {
                margin-left: 0 !important;
            }
        }
    </style>
</head>
<body>
    <div id="wrapper-admin" class="body-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4 col-sm-6">
                    <img class="logo" src="img/logo.png" alt="Logo">
                    <h3 class="heading">Admin Login</h3>
                    <div class="form-container">
                        <!-- Form Start -->
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Enter your username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" required>
                            </div>
                            <input type="submit" name="login" class="btn btn-primary" value="Login" />
                        </form>
                        <!-- /Form  End -->
                    </div>
                    <?php
                    if (isset($_POST['login'])) {
                        include "config.php";
                        $username = mysqli_real_escape_string($conn, $_POST['username']);
                        $password = md5($_POST['password']);
                        $sql = "SELECT user_id, username, role FROM user WHERE username = '{$username}' AND password = '{$password}'";
                        $result = mysqli_query($conn, $sql) or die("Query Failed");
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                // session_start();
                                $_SESSION["username"] = $row['username'];
                                $_SESSION["user_id"] = $row['user_id'];
                                $_SESSION["role"] = $row['role'];
                                header("Location: http://localhost/fancyshop/post.php");
                                exit();
                            }
                        } else {
                            echo "<p class='error-message'>Username and password do not match</p>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
