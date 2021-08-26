<!DOCTYPE html lang=NL>
<html>
<?php include("../system/classes/loggedin.php"); ?>
<?php include("../system/config/config.php"); ?>
<?php include("../system/classes/reset_password.php"); ?>
<?php
$rank = "SELECT user_role_id FROM users WHERE username = '" . $_SESSION["username"] . "'";
$resultaat = mysqli_query($db, $rank);
while ($record = mysqli_fetch_assoc($resultaat)) {
?>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title>Omnius Metabase - Dashboards</title>
        <link rel="icon" type="image/png" href="../assets/images/favicon.png">
        <link rel='stylesheet' type='text/css' href='../assets/css/theme.css' />
        <script type='text/javascript' src="https://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
        <script type='text/javascript' src='../assets/js/jquery.ba-hashchange.min.js'></script>
        <script type='text/javascript' src='../assets/js/dynamicpage.js'></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
    </head>

    <body>
        <div class="header">
            <a href="/dash/main.php"><img class="logo" src="../assets/images/logo.png"></a>
            <a id="logout-button" class="btn btn-primary" href="/dash/logout.php">Uitloggen</a>
            <?php
            if (($record['user_role_id'] == 5)) {
            ?>
                <a id="admin-button" class="btn btn-primary" href="/admin/main.php">Admin</a>
            <?php } ?>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a href="/dash/main.php">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="fa fa-home"></span> Voorpagina
                </button>
            </a>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/dash/main.php" style="font-size: 18px;"><span class="fa fa-home"></span> Voorpagina</a>
                    </li>
                    <li class="nav-item active" style="float: right;">
                        <a class="nav-link" href="/dash/wachtwoord.php" style="font-size: 18px;"><span class="fa fa-gear"></span> Wachtwoord Wijzigen</a>
                    </li>

                </ul>

            </div>
        </nav>
        <!-- Start content !-->
        <div class="container-fluid">
            <section id="main-content">
                <div id="guts">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="bg-widget2">
                                <div class="bg-widget3">
                                    <p><b>Hoe maak ik een goed wachtwoord</b></p>
                                    <hr>
                                    <p>Om een goed wachtwoord te maken moet je wachtwoord voldoen aan de onderstaande punten.
                                    <ul>
                                        <li>Minstens 8 tekens. Hoe meer hoe beter.</li>
                                        <li>Een mix van hoofd en kleine letters.</li>
                                        <li>Een mix van letters en getallen.</li>
                                        <li>Gebruik altijd speciale tekens in je wachtwoord. Gebruik geen, < of>.</li>
                                    </ul>
                                    <b>Sla altijd je wachtwoord op want achteraf veranderen kan nog niet!</b><br>
                                    <br><br>
                                    <b>Dit is een random aangemaakte wachtwoord die je kunt gebruiken:</b>   <br> 
                                    <?php
                                    function randomPassword()
                                    {
                                        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789!@#$%^&*()_+=-,.<>/?";
                                        $pass = array(); //remember to declare $pass as an array
                                        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
                                        for ($i = 0; $i < 16; $i++) {
                                            $n = rand(0, $alphaLength);
                                            $pass[] = $alphabet[$n];
                                        }
                                        return implode($pass); //turn the array into a string
                                    }
                                    ?>
                                    <input id="password" class="form-control" value="<?php echo randomPassword(); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="bg-widget2">
                                <div class="bg-widget3">
                                    <p><b>Wachtwoord wijzigen</b></p>
                                    <hr>
                                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                        <div class="form-group <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
                                            <label>Nieuwe Wachtwoord</label>
                                            <input type="password" name="new_password" class="form-control" value="<?php echo $new_password; ?>">
                                            <span class="help-block"><?php echo $new_password_err; ?></span>
                                        </div>
                                        <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                                            <label>Herhaal Wachtwoord</label>
                                            <input type="password" name="confirm_password" class="form-control">
                                            <span class="help-block"><?php echo $confirm_password_err; ?></span>
                                        </div><br>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary" value="Wijzigen">
                                            <a class="btn btn-link" href="/dash/main.php">Stoppen</a>
                                        </div>
                                    </form>
                                </div>

                            <?php } ?>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </div>
    </body>
    </div>

</html>