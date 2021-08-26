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
                    <div class="col-md-8">
                        <div class="bg-widget2">
                            <div class="bg-widget3">
                                <p><b>Dashboard aanmaken</b></p>
                                <hr>
                                <form action="../system/classes/insert_personeel_dashboard.php" method="post">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Titel Dashboard</label>
                                        <input type="text" name="titel" id="titel" class="form-control" data-mdb-showcounter="true" maxlength="30">
                                    </div><br>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">URL Dashboard</label>
                                        <input type="url" name="url" id="url" class="form-control">
                                    </div><br>
                                    <div class="form-group" style="max-width: 10%">
                                        <select name="user_id" id="user_id">
                                        <label>Gebruiker</label>
                                            <?php
                                            $rank = "SELECT * FROM users";
                                            $resultaat = mysqli_query($db, $rank);
                                            while ($record = mysqli_fetch_assoc($resultaat)) {
                                            ?>
                                                <option value="<?php echo $record['id']; ?>"><?php echo $record['username']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div><br>
                                    <br>
                                    <button type="submit" class="btn btn-primary">Aanmaken</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="bg-widget2">
                            <div class="bg-widget3">
                                <p><b>Persoonlijke Dashboard Toevoegen</b></p>
                                <hr>
                                <b>LET OP!</b> Dit is voor het aanmaken van persoonlijke dashboarden!
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