<?php
    // 로그인을 안 했을 경우,
    if( !isset($_SESSION['myMemberID'])){
        // 로그인 페이지로 이동
        Header("Location: ../main/alert.php");
        // echo "로그인을 먼저 해주세요!"; 
    };
?>