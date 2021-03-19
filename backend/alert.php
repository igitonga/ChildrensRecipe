<?php
if (isset($_SESSION['error'])) {?>
        <div class="alert alert-danger alert-dismissable text-center" role="alert" >
            <button class="close" data-dismiss="alert">
            <small><sup>x</sup></small>
            </button>
            <?php echo $_SESSION['error'] ?>
        </div>
    <?php

}
unset($_SESSION['error']);



if (isset($_SESSION['success'])) {?>
    <div class="alert alert-success alert-dismissable text-center" role="alert">
        <button class="close" data-dismiss="alert">
        <small><sup>x</sup></small>
        </button>
        <?php echo $_SESSION['success'] ?>
    </div>
<?php
}
unset($_SESSION['success']);
?>