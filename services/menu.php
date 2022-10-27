<?php
include('./connect.php');
session_start();

if (isset($_POST['menu_submit'])) {
  $menu_name = $_POST['menu_name'];
  $menu_price = $_POST['menu_price'];
  $menu_type = $_POST['menu_type'];
  $file = $_FILES['file'];

  if ($_FILES['file']['name'] != '') {
    $allow = array("jpg", "png", "jpeg");
    $extension = explode(".", $file['name']);
    $fileExt = strtolower(end($extension));
    $fileNew = rand() . "." . $fileExt;
    $filePath = "../img/" . $fileNew;


    if (in_array($fileExt, $allow)) {
      if ($file['size'] > 0 && $file['error'] == 0) {
        move_uploaded_file($file['tmp_name'], $filePath);
      }
    }
  }

  $query_insert = "INSERT INTO foods (menu_name,menu_type,menu_file,menu_price) VALUES ('$menu_name','$menu_type','$fileNew',$menu_price)";
  mysqli_query($conn, $query_insert);
  $_SESSION['success'] = "เพิ่มเมนูสำเร็จ !";
  header('location:./../pages/menu.php');
}

if (isset($_GET['delete'])) {
  $menu_id = $_GET['menu_id'];

  $query_delete = "DELETE FROM foods WHERE menu_id = $menu_id";
  mysqli_query($conn, $query_delete);
  $_SESSION['success'] = "ลบสำเร็จ !";
  header('location:./../pages/menu.php');
}

if (isset($_POST['edit_menu_submit'])) {
  $menu_id = $_POST['menu_id'];
  $menu_name = $_POST['menu_name'];
  $menu_price = $_POST['menu_price'];
  $menu_type = $_POST['menu_type'];
  $file = $_FILES['file'];
  $fileold = $_POST['file_old'];

  if ($_FILES['file']['name'] != '') {
    $allow = array("jpg", "png", "jpeg");
    $extension = explode(".", $file['name']);
    $fileExt = strtolower(end($extension));
    $fileNew = rand() . "." . $fileExt;
    $filePath = "../img/" . $fileNew;


    if (in_array($fileExt, $allow)) {
      if ($file['size'] > 0 && $file['error'] == 0) {
        move_uploaded_file($file['tmp_name'], $filePath);
      }
    }
  } else {
    $fileNew = $fileold;
  }

  $query_update = "UPDATE foods SET menu_name = '$menu_name',menu_type='$menu_type',menu_file = '$fileNew',menu_price = $menu_price WHERE menu_id =  $menu_id";
  mysqli_query($conn, $query_update);
  $_SESSION['success'] = "อัพเดตเมนูสำเร็จ !";
  header('location:./../pages/menu.php');
}