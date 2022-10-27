<?php
$query_select = "SELECT * FROM foods WHERE menu_id = $menu_id";
$query_select = mysqli_query($conn, $query_select);
$fetch_editmenu = mysqli_fetch_assoc($query_select);
