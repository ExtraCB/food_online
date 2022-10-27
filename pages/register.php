<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="./../bs5/css//bootstrap.min.css">
  <script src="./../bs5/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <div class="container">
    <div class="row mt-5">
      <div class="col-4"></div>
      <div class="col-4">
        <?php include('./components/error.php'); ?>
        <div class="card">
          <div class="card-header">Register </div>
          <div class="card-body">
            <form action="./../services/register.php" method="post">
              <input type="text" name="username" id="" placeholder="Username" class="form-control mb-2">
              <input type="text" name="password" id="" placeholder="password" class="form-control mb-2">
              <input type="text" name="password2" id="" placeholder="password-confrim" class="form-control mb-2">
              <div class="d-flex">
                <input type="submit" value="Register" class="btn btn-outline-primary me-3" name="register_submit">
                <a href="./login.php" class="mt-2">เข้าสู่ระบบ !</a>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-4"></div>
    </div>
  </div>
</body>

</html>