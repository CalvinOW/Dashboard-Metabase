<!DOCTYPE html lang=NL>
<html>
<meta http-equiv="refresh" content="1800;url=logout.php" />
<?php include("../system/config/config.php"); ?>
<?php include("../system/classes/loggedin.php"); ?>

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
    <script language="JavaScript">
      /**
       * Disable right-click of mouse, F12 key, and save key combinations on page
       * By Arthur Gareginyan (https://www.arthurgareginyan.com)
       * For full source code, visit https://mycyberuniverse.com
       */
      window.onload = function() {
        document.addEventListener("contextmenu", function(e) {
          e.preventDefault();
        }, false);
        document.addEventListener("keydown", function(e) {
          //document.onkeydown = function(e) {
          // "I" key
          if (e.ctrlKey && e.shiftKey && e.keyCode == 73) {
            disabledEvent(e);
          }
          // "J" key
          if (e.ctrlKey && e.shiftKey && e.keyCode == 74) {
            disabledEvent(e);
          }
          // "S" key + macOS
          if (e.keyCode == 83 && (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey)) {
            disabledEvent(e);
          }
          // "U" key
          if (e.ctrlKey && e.keyCode == 85) {
            disabledEvent(e);
          }
          // "F12" key
          if (event.keyCode == 123) {
            disabledEvent(e);
          }
        }, false);

        function disabledEvent(e) {
          if (e.stopPropagation) {
            e.stopPropagation();
          } else if (window.event) {
            window.event.cancelBubble = true;
          }
          e.preventDefault();
          return false;
        }
      };
    </script>

    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
      <title>Omnius Metabase - Dashboards</title>
      <link rel="icon" type="image/png" href="../assets/images/favicon.ico">
      <link rel='stylesheet' type='text/css' href='../assets/css/theme.css' />
      <script type='text/javascript' src="https://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
      <script type='text/javascript' src='../assets/js/jquery.ba-hashchange.min.js'></script>
      <script type='text/javascript' src='../assets/js/dynamicpage.js'></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
    </head>


    <body onmousemove="reset_interval()" onclick="reset_interval()" onkeypress="reset_interval()" onscroll="reset_interval()" oncontextmenu="return false;">
      <div class="header">
        <a href="/dash/main.php"><img class="logo" src="../assets/images/logo.png"></a>
        <button id="logout-button" class="btn btn-primary"><ul class="navbar-nav me-auto" style="float: right; text-align: right;">
            <li class="nav-item dropdown" id="profiel">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 18px;">
                <span class="fa fa-user-circle"></span> Profiel
              </a>
              <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarDarkDropdownMenuLink">
                <?php
                if (($perm['can_access_admin'] == 1)) {
                ?>
                  <li><a class="dropdown-item" href="/admin/main.php"><span class="fa fa-cogs"></span> Admin</a></li>
                <?php } ?>
                <li><a class="dropdown-item" href="/dash/logout.php"><span class="fa fa-sign-out"></span> Uitloggen</a></li>
              </ul>
            </li>
          </ul></button>
      </div>

      
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand"></a>
        <button id="toggler" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="/dash/main.php" style="font-size: 18px;"><span class="fa fa-home"></span> Voorpagina</a>
            </li>
            <?php
            if (($perm['can_view_my_dashboard'] == 1)) {
            ?>
              <li class="nav-item active" style="float: right;">
                <a class="nav-link" href="/dash/mijndashboard.php" style="font-size: 18px;"><span class="fa fa-tachometer"></span> Mijn Dashboard</a>
              </li>
            <?php } ?>
            <li class="nav-item active" style="float: right;">
              <a class="nav-link" href="/dash/wachtwoord.php" style="font-size: 18px;"><span class="fa fa-gear"></span> Wachtwoord Wijzigen</a>
            </li>

          </ul>
        </div>
</nav>



    <script>
        const navLinks = document.querySelectorAll('#toggler')
const menuToggle = document.getElementById('navbarSupportedContent')
const bsCollapse = new bootstrap.Collapse(menuToggle, {toggle:false})
navLinks.forEach((l) => {
    l.addEventListener('click', () => { bsCollapse.toggle() })
})
    </script>
      <!-- Start content !-->
      <div class="container-fluid">
        <section id="main-content">
          <div id="guts">
            <div class="row">
              <div class="col-md-12">
                <div class="bg-widget2">
                  <p><b>
                      <script>
                        function myFunction() {
                          // Declare variables
                          var input, filter, ul, li, a, i, txtValue;
                          input = document.getElementById('myInput');
                          filter = input.value.toUpperCase();
                          ul = document.getElementById("dashboarden");
                          li = ul.getElementsByTagName('div');

                          // Loop through all list items, and hide those who don't match the search query
                          for (i = 0; i < li.length; i++) {
                            a = li[i].getElementsByTagName("p")[0];
                            txtValue = a.textContent || a.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                              li[i].style.display = "";
                            } else {
                              li[i].style.display = "none";
                            }
                          }
                        }
                      </script>
                      <span style="float:right"><input class="form-control" type="text" id="myInput" onkeyup="myFunction()" placeholder="Zoek categorie.."></span>
                      <h3>Dashboards</h3>
                    </b></p>
                  <hr>
                  <div class="row" id="dashboarden">

                    <!-- Item voor rol user !-->
                    <?php
                    if (($perm['can_view_management'] == 1)) {
                    ?>
                      <?php
                      require_once "../system/config/config.php";

                      $sql = "SELECT id, url, rank_required, titel, categorie FROM dashboards";
                      $resultset = mysqli_query($db, $sql) or die("database error:" . mysqli_error($db));
                      while ($record = mysqli_fetch_assoc($resultset)) {
                      ?>
                        <?php
                        if (($record['rank_required'] == 4)) {
                        ?>
                          <div class="col-md-3" id="dashboarden">
                            <div class="bg-widget1"><a href="/dash/main.php#dashboard.php?id=<?php echo $record['id']; ?>" style="text-decoration: none;">
                                <p style="font-size: 20px; color: #509ee3;"><span class="fa fa-tachometer" style="font-size: 25px; color: #509ee3;"></span> <?php echo $record['categorie']; ?></p>
                                <p style="color: #38353b" id="dashboardnaam"></span> <?php echo $record['titel']; ?></p>
                              </a>
                            </div>
                          </div>
                        <?php } ?>
                      <?php } ?>
                    <?php } ?>
                    <?php
                    if (($perm['can_view_support'] == 1)) {
                    ?>
                      <?php
                      require_once "../system/config/config.php";

                      $sql = "SELECT id, url, rank_required, titel, categorie FROM dashboards";
                      $resultset = mysqli_query($db, $sql) or die("database error:" . mysqli_error($db));
                      while ($record = mysqli_fetch_assoc($resultset)) {
                      ?>
                        <?php
                        if (($record['rank_required'] == 3)) {
                        ?>
                          <div class="col-md-3" id="dashboarden">
                            <div class="bg-widget1"><a href="/dash/main.php#dashboard.php?id=<?php echo $record['id']; ?>" style="text-decoration: none;">
                                <p style="font-size: 20px; color: #509ee3;"><span class="fa fa-tachometer" style="font-size: 25px; color: #509ee3;"></span> <?php echo $record['categorie']; ?></p>
                                <p style="color: #38353b" id="dashboardnaam"></span> <?php echo $record['titel']; ?></p>
                              </a>
                            </div>
                          </div>
                        <?php } ?>
                      <?php } ?>
                    <?php } ?>
                    <?php
                    if (($perm['can_view_intake'] == 1)) {
                    ?>
                      <?php
                      require_once "../system/config/config.php";

                      $sql = "SELECT id, url, rank_required, titel, categorie FROM dashboards";
                      $resultset = mysqli_query($db, $sql) or die("database error:" . mysqli_error($db));
                      while ($record = mysqli_fetch_assoc($resultset)) {
                      ?>
                        <?php
                        if (($record['rank_required'] == 2)) {
                        ?>
                          <div class="col-md-3" id="dashboarden">
                            <div class="bg-widget1"><a href="/dash/main.php#dashboard.php?id=<?php echo $record['id']; ?>" style="text-decoration: none;">
                                <p style="font-size: 20px; color: #509ee3;"><span class="fa fa-tachometer" style="font-size: 25px; color: #509ee3;"></span> <?php echo $record['categorie']; ?></p>
                                <p style="color: #38353b" id="dashboardnaam"></span> <?php echo $record['titel']; ?></p>
                              </a>
                            </div>
                          </div>
                        <?php } ?>
                      <?php } ?>
                    <?php } ?>
                    <?php
                    if (($perm['can_view_arag'] == 1)) {
                    ?>
                      <?php
                      require_once "../system/config/config.php";

                      $sql = "SELECT id, url, rank_required, titel, categorie FROM dashboards";
                      $resultset = mysqli_query($db, $sql) or die("database error:" . mysqli_error($db));
                      while ($record = mysqli_fetch_assoc($resultset)) {
                      ?>
                        <?php
                        if (($record['rank_required'] == 1)) {
                        ?>
                          <div class="col-md-3" id="dashboarden">
                            <div class="bg-widget1"><a href="/dash/main.php#dashboard.php?id=<?php echo $record['id']; ?>" style="text-decoration: none;">
                                <p style="font-size: 20px; color: #509ee3;"><span class="fa fa-tachometer" style="font-size: 25px; color: #509ee3;"></span> <?php echo $record['categorie']; ?></p>
                                <p style="color: #38353b" id="dashboardnaam"></span> <?php echo $record['titel']; ?></p>
                              </a>
                            </div>
                          </div>
                        <?php } ?>
                      <?php } ?>
                    <?php } ?>
                  </div>


                <?php } ?>
              <?php } ?>
                </div>
              </div>

            </div>
          </div>
        </section>
      </div>
    </body>

    </div>

</html>