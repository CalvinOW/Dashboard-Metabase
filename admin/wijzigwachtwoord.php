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
            <title>Omnius Metabase - Admin</title>   <link rel="icon" type="image/png" href="../assets/images/favicon.ico">
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
                                <p><b>Gebruiker aanpassen</b></p>
                                <hr>
                                <?php
                                include_once '../system/config/config.php';
                                

                                $result = mysqli_query($db, "SELECT * FROM users WHERE id='" . $_GET['id'] . "'");
                                $row = mysqli_fetch_array($result);

                                if (count($_POST) > 0) {
                                    if(empty(trim($_POST["password"]))){
                                        $new_password_err = "Please enter the new password.";     
                                    } elseif(strlen(trim($_POST["password"])) < 6){
                                        $new_password_err = "Password must have atleast 6 characters.";
                                    } else{
                                        $new_password = trim($_POST["password"]);
                                    }
                                    
                                    if(empty(trim($_POST["repassword"]))){
                                        $confirm_password_err = "Please confirm the password.";
                                    } else{
                                        $confirm_password = trim($_POST["repassword"]);
                                        if(empty($new_password_err) && ($new_password != $confirm_password)){
                                            $confirm_password_err = "Password did not match.";
                                        }
                                    }
                                        
                                    if(empty($new_password_err) && empty($confirm_password_err)){
                                        $sql = "UPDATE users SET password = ? WHERE id =?";
                                        
                                        if($stmt = mysqli_prepare($db, $sql)){
                                            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);
                                            
                                            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
                                            $param_id = $_POST["id"];
                                            
                                            if(mysqli_stmt_execute($stmt)){
                                                echo '<a class="btn btn-success" href="editgebruikers.php"><span class="fa fa-arrow-left"></span> Ga terug</a>';
                                                exit();
                                            } else{
                                                echo "Oops! Something went wrong. Please try again later.";
                                            }
                                
                                            mysqli_stmt_close($stmt);
                                        }
                                    }
                                    
                                    mysqli_close($db);
                                }
                                ?>
                                <form name="frmUser" method="post" action="">
                                    <div><?php if (isset($message)) {
                                                echo '<div class="alert alert-success" role="alert">' . $message . '</div>';
                                            } ?>
                                    </div>
                                    ID: <br>
                                    <input type="hidden" name="id" class="txtField" value="<?php echo $row['id']; ?>">
                                    <input type="text" name="id" value="<?php echo $row['id']; ?>" disabled>
                                    <br>
                                    Wachtwoord: <br>
                                    <input type="password" name="password" class="txtField">
                                    <br>
                                    Herhaal wachtwoord:<br>
                                    <input type="password" name="repassword" class="txtField"><br><br>
                                    <input type="submit" name="submit" value="Update wachtwoord" class="btn btn-danger">

                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="bg-widget2">
                            <div class="bg-widget3">
                                <p><b>Let op!</b></p>
                                <hr>
                                Het invullen van een rank is verplicht aangezien deze anders update naar 0 en de persoon geen toegang meer heeft tot dashboarden!

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