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
                                <p><b>Personeel Dashboards</b></p>
                                <hr>
                                <?php
                                include_once '../system/config/config.php';
                                $result = mysqli_query($db, "SELECT * FROM mijndashboard");
                                ?>
                                <?php
                                if (mysqli_num_rows($result) > 0) {
                                ?>
                                    <script>
                                        function myFunction() {
                                            var input, filter, table, tr, td, i;
                                            var input = document.getElementById("myInput");
                                            var filter = input.value.toUpperCase();

                                            var table = document.getElementById("example");
                                            var trList = table.getElementsByTagName("tr");

                                            for (i = 0; i < trList.length; i++) {
                                               
                                                if (filter.length >= 1) {
                                                    var match = false;
                                                    var tdList = trList[i].getElementsByTagName("td");

                                                    for (j = 0; j < tdList.length; j++) {
                                                        var td = tdList[j];

                                                        if (td) {
                                                            if (td.innerText.toUpperCase().indexOf(filter) > -1) {
                                                                match = true;
                                                            }
                                                        }
                                                    }

                                                    if (match == true) {
                                                        trList[i].style.display = "";
                                                    } else {
                                                        trList[i].style.display = "none";
                                                    }
                                                } else {
                                                    trList[i].style.display = "";
                                                }
                                            }
                                        }
                                    </script>
                                    <input class="form-control" type="text" id="myInput" onkeyup="myFunction()" placeholder="Zoek dashboard..">
                                    <table class="table table-hover" style="width: 100%">
                                        <thead>
                                            <tr>
                                                <td>ID</td>
                                                <td>Titel</td>
                                                <td>User ID</td>
                                                <td>Actie</td>
                                            </tr>
                                        </thead>
                                        <tbody id="example">
                                            <?php
                                            $i = 0;
                                            while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $row["id"]; ?></td>
                                                    <td><?php echo $row["titel"]; ?></td>
                                                    <td><?php echo $row["userid"]; ?></td>
                                                    <td><a class="btn btn-danger" href="../system/classes/verwijder_personeel_dashboard.php?id=<?php echo $row["id"]; ?>"><span class="fa fa-trash"></span> Verwijder</a></td>
                                                </tr>
                                            <?php
                                                $i++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                <?php
                                } else {
                                    echo '<div class="alert alert-danger">Geen resultaten gevonden.</div>';
                                }
                                ?>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="bg-widget2">
                            <div class="bg-widget3">
                                <p><b>Let op!</b></p>
                                <hr>
                                Het verwijderen van een dashboard kan niet ongedaan worden!

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