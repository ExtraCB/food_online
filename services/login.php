<?php
include('./connect.php');
session_start();

if (isset($_POST['login_submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];


  $query_check = "SELECT * FROM users WHERE user_name = '$username' AND user_password = '$password'";
  $result_check = mysqli_query($conn, $query_check);
  $fetch_check = mysqli_fetch_assoc($result_check);


  if (mysqli_num_rows($result_check) != 0) {
    $_SESSION['userid'] = $fetch_check['user_id'];
    $_SESSION['username'] = $fetch_check['user_name'];
    header('location:./../pages/homepage.php');
  } else {
    $_SESSION['error'] =  'Username หรือ password ไม่ถูกต้อง';
    header('location:./../pages/login.php');
  }
}