<?php 
session_start();
$dataarray=$_SESSION['data'];
$mail=$dataarray[0];
$name=$dataarray[1];
$occupation = $_GET['value'];
if(isset($_POST['city'])){
$server="localhost";
$username="root";
$password="";
error_reporting(E_ERROR | E_PARSE);
ini_set('display_errors', '0');
$city=$_POST['city'];
$con = mysqli_connect($server, $username, $password);
if ($con->connect_error) {
    die("connection failed due to " . mysqli_connect_error());
}
$sql = "SELECT * FROM `miniproject`.`contlogin` WHERE occupation = '$occupation' and city ='$city' ";
$result = $con->query($sql);
$con->close();}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contractors data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        body{
            background-image: url(contdataback.jpeg);
            background-repeat: no-repeat;
            background-size: cover;
        }
        .back{
            position: relative;
            bottom: 0;
            right: 0;
        }
        
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card" >
                    <div class="card-header" >
                        <a href="contractors.php" ><button type="button"  class="btn btn-outline-primary"><--Back</button></a>
                        <h4 class="card-title"  style="text-align: center; font-family: sans-serif">Enter the city name where work is to be done.</h4>
                        <p style="text-align: right;"><?php echo "User: $name" ?></p>
                        
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="city" class="form-control" placeholder="Enter city name">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" name="submit" class="btn btn-outline-secondary">Search</button>
                                </div>
                            </div>
                        </form>
                        <table class="table">
                            <thead>
                                <th>Name</th>
                                <th>Ph.no</th>
                                <th>e-mail</th>
                                <th></th>
                            </thead>
                            <tbody>
                                <?php 
                                if(!empty($_POST['city'])){
                                if($result->num_rows>0){
                                    while($row=mysqli_fetch_array($result)){
                                        ?>
                                        <tr>
                                            <td><?php echo $row['name'] ?></td>
                                            <td><?php echo $row['phoneno'] ?></td>
                                            <td><?php echo $row['mail'] ?></td>
                                            <td>
                                                <form action="sendmail.php" method="post">
                                                    <input type="hidden" name="recipientmail" value="<?php echo $row['mail']; ?>">
                                                    <input type="hidden" name="recepientname" value="<?php echo $row['name']; ?>">
                                                    <button type="submit" class="btn btn-outline-primary">Connect</button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                                else{
                                    ?>
                                    <tr>
                                        <td colspan="6">No Record Found</td>
                                    </tr>
                                    <?php
                                }}
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>