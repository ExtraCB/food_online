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
  <title>Cart page</title>
  <link rel="stylesheet" href="./../bs5/css//bootstrap.min.css">
  <script src="./../bs5/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <?php include('./components/navbar.php') ?>
  <div class="container">
    <div class="row">
      <div class="col-2"></div>
      <div class="col-8">
        <h3>Cart</h3>
        <table class="table hover">
          <tr>
            <th>รูปเมนู</th>
            <th>ชื่อเมนู</th>
            <th>ราคา</th>
            <th>จำนวน</th>
            <th></th>
          </tr>

          <?php if (!empty($_SESSION['shopping_cart'])) {
            $total = 0;
            foreach ($_SESSION['shopping_cart'] as $key => $value) {
              $total = $total + ($value['item_quan'] * $value['item_price']);
          ?>
          <tr>

            <td><img width="100px" src="./../img/<?= $value['item_file']; ?>" alt=""> </td>
            <td><?= $value['item_name']; ?></td>
            <td><?= $value['item_quan'] * $value['item_price']; ?></td>
            <td><?= $value['item_quan'] . " / " . $value['item_price'] ?> </td>

            <td>
              <a href="./../services/cart.php?delete=1&menu_id=<?= $value['item_id']; ?>"
                class="btn btn-outline-danger">ลบ</a>
            </td>
          </tr>
          <?php }
          } else { ?>
          <tr>
            <td align="center" colspan="5">ไม่มีสินค้า</td>
          </tr>
          <?php } ?>
          <tr>
            <td align="center" colspan="5">
              ราคารวม : <?= $total ?>
            </td>
          </tr>
          <tr>
            <td align="center" colspan="5">
              <a href="./../services/cart.php?save=1"><button class="btn btn-outline-success">บันทึก</button></a>
            </td>
          </tr>
        </table>


      </div>
      <div class="col-2">
      </div>
    </div>
  </div>
</body>

</html>