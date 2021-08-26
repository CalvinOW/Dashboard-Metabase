<!DOCTYPE html lang=NL>
<html>
<?php include("../system/classes/loggedin.php"); ?>
<?php include("../system/config/config.php"); ?>
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
            <title>Omnius Metabase - Admin</title>   <link rel="icon" type="image/png" href="../assets/images/favicon.ico">
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
            <!-- Start content !-->
            <div class="container-fluid" style="margin-top: 25px;">
                <div class="row">
                    <div class="col-md-8">
                        <div class="bg-widget2">
                            <div class="bg-widget3">
                                <p><b>Gebruiker Verwijderen</b></p>
                                <hr>
                                <?php
                                include_once '../system/config/config.php';

                                if (count($_POST) > 0) {
                                    mysqli_query($db, "UPDATE users set id='" . $_POST['id'] . "', username='" . $_POST['username'] . "', user_role_id='" . $_POST['user_role_id'] . "' WHERE id='" . $_POST['id'] . "'");
                                    $message = "Gebruiker is succesvol aangepast!";
                                }
                                $result = mysqli_query($db, "SELECT * FROM users WHERE id='" . $_GET['id'] . "'");
                                $row = mysqli_fetch_array($result);
                                ?>
                                <form name="frmUser" method="post" action="">
                                    <div><?php if (isset($message)) {
                                                echo '<div class="alert alert-success" role="alert">' . $message . '</div>';
                                            } ?>
                                    </div>
                                    ID: <br>
                                    <input type="hidden" name="id" class="txtField" value="<?php echo $row['id']; ?>">
                                    <input type="text" name="id" value="<?php echo $row['id']; ?>" disabled>
                                    <br>
                                    Gebruikersnaam: <br>
                                    <input type="text" name="username" class="txtField" value="<?php echo $row['username']; ?>">
                                    <br>
                                    Rank:<br>

                                    <select name="user_role_id" id="user_role_id">
                                        <option value="0">Selecteer een Rank</option>
                                        <option value="5">Beheerder</option>
                                        <option value="4">Management</option>
                                        <option value="3">Support</option>
                                        <option value="2">Gebruiker</option>
                                        <option value="1">ARAG</option>
                                    </select><br><br>
                                    <input type="submit" name="submit" value="Aanpassen" class="buttom">

                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="bg-widget2">
                            <div class="bg-widget3">
                                <p><b>Let op!</b></p>
                                <hr>
                                Het invullen van een rank is verplicht aangezien deze anders update naar 0 en de persoon geen toegang meer heeft tot dashboarden!

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