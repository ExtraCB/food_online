<?php
session_start();
include('./../services/connect.php');
require_once('./../services/functions/securecheck.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Homepage</title>
  <link rel="stylesheet" href="./../bs5/css//bootstrap.min.css">
  <script src="./../bs5/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <?php include('./components/navbar.php') ?>
  <div class="container">
    <div class="row">
      <div class="col-2"></div>
      <div class="col-8">
        <?php include('./components/error.php'); ?>
        <?php
        require('./../services/functions/menutype.php');
        while ($result_fetch_type = mysqli_fetch_assoc($query_type)) {
          $type = $result_fetch_type['mft_id'];
        ?>
        <h3>Menu - <?= $result_fetch_type['mft_name'] ?></h3>
        <table class="table hover">
          <tr>
            <th>รูปเมนู</th>
            <th>ชื่อเมนู</th>
            <th>ราคา</th>
            <th></th>
          </tr>
          <?php
            require('./../services/functions/menuhomepage.php');
            while ($result_fetch_menu = mysqli_fetch_assoc($result_select)) {
            ?>
          <tr>
            <td><img width="100px" src="./../img/<?= $result_fetch_menu['menu_file'] ?>" alt=""></td>
            <td><?= $result_fetch_menu['menu_name'] ?></td>
            <td><?= $result_fetch_menu['menu_price'] ?></td>
            <td>
              <form action="./../services/cart.php" method="get">
                <input type="number" class="form-control" name="menu_quan" id="">
                <input type="hidden" name="menu_name" value="<?= $result_fetch_menu['menu_name'] ?>">
                <input type="hidden" name="menu_file" value="<?= $result_fetch_menu['menu_file'] ?>">
                <input type="hidden" name="menu_price" value="<?= $result_fetch_menu['menu_price'] ?>">
                <input type="hidden" name="menu_id" value="<?= $result_fetch_menu['menu_id'] ?>">
                <input type="submit" value="เพิ่มเมนู" class="btn btn-outline-primary">
              </form>
            </td>

          </tr>
          <?php } ?>
        </table>
        <?php } ?>
      </div>
      <div class="col-2">
      </div>
    </div>
  </div>
</body>

</html>