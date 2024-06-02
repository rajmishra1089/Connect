
<?php
session_start();
if($_SERVER['REQUEST_METHOD'] === 'POST'){
if (!empty($_POST['mail']) && !empty($_POST['password'])) {
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);
    if ($con->connect_error) {
        die("connection failed due to " . mysqli_connect_error());
    }
    $mail = $_POST['mail'];
    $sql = "SELECT * FROM `miniproject`.`userlogin` WHERE mail = '$mail' LIMIT 1";
    $result = $con->query($sql);
    $errorMessage="";
    if ($result->num_rows == 1) {
        // User found, verify the password
        $row = $result->fetch_assoc();
        if ($_POST['password'] === $row['password']) {
            $dataarray=[$row['mail'],$row['name']];
            $_SESSION['data']=$dataarray;
            header("Location: contractors.php");
        } else {
            $errorMessage = "Please enter correct password";
        }
    } else {
        $errorMessage = "No such Username please create new account";
    }

    // Close the database connection
    $con->close();
} else {
    $errorMessage = "Please enter both username and password";
}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-image: url("night2.jpg");
            background-size: cover;
            background-repeat: no-repeat;
        }

        .box {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 90vh;
        }

        .container {
            width: 400px;
            display: flex;
            flex-direction: column;
            padding: 0px 15px 25px 15px;

        }

        span {
            color: rgb(255, 255, 255);
            font-size: small;
            display: flex;
            justify-content: center;
        }

        header {
            font-size: 30px;
            color: rgb(255, 255, 255);
            display: flex;
            justify-content: center;
            padding: 10px 0 10px 0;
        }

        .input-field {
            display: flex;
            flex-direction: column;
        }

        input {
            height: 10px;
            color: #fff;
            width: 90%;
            border: none;
            outline: none;
            border-radius: 15px;
            padding: 20px 20px 20px 25px;
            margin: 3px;
            background: rgba(217, 217, 217, 0.1);
        }

        ::-webkit-input-placeholder {
            color: #c0c0c0d8;
            text-align: center;
        }

        button {
            margin-top: 3px;
            border: none;
            width: 90%;
            padding: 10px 0 10px 0;
            border-radius: 15px;
            justify-content: center;
            background-color: #cecbcb;

        }

        .alert {
            color: white;
            margin-bottom: -20px;
            margin-top: -20px;
            text-align: center;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcToaqYc9mrF_aY_BVRiRnFLRI0I8abc5wqa6g&usqp=CAU" height="35">onnect</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="home.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">contact</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            user
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Login</a></li>
                            <li><a class="dropdown-item" href="signup.php">Sign up</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Contractors</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Login </a></li>
                            <li><a class="dropdown-item" href="#">Sign up</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="box">
        <div class="container">
            <div class="top-header">
                <span>Existing Account?</span>
                <header>Login</header>
            </div>
            <div class="alert"><?php if (!empty($errorMessage)) { ?><p><?php echo $errorMessage; ?></p>
                <?php } ?></div>
            <form action="login.php" method="post">
                <div class="input-field">
                    <input type="mail" name="mail" autocomplete="off" placeholder="mail">
                </div>
                <div class="input-field">
                    <input type="password" name="password" autocomplete="off" placeholder="password">
                </div>
                <div class="input-field">
                    <button type="submit">Login</button>
                </div>
            </form>
        </div>
    
    </div>
</body>


</html>
<?php $errorMessage=""; ?>