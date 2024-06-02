<?php
session_start();
$dataarray=$_SESSION['data'];
$mail=$dataarray[0];
$name=$dataarray[1];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contractors</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <style>
    * {
      margin: 0;
      padding: 0;
    }

    html {
      box-sizing: border-box;
      font-size: 62.5%;
    }

    body {
      background-color: rgb(228, 237, 239);
      font-family: "Poppins", sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    .grid {
      display: grid;
      width: 114em;
      grid-gap: 10rem;
      grid-template-columns: repeat(auto-fit, minmax(60px, 25%));
    }

    .grid-item {
      background-color: antiquewhite;
      border-radius: 5px;
      overflow: hidden;
      box-shadow: 0 3px 3px rgba(0, 0, 0, 0.1);
    }

    .card-image {
      display: block;
      width: 100%;
      height: 50px;
      object-fit: fill;
    }

    body {
      background-image: url(lightbg.jpg);
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
    }

    .card:hover {
      transform: scale(1.05);
      box-shadow: 2px 2px rgba(0, 0, 0, 0.1);
      transition: all 0.4s;
    }
  </style>
</head>

<body>


  <main role="main">
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-light">
      <div class="container-fluid">
        <h3 style="color: rgb(14, 16, 18);">You are logged in</h3>
        <h3><?php echo "Hello $name"; ?></h3>
        <a href="home.html"><button class="btn btn-outline-dark">Log out</button></a>
      </div>
    </nav>
    <section class="jumbotron text-center">
      <div class="container">
        <h1 class="jumbotron-heading">These are the services provided by us</h1>
        <p class="lead text-muted">At Connect, we bring together functionality and aesthetics to provide homeowners with customised and efficient home designs. Our designers specialise in home interior designs and home décor, and help you create a personalized home to suit your lifestyle.</p>
      </div>
    </section>

    <div class="album py-5 " style="background-color: rgba(0, 0, 0, 0.05) ;">
      <div class="album py-5 " style="background-color: rgba(0, 0, 0, 0.05) ;">
        <div class="container">
          <div class="row">
            <div class="col-md-4">
              <div class="card mb-4 box-shadow" style="background-color: #e9ecef;">
                <a href="contdata.php?value=interiors"><img class="card-img-top" style="height: 225px; width: 100%; display: block;" src="interior.jpg" data-holder-rendered="true"></a>
                <div class="card-body">
                  <h1 class="card-text" style="text-align: center;">Interior designers</h1>

                </div>
              </div>

            </div>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow" style="background-color: #e9ecef;">
                <a href="contdata.php?value=plumbers"><img class="card-img-top" style="height: 225px; width: 100%; display: block;" src="plumbing.jpeg" data-holder-rendered="true"></a>
                <div class="card-body">
                  <h1 class="card-text" style="text-align: center;">Plumbers</h1>

                </div>
              </div>

            </div>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow" style="background-color: #e9ecef;">
                <a href="contdata.php?value=electricians"><img class="card-img-top" style="height: 225px; width: 100%; display: block;" src="electrical.jpeg" data-holder-rendered="true"></a>
                <div class="card-body">
                  <h1 class="card-text" style="text-align: center;">electricians</h1>

                </div>
              </div>

            </div>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow" style="background-color: #e9ecef;">
                <a href="contdata.php?value=architects"><img class="card-img-top" style="height: 225px; width: 100%; display: block;" src="Housedesign.jpg" data-holder-rendered="true"></a>
                <div class="card-body">
                  <h1 class="card-text" style="text-align: center;">Building designers</h1>

                </div>
              </div>

            </div>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow" style="background-color: #e9ecef;">
                <a href="contdata.php?value=builders"><img class="card-img-top" style="height: 225px; width: 100%; display: block;" src="builders.jpg" data-holder-rendered="true"></a>
                <div class="card-body">
                  <h1 class="card-text" style="text-align: center;">Construction works</h1>

                </div>
              </div>

            </div>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow" style="background-color: #e9ecef;">
                <a href="contdata.php?value=painters"><img class="card-img-top" style="height: 225px; width: 100%; display: block;" src="wallpaints.jpg" data-holder-rendered="true"></a>
                <div class="card-body">
                  <h1 class="card-text" style="text-align: center;">Wall painters</h1>

                </div>
              </div>

            </div>











          </div>
        </div>
      </div>

  </main>

</body>

</html>