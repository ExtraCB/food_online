<?php
$query_select = "SELECT * FROM foods WHERE menu_type = $type";
$result_select = mysqli_query($conn, $query_select);