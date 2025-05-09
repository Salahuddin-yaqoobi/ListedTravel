<?php
session_start();
if(isset($_POST['login'])) {
    include "config.php";
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];
    
    // First check if username exists
    $check_username = "SELECT * FROM user WHERE username = '{$username}'";
    $username_result = mysqli_query($conn, $check_username) or die("Query Failed");
    
    if (mysqli_num_rows($username_result) > 0) {
        // If username exists, check password
        $sql = "SELECT user_id, username, role FROM user WHERE username = '{$username}' AND password = '{$password}'";
        $result = mysqli_query($conn, $sql) or die("Query Failed");
        
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $_SESSION["username"] = $row['username'];
                $_SESSION["user_id"] = $row['user_id'];
                $_SESSION["role"] = $row['role'];
                
                header("Location: post.php");
                exit();
            }
        } else {
            $error_message = "Password is incorrect";
        }
    } else {
        $error_message = "Username does not exist";
    }
}

if(isset($_SESSION['username'])){
    header("Location: http://localhost/listedtravel/post.php");
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
        body {
            background: #f5f7fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        .split-container {
            display: flex;
            min-height: 100vh;
        }

        .login-side {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
            background: #ffffff;
        }

        .image-side {
            flex: 1;
            background-image: url('https://images.unsplash.com/photo-1507525428034-b723cf961d3e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2073&q=80');
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .image-side::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(52, 152, 219, 0.8) 0%, rgba(41, 128, 185, 0.8) 100%);
        }

        #wrapper-admin {
            width: 100%;
            max-width: 400px;
            padding: 0;
        }

        .logo {
            max-width: 150px;
            margin: 0 auto 25px;
            display: block;
            filter: drop-shadow(0 2px 4px rgba(0,0,0,0.1));
        }

        .heading {
            text-align: center;
            margin-bottom: 30px;
            font-size: 32px;
            color: #2c3e50;
            font-weight: 600;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
        }

        .form-container {
            background-color: #ffffff;
            padding: 35px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .form-container:hover {
            transform: translateY(-5px);
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            font-size: 15px;
            color: #34495e;
            font-weight: 500;
            margin-bottom: 8px;
            display: block;
        }

        .form-control {
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            padding: 12px 15px;
            font-size: 16px;
            transition: all 0.3s ease;
            width: 100%;
            box-sizing: border-box;
        }

        .form-control:focus {
            border-color: #3498db;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
            outline: none;
        }

        .btn-primary {
            width: 100%;
            padding: 14px;
            font-size: 16px;
            font-weight: 600;
            background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
            border: none;
            border-radius: 8px;
            color: white;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #2980b9 0%, #2471a3 100%);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        .error-message {
            color: #e74c3c;
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
            padding: 10px;
            background-color: #fde8e8;
            border-radius: 6px;
            border: 1px solid #fbd5d5;
        }

        @media (max-width: 991px) {
            .split-container {
                flex-direction: column;
            }

            .image-side {
                display: none;
            }

            .login-side {
                padding: 20px;
            }

            #wrapper-admin {
                max-width: 100%;
            }
        }

        @media (max-width: 480px) {
            .login-side {
                padding: 15px;
            }
            
            .form-container {
                padding: 25px;
            }
            
            .heading {
                font-size: 28px;
            }
        }
    </style>
</head>
<body>
    <div class="split-container">
        <div class="image-side"></div>
        <div class="login-side">
            <div id="wrapper-admin" class="body-content">
                <img class="logo" src="img/logo.png" alt="Logo">
                <!-- <h3 class="heading">Admin Login</h3> -->
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
                if (isset($error_message)) {
                    echo "<p class='error-message'>" . $error_message . "</p>";
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
