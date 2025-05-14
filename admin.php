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
            background: url('img/construction image.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            position: relative;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }

        .split-container {
            display: flex;
            min-height: 100vh;
            position: relative;
            z-index: 2;
            justify-content: center;
            align-items: center;
        }

        .login-side {
            flex: 0 1 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
            position: relative;
        }

        .image-side {
            display: none;
        }

        #wrapper-admin {
            width: 100%;
            max-width: 400px;
            padding: 0;
            position: relative;
        }

        .logo {
            max-width: 200px;
            margin: 0 auto 25px;
            display: block;
            position: absolute;
            top: -100px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 3;
            filter: drop-shadow(0 0 10px rgba(255, 255, 255, 0.5));
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
            background-color: rgba(255, 255, 255, 0.95);
            padding: 35px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
            margin-top: 80px;
            backdrop-filter: blur(5px);
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
            background-color: rgba(255, 255, 255, 0.9);
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
            background-color: rgba(253, 232, 232, 0.95);
            border-radius: 6px;
            border: 1px solid #fbd5d5;
        }
        

        @media (max-width: 991px) {
            .login-side {
                padding: 20px;
                width: 100%;
            }

            #wrapper-admin {
                max-width: 100%;
            }

            .logo {
                top: -80px;
            }
        }

        @media (max-width: 480px) {
            .login-side {
                padding: 15px;
            }
            
            .form-container {
                padding: 25px;
                margin-top: 60px;
            }
            
            .heading {
                font-size: 28px;
            }

            .logo {
                max-width: 150px;
                top: -60px;
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
