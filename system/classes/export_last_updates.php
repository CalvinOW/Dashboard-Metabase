<style>
    .card {
        margin-bottom: 25px;
    }
</style>
<?php
error_reporting(0);

require_once "../system/config/config.php";

$sql = "SELECT titel, updates, show_alert, alert_type, alert FROM updates ORDER BY id DESC LIMIT 1";
$resultset = mysqli_query($db, $sql);
while ($record = mysqli_fetch_assoc($resultset)) {
?>
    <div class="col-md-8">
        <div class="bg-widget4">
            <p><b><?php echo $record['titel']; ?></b></p>
            <hr>
            <?php
            if (($record['show_alert'] == 1)) { ?>
                <div class="alert alert-<?php echo $record['alert_type']; ?> alert-dismissible fade show" role="alert">
                    <?php echo $record['alert']; ?>
                </div>
            <?php } else { ?>
            <?php } ?>
            <?php echo $record['updates']; ?>
            </p>
        </div>
    </div>
<?php } ?>