<?php
    $host = "localhost";
    $user = "oranssy";
    $pass = "edu145t#";
    $db = "oranssy";
    $connect = new mysqli($host, $user, $pass, $db);
    $connect -> set_charset("utf8");

    if(mysqli_connect_errno()){
        echo "Database Connect False";
    } else {
        // echo "Database Connect True";
    }
    // 글자가 화면에 뜨기 때문에, 확인 후 가려줌
?>