<?php
if (!isset($_SESSION['userid'])) {
  $_SESSION['error'] = 'โปรด Login ก่อนใช้งาน !';
  header('location:./../pages/login.php');
}