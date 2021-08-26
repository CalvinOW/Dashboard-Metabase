<?php include("../system/config/config.php"); ?>
<?php
                $maintenance = "SELECT * FROM website_settings";
                $resultaat = mysqli_query($db, $maintenance);
                while ($record = mysqli_fetch_assoc($resultaat)) {
                ?>
<?php
if (($record['maintenance'] == 0)) {

    break;
?>

    <?php } else {
        header("location: /system/classes/maintenance.php");
    } ?>
<?php } ?>


<!DOCTYPE html lang=NL>
<html>
<?php include("../system/classes/login.php"); ?>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title>Omnius Metabase - Dashboards</title>   <link rel="icon" type="image/png" href="../assets/images/favicon.ico">
  <script src="https://unpkg.com/feather-icons"></script>
  <link rel='stylesheet' type='text/css' href='../assets/css/theme.css' />
  <script type='text/javascript' src="https://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  <script type='text/javascript' src='../assets/js/jquery.ba-hashchange.min.js'></script>
  <script type='text/javascript' src='../assets/js/dynamicpage.js'></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
</head>

<body>
  <!-- Start page-wrap !-->
  <script>
    $(document).ready(function() {
      $(".navbar-nav li a").click(function(event) {
        $(".navbar-collapse").collapse('show');
      });
    });
  </script>
  <div class="header">
    <a href="/"><img class="logo" src="../assets/images/logo.png"></a>
  </div>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a href="index.php">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="fa fa-home"></span> Voorpagina
      </button>
    </a>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php" style="font-size: 18px;"><span class="fa fa-home"></span> Voorpagina</a>
        </li>
      </ul>

    </div>
  </nav>
  <!-- Start content !-->
  <div class="container-fluid" style="margin-top: 15px;">
    <div class="row">
      <?php echo $username_err; ?>
      <?php echo $password_err; ?>
      <div class="col-md-3">
        <div class="bg-widget3">
          <p><b>Inloggen</b></p>
          <hr>
          <form class="form-signin" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-label-group">
            <label for="username">Username</label>
              <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
            </div>

            <div class="form-label-group  <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
            <label for="password">Password</label>
              <input type="password" name="password" class="form-control">
            </div><br>
            <button class="btn btn-lg btn-primary btn-block" name="sub" type="submit">Login</button>
          </form>
        </div>
      </div>
      <?php include("../system/classes/export_last_updates.php"); ?>

    </div>
  </div>
</body>
</div>

</html>