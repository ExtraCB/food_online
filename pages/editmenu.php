<?php
include('./../services/connect.php');
session_start();
if (isset($_GET['menu_id'])) {
  $menu_id = $_GET['menu_id'];
  require_once("./../services/functions/menuedit.php");
} else {
  header('location:./menu.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Menu</title>
  <link rel="stylesheet" href="./../bs5/css//bootstrap.min.css">
  <script src="./../bs5/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <?php include('./components/navbar.php') ?>
  <div class="container">
    <div class="row mt-5">
      <div class="col-4"></div>
      <div class="col-4">
        <?php include('./components/error.php'); ?>
        <div class="card">
          <div class="card-header">Menu </div>
          <div class="card-body">
            <form action="./../services/menu.php" method="post" enctype="multipart/form-data">
              <input type="hidden" name="menu_id" value="<?= $fetch_editmenu['menu_id'] ?>">
              <input type="hidden" name="file_old" value="<?= $fetch_editmenu['menu_file'] ?>">
              <input type="text" name="menu_name" id="" value="<?= $fetch_editmenu['menu_name'] ?>"
                placeholder="Menu Name" class="form-control mb-2">
              <input type="number" name="menu_price" id="" value="<?= $fetch_editmenu['menu_price'] ?>"
                placeholder="Menu Name" class="form-control mb-2">
              <input type="file" name="file" class="form-control" id="">
              <?php
              require_once('./../services/functions/menutype.php');
              while ($result_fetch_type = mysqli_fetch_assoc($query_type)) {
              ?>
              <div class="form-check">
                <input type="radio" name="menu_type" id="" class="form-check-input"
                  value="<?= $result_fetch_type['mft_id'] ?>"> <?= $result_fetch_type['mft_name'] ?>
              </div>
              <?php } ?>
              <input type="submit" value="Edit Menu" class="btn btn-outline-primary me-3" name="edit_menu_submit">

          </div>
          </form>
        </div>
      </div>
      <div class="col-4"></div>
    </div>



  </div>
  </div>
</body>

</html>