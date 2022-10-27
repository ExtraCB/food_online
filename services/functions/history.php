<?php
$userid = $_SESSION['userid'];
$query_history = "SELECT * FROM orders,food_types,foods WHERE or_ownid = $userid AND or_foodid = menu_id AND menu_type = mft_id";
$query_history = mysqli_query($conn, $query_history);
