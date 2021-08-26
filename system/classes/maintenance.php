<?php include("../config/config.php"); ?>
<?php
                $maintenance = "SELECT * FROM website_settings";
                $resultaat = mysqli_query($db, $maintenance);
                while ($record = mysqli_fetch_assoc($resultaat)) {
                ?>
<?php
if (($record['maintenance'] == 0)) {

    header("location: /dash/login.php");
?>

    <?php } else {
        break;
    } ?>
<?php } ?>
<!DOCTYPE html lang=NL>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title>Omnius Metabase - Maintenance</title>  <link rel="icon" type="image/png" href="../../assets/images/favicon.png">
  <link rel='stylesheet' type='text/css' href='../../assets/css/theme.css' />
  <script type='text/javascript' src="https://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  <script type='text/javascript' src='../../assets/js/jquery.ba-hashchange.min.js'></script>
  <script type='text/javascript' src='../../assets/js/dynamicpage.js'></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
</head>

<body>
  <div class="header">
    <a href="/dash/main.php"><img class="logo" src="../../assets/images/logo.png"></a>
  </div>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a href="/dash/main.php">
    </a>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav mr-auto">
        

      </ul>

    </div>
  </nav>
  <!-- Start content !-->
  <div class="container-fluid">
    <section id="main-content">
      <div id="guts">
        <div class="row">
          <div class="col-md-12">
            <div class="bg-widget2">
              
              <div class="row" style="text-align: center;">
              <h1>Oeps, wij zijn momenteel in onderhoud!</h1>
              <p>Probeer het later nog een keer</p>
               <center> <img src="../../assets/images/onderhoud.png" style="height: 500px; width: 800px;"> </center>
            </div>
          </div>

        </div>
      </div>
    </section>
  </div>
</body>
</div>

</html>