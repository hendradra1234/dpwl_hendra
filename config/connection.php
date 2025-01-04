<?php
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "dpwl_hendra";

    $conn = mysqli_connect(
        $db_host,
        $db_user,
        $db_pass,
        $db_name
    );

    if (mysqli_connect_error()) {
        echo "Failed to Establish Connection to DB: ".mysqli_connect_error();
    }
?>