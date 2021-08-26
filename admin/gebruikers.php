<!DOCTYPE html lang=NL>
<html>
<?php include("../system/classes/loggedin.php"); ?>
<?php include("../system/config/config.php"); ?>
<?php
include("../system/classes/maakgebruiker.php");
?>
<?php
$rank = "SELECT user_role_id FROM users WHERE username = '" . $_SESSION["username"] . "'";
$resultaat = mysqli_query($db, $rank);
while ($record = mysqli_fetch_assoc($resultaat)) {
?>
<?php
$rank = "SELECT * FROM permissions WHERE rankid = '" . $record["user_role_id"] . "'";
$resultaat = mysqli_query($db, $rank);
while ($perm = mysqli_fetch_assoc($resultaat)) {
  ?>
    <?php
    if (($perm['can_access_admin'] == 1)) {
    ?>

        <head>
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
            <title>Omnius Metabase - Admin</title>  <link rel="icon" type="image/png" href="../assets/images/favicon.ico">
            <link rel='stylesheet' type='text/css' href='../assets/css/theme.css' />
            <script type='text/javascript' src="https://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
        </head>

        <body>
            <div class="header">
                <a href="/dash/main.php"><img class="logo" src="../assets/images/logo.png"></a>
            </div>
            <?php include("./include/nav.php"); ?>
            <div class="container-fluid" style="margin-top: 25px;">
                <div class="row">
                    <div class="col-md-8">
                        <div class="bg-widget2">
                            <div class="bg-widget3">
                                <p><b>Gebruiker Aanmaken</b></p>
                                <hr>
                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                    <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                                        <label>Gebruikersnaam</label>
                                        <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                                        <span class="help-block"><?php echo $username_err; ?></span>
                                    </div>
                                    <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                                        <label>Wachtwoord</label>
                                        <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                                        <span class="help-block"><?php echo $password_err; ?></span>
                                    </div>
                                    <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                                        <label>Herhaal Wachtwoord</label>
                                        <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                                        <span class="help-block"><?php echo $confirm_password_err; ?></span>
                                    </div><br>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" value="Aanmaken">
                                        <input type="reset" class="btn btn-default" value="Leeg maken">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="bg-widget2">
                            <div class="bg-widget3">
                                <p><b>Gebruiker aanmaken</b></p>
                                <hr>
                                Bij het aanmaken van een gebruiker moet je denken aan:
                                <ul>
                                    <li>Gebruikersnaam</li>
                                    <li>En een goed wachtwoord</li>
                                </ul>
                                Bekijk <a href="/dash/wachtwoord.php">hier</a> hoe je een goed wachtwoord kunt maken.
                                
                            </div>

                        </div>
                    </div>
                </div>

        </body>
        </div>

</html>
<?php } else {
        header("location: /dash/main.php");
    } ?>
<?php } ?>
<?php } ?>