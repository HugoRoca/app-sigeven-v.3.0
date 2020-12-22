<?php
ob_start();
session_start();

if (!isset($_SESSION["name"])) {
    header("Location: login.html");
} else {
    require 'head.php';

    if ($_SESSION["access"]) {
        ?>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong id="card-header-title"></strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
    } else {

    }
}

require 'footer.php';

?>

<script src="../scripts/user-form.js"></script>

<?php
ob_end_flush();

?>
