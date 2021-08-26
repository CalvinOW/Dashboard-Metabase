<?php include("./system/config/config.php"); ?>
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
        header("location: /system/classes/maintenance.php");
    } ?>
<?php } ?>