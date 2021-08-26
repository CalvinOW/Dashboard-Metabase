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
<?php include("../system/classes/loggedin.php"); ?>
<?php

include "../system/config/config.php"; // Using database connection file here

$id = $_GET['id']; // get id through query string

$del = mysqli_query($db,"delete from dashboards where id = '$id'"); // delete query

if($del)
{
    mysqli_close($db); // Close connection
    header("location: /admin/dashboard_verwijderen.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>
<?php } else {
        header("location: /dash/main.php");
    } ?>
<?php } ?>
<?php } ?>