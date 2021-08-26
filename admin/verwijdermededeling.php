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
                    <?php
                    require_once "../system/config/config.php";
                    $sql = "SELECT id, titel, updates, show_alert, alert_type, alert FROM updates ORDER BY id DESC LIMIT 100";
                    $resultset = mysqli_query($db, $sql) or die("database error:" . mysqli_error($db));
                    while ($record = mysqli_fetch_assoc($resultset)) {
                    ?>

                        <div class="col-md-8">
                            <div class="bg-widget4">
                                <p><b><?php echo $record['titel']; ?></b></p>
                                <hr>
                                <?php
                                if (($record['show_alert'] == 1)) { ?>
                                    <div class="alert alert-<?php echo $record['alert_type']; ?> alert-dismissible fade show" role="alert">
                                        <?php echo $record['alert']; ?>
                                    </div>
                                <?php } else { ?>
                                <?php } ?>
                                <?php echo $record['updates']; ?><br><br>
                                <a style="color: red; height: 50px; align: right;" href="verwijder-mededeling.php?id=<?php echo $record['id']; ?>"><button class="btn btn-danger"><span class="fa fa-trash"></span> Verwijderen</button></a>
                                </p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
        </body>
        </div>

</html>
<?php } else {
        header("location: /dash/main.php");
    } ?>
<?php } ?>
<?php } ?>