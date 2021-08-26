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
    if (($record['user_role_id'] == 5)) {
    ?>

        <head>
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
            <title>Omnius Metabase - Admin</title>
            <link rel="icon" type="image/png" href="../assets/images/favicon.ico">
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
                                <p><b>Rechten aanpassen</b></p>
                                <hr>
                                <?php
                                include_once '../system/config/config.php';
                                if (isset($_POST['submit'])) {
                                        $view_mydashboard = empty($_POST['mydashboard']) ? 0 : 1;
                                        $access_admin = empty($_POST['accessadmin']) ? 0 : 1;
                                        $view_management = empty($_POST['management']) ? 0 : 1;
                                        $view_support = empty($_POST['support']) ? 0 : 1;
                                        $view_intake = empty($_POST['intake']) ? 0 : 1;
                                        $view_arag = empty($_POST['arag']) ? 0 : 1;

                                        $sql = "UPDATE permissions SET can_view_my_dashboard='". $view_mydashboard ."', can_access_admin='". $access_admin ."', can_view_management='". $view_management ."', can_view_support='". $view_support ."', can_view_intake='". $view_intake ."', can_view_arag='". $view_arag ."' WHERE id='" . $_GET['id'] . "'";
                                        mysqli_query($db, $sql);
                                        
                                        $message = "Rechten zijn succesvol aangepast!";
                                }
                                $result = mysqli_query($db, "SELECT * FROM permissions WHERE id='" . $_GET['id'] . "'");
                                $row = mysqli_fetch_array($result);
                                ?>
                                <form name="frmUser" method="post" action="">
                                    <div><?php if (isset($message)) {
                                                echo '<div class="alert alert-success" role="alert">' . $message . '</div>';
                                            } ?>
                                    </div>
                                    ID: <br>
                                    <input type="text" name="id" value="<?php echo $row['id']; ?>" disabled>
                                    <br>
                                    Naam: <br>
                                    <input type="text" name="username" class="txtField" value="<?php echo $row['naam']; ?>" disabled>
                                    <br>
                                    Permissies:<br>
                                    <?php
                                    $sql = "select can_view_my_dashboard, can_access_admin, can_view_management, can_view_support, can_view_intake, can_view_arag from permissions WHERE id='" . $_GET['id'] . "'";

                                    if (!mysqli_query($db, $sql)) {
                                        die('Error: ' . mysqli_error($db));
                                    }

                                    $cs = mysqli_query($db, $sql);
                                    while ($resul = mysqli_fetch_array($cs)) {
                                        $view_mydashboard = $resul[0];
                                        $access_admin = $resul[1];
                                        $can_view_management = $resul[2];
                                        $can_view_support = $resul[3];
                                        $can_view_intake = $resul[4];
                                        $can_view_arag = $resul[5];
                                    }
                                    ?>
                                     <input type="checkbox" name="mydashboard" id="mydashboard" value="women" <?php if ($view_mydashboard == "1") echo "checked" ?>>
                                    <label for="radio"> Kan mijn dashboard bekijken</label><br><br>
                                    <input type="checkbox" name="accessadmin" id="accessadmin" value="women" <?php if ($access_admin == "1") echo "checked" ?>>
                                    <label for="radio"> Heeft toegang tot admin</label><br><br>
                                    <input type="checkbox" name="management" id="management" value="women" <?php if ($can_view_management == "1") echo "checked" ?>>
                                    <label for="radio"> Kan management bekijken</label><br>

                                    <input type="checkbox" name="support" id="support" value="women" <?php if ($can_view_support == "1") echo "checked" ?>>
                                    <label for="radio"> Kan support bekijken</label><br>

                                    <input type="checkbox" name="intake" id="intake" value="women" <?php if ($can_view_intake == "1") echo "checked" ?>>
                                    <label for="radio"> Kan intake bekijken</label><br>

                                    <input type="checkbox" name="arag" id="arag" value="women" <?php if ($can_view_arag == "1") echo "checked" ?>>
                                    <label for="radio"> Kan arag bekijken</label><br>


                                    <br><br>
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
                                Het aanpassen van rechten kan grote gevolgen hebben!

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