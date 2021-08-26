<?php 

include("../config/config.php");
                                        $sql = "UPDATE website_settings SET maintenance = 0";
                                        mysqli_query ($db, $sql);
                                        header("location: /admin/settings.php");
