<?php
include('./../services/connect.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menu</title>
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
              <input type="text" name="menu_name" id="" placeholder="Menu Name" class="form-control mb-2">
              <input type="number" name="menu_price" id="" placeholder="Menu Price" class="form-control mb-2">
              <input type="file" name="file" class="form-control" id="" required>
              <?php
              require_once('./../services/functions/menutype.php');
              while ($result_fetch_type = mysqli_fetch_assoc($query_type)) {
              ?>
              <div class="form-check">
                <input type="radio" name="menu_type" id="" class="form-check-input"
                  value="<?= $result_fetch_type['mft_id'] ?>"> <?= $result_fetch_type['mft_name'] ?>
              </div>
              <?php } ?>
              <input type="submit" value="Add Menu" class="btn btn-outline-primary me-3" name="menu_submit">

          </div>
          </form>
        </div>
      </div>
      <div class="col-4"></div>
    </div>

    <div class="row mt-5">
      <div class="col-2"></div>
      <div class="col-8">
        <table class="table">
          <tr>
            <th>รูปภาพเมนู</th>
            <th>รหัสเมนู</th>
            <th>ชื่อเมนู</th>
            <th>จัดการ</th>
          </tr>
          <?php
          require_once('./../services/functions/menumanager.php');
          while ($fetch_menu = mysqli_fetch_assoc($result_select)) { ?>
          <tr>
            <td><img width="100px" src="./../img/<?= $fetch_menu['menu_file'] ?>" alt=""></td>
            <td><?= $fetch_menu['menu_id'] ?></td>
            <td><?= $fetch_menu['menu_name'] ?></td>
            <td>
              <a href="./editmenu.php?menu_id=<?= $fetch_menu['menu_id'] ?>" class="btn btn-warning">Edit</a>
              <a href="./../services/menu.php?delete=1&menu_id=<?= $fetch_menu['menu_id'] ?>"
                class="btn btn-danger">Delete</a>
            </td>

          </tr>
          <?php } ?>
        </table>
      </div>
      <div class="col-2"></div>
    </div>

  </div>
  </div>
</body>

</html>