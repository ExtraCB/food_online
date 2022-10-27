<?php
session_start();
include('./../services/connect.php');

if (isset($_GET['menu_id'])) {
  $menu_id  = $_GET['menu_id'];

  if (isset($_SESSION['shopping_cart'])) {
    $item_array_id = array_column($_SESSION['shopping_cart'], "item_id");

    if (!in_array($_GET['menu_id'], $item_array_id)) {
      $count = count($_SESSION['shopping_cart']);

      $item_array = array(
        'item_id' =>  $_GET['menu_id'],
        'item_name' => $_GET['menu_name'],
        'item_price' => $_GET['menu_price'],
        'item_file' => $_GET['menu_file'],
        'item_quan' => $_GET['menu_quan']
      );
      $_SESSION['shopping_cart'][$count] = $item_array;
      $_SESSION['success'] = 'เพิ่มสินค้าเรียบร้อย !';
      header('location:./../pages/homepage.php');
    } else {
      $_SESSION['success'] = 'เพิ่มสินค้าเรียบร้อย !';
      header('location:./../pages/homepage.php');
    }
  } else {
    $item_array = array(
      'item_id' =>  $_GET['menu_id'],
      'item_name' => $_GET['menu_name'],
      'item_price' => $_GET['menu_price'],
      'item_file' => $_GET['menu_file']
    );
    $_SESSION['shopping_cart'][0] = $item_array;
    $_SESSION['success'] = 'เพิ่มสินค้าเรียบร้อย !';
    header('location:./../pages/homepage.php');
  }
}


if (isset($_GET['delete'])) {
  foreach ($_SESSION['shopping_cart'] as $key => $value) {
    if ($value['item_id'] == $_GET['menu_id']) {
      unset($_SESSION['shopping_cart'][$key]);
      $_SESSION['success'] = "ลบเมนูสำเร็จ !";
      header('location:./../pages/cart.php');
    }
  }
}

if (isset($_GET['save'])) {
  foreach ($_SESSION['shopping_cart'] as $key => $value) {
    $menu_id = $value['item_id'];
    $menu_count = $value['item_quan'];
    $menu_ownid = $_SESSION['userid'];

    $query_insert = "INSERT INTO `orders`(`or_foodid`, `or_ownid`, `or_count`) VALUES  ($menu_id,$menu_ownid,$menu_count)";
    mysqli_query($conn, $query_insert);
  }
  $_SESSION['success'] = "บันทึกสำเร็จ";
  header('location:./../pages/homepage.php');
}