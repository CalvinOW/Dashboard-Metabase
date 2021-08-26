<?php
require_once "../config/config.php";
 
$titel = mysqli_real_escape_string($db, $_REQUEST['titel']);
$url = mysqli_real_escape_string($db, $_REQUEST['url']);
$rank_required = mysqli_real_escape_string($db, $_REQUEST['rank_required']);
$categorie = mysqli_real_escape_string($db, $_REQUEST['categorie']);
 
$sql = "INSERT INTO dashboards (url, rank_required, titel, categorie) VALUES ('$url', '$rank_required', '$titel', '$categorie')";
if(mysqli_query($db, $sql)){
    header("location: /admin/dashboard_toevoegen.php");
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}
 
mysqli_close($db);
?>