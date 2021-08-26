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
            <script src="../assets/plugins/ckeditor/ckeditor.js"></script>
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
                                <p><b>Mededeling aanmaken</b></p>
                                <hr>
                                <form action="../system/classes/insert.php" method="post">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Titel mededeling</label>
                                        <input name="titel" id="titel" class="form-control" rows="1">
                                    </div><br>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Bericht Mededeling</label>
                                        <textarea name="editor" id="editor" class="form-control" rows="3"></textarea>
                                        <script>
                                            CKEDITOR.replace('editor');
                                        </script>
                                    </div><br><br>
                                    <h5>Voeg een alert toe (niet verplicht!)</h5>
                                    <hr>
                                    <br>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Gebruik een alert:</label><br>
                                        <select name="show_alert" id="show_alert">
                                            <option value="0">Nee</option>
                                            <option value="1">Ja</option>
                                        </select>
                                    </div><br>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Als je een alert gebruikt (Selecteer type alert)</label><br>
                                        <select name="alert_type" id="alert_type">
                                            <option value="info">Blauw</option>
                                            <option value="warning">Geel</option>
                                            <option value="danger">Rood</option>
                                            <option value="success">Groen</option>
                                        </select>
                                    </div><br>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Als je een alert gebruikt (Alert bericht)</label>
                                        <textarea name="editor2" id="editor2" class="form-control" rows="3"></textarea>
                                        <script>
                                            CKEDITOR.replace('editor2');
                                        </script>
                                    </div><br>
                                    <button type="submit" class="btn btn-primary">Aanmaken</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="bg-widget2">
                            <div class="bg-widget3">
                                <p><b>Mededelingen aanmaken</b></p>
                                <hr>
                                Bij het aanmaken van een mededeling kan je de volgende dingen doen:
                                <ul>
                                    <li>Je kunt HTML opmaak gebruiken.</li>
                                    <li>Je kan een alert in een Mededeling gebruiken.</li>
                                </ul>

                                Om een alert te kunnen gebruiken moet je eerst een alert type gebruiken. Deze zijn:
                                <ul>
                                    <li>Info: Informatie (Blauw)</li>
                                    <li>Warning: Waarschuwing (Geel)</li>
                                    <li>Danger: Gevaar (Rood)</li>
                                    <li>Success: Gelukt (Groen)</li>
                                </ul>
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