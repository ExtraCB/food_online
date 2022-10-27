<?php
include('./connect.php');
session_start();

if (isset($_POST['register_submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $password2 = $_POST['password2'];


  $query_check = "SELECT * FROM users WHERE user_name = '$username'";
  $result_check = mysqli_query($conn, $query_check);

  if ($password !== $password2) {
    $_SESSION['error'] =  'รหัสผ่านยืนยันไม่ตรงกัน ';
    header('location:./../pages/register.php');
  } else {
    if (mysqli_num_rows($result_check) == 0) {
      $query_insert = "INSERT INTO users (user_name,user_password) VALUES ('$username','$password')";
      mysqli_query($conn, $query_insert);
      $_SESSION['success'] = "สมัครสมาชิกสำเร็จ !";
      header('location:./../pages/register.php');
    } else {
      $_SESSION['error'] =  'มี Username นี้ในระบบแล้ว <a href="./login.php">เข้าสู่ระบบ !</a>';
      header('location:./../pages/register.php');
    }
  }
}