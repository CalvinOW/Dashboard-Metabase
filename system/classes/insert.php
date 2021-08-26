<?php
require_once "../config/config.php";
 
$titel = mysqli_real_escape_string($db, $_REQUEST['titel']);
$editor = mysqli_real_escape_string($db, $_REQUEST['editor']);
$alert_type = mysqli_real_escape_string($db, $_REQUEST['alert_type']);
$editor2 = mysqli_real_escape_string($db, $_REQUEST['editor2']);
$show_alert = mysqli_real_escape_string($db, $_REQUEST['show_alert']);
 
$sql = "INSERT INTO updates (titel, updates, show_alert, alert_type, alert) VALUES ('$titel', '$editor', '$show_alert', '$alert_type', '$editor2')";
if(mysqli_query($db, $sql)){
    header("location: /admin/mededeling.php");
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}
 
mysqli_close($db);
?>