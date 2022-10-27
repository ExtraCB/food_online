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
  <title>History</title>
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
        <h3>History</h3>
        <table class="table hover">
          <tr>
            <th>รูปเมนู</th>
            <th>ชื่อเมนู</th>
            <th>ราคารวม</th>
            <th>จำนวนที่ซื้อ</th>
            <th>วันที่ซื้อ</th>
          </tr>
          <?php
          require('./../services/functions/history.php');
          while ($result_fetch_menu = mysqli_fetch_assoc($query_history)) {
          ?>
          <tr>
            <td><img width="100px" src="./../img/<?= $result_fetch_menu['menu_file'] ?>" alt=""></td>
            <td><?= $result_fetch_menu['menu_name'] ?></td>
            <td><?= $result_fetch_menu['menu_price'] ?></td>
            <td><?= $result_fetch_menu['menu_price'] * $result_fetch_menu['or_count'] ?></td>
            <td><?= $result_fetch_menu['or_timestamp'] ?></td>

          </tr>
          <?php } ?>
        </table>
      </div>
      <div class="col-2">
      </div>
    </div>
  </div>
</body>

</html>