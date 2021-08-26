<?php
require_once "../config/config.php";
 
$titel = mysqli_real_escape_string($db, $_REQUEST['titel']);
$url = mysqli_real_escape_string($db, $_REQUEST['url']);
$user_id = mysqli_real_escape_string($db, $_POST['user_id']);
 
$sql = "INSERT INTO mijndashboard (url, userid, titel) VALUES ('$url', '$user_id', '$titel')";
if(mysqli_query($db, $sql)){
    header("location: /admin/personeel_dashboard_toevoegen.php");
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}
 
mysqli_close($db);
?>