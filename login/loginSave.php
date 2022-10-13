<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/style.min.css">

    <!-- META -->
    <meta name="author" content="oranssy">
    <mata name="description" content="PHP 사이트 만들기 튜토리얼 입니다.">
    <meta name="keyword" content="사이트, 만들기, 튜토리얼, 오란씨">
    <mata name="robots" content="all">

    <!-- 아이콘 -->
    <link rel="icon" href="../assets/img/icon_256.png" />
    <link rel="shortcut icon" href="../assets/img/icon_256.png" />
    <link rel="icon" type="image/png" sizes="256x256" href="../assets/img/icon_256.png" />
    <link rel="icon" type="image/png" sizes="192x192" href="../assets/img/icon_192.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/img/icon_32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/img/icon_16.png" />

</head>

<!-- <body class="fixed"> -->
<body>

    <div id="skip">
        <a href="#main">컨텐츠 영역 바로가기</a>
        <a href="#footer">푸터 영역 바로가기</a>
    </div>
    <!-- //skip -->

    <header id="header">
        <div class="header__inner container">
            <div class="left">
                <ul>
                    <li>
                        <a href="#" class="star"></a>
                    </li>
                </ul>
            </div>
            <!-- //left -->

            <h1><a href="#">PHP BLOG</a></h1>
            <div class="right">
                <ul>
                    <li><a href="#">로그인</a></li>
                    <li><a href="joinAgree.html">회원가입</a></li>
                </ul>
            </div>
            <!-- //right -->

            <nav class="nav">
                <ul>
                    <li><a href="#">로그인</a></li>
                    <li><a href="#">블로그</a></li>
                    <li><a href="#">로그아웃</a></li>
                    <li><a href="#">연락처</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <!-- //header -->

    <main id="main">
        <section id="banner">
            <h2>로그인 페이지 입니다.</h2>
            <div class="banner__inner2 container">
                <div class="img">
                    <img src="../assets/img/banner_img02.svg" alt="배너 이미지">
                </div>
                <div class="desc">
<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    $youEmail = $_POST['youEmail'];
    $youPass = $_POST['youPass'];

    // echo $youEmail, $youPass;

    // 로그인 했다는 증거? DB 가 아니라 내 컴퓨터에 저장해놓아야 함
    // 로그인 정부 --> 쿠키 / 서버 - 세션 / 리덕스  (보안이 약함, 누군가가 와서 볼 수 있음)


    function msg($alert){
        echo "<p class='alert'>{$alert}</p>";
    }

    // 이메일 검사
    if( !filter_var($youEmail, FILTER_VALIDATE_EMAIL)){
        msg("이메일 형식이 잘못되었습니다. <br> 이메일을 다시 확인해주세요.");
        exit;
    }

    // 비밀번호 검사
    if($youPass == null || $youPass == ''){
        msg("비밀번호를 입력해주세요!");
        exit;
    }

    // 데이터 가져오기 --> 데이터 유효성 검사 --> 데이터 조회 --> 로그인
    $sql = "SELECT myMemberID, youEmail, youName, youPass FROM myMember WHERE youEmail = '$youEmail' AND youPass = '$youPass'";
    $result = $connect -> query($sql);

    if($result){
        $count = $result -> num_rows;

        if($count == 0){
            msg("이메일 또는 비밀번호가 틀렸습니다.");
            
        } else {
            $info = $result -> fetch_array(MYSQLI_ASSOC);

            $_SESSION['myMemberID'] = $info['myMemberID'];
            $_SESSION['youEmail'] = $info['youEmail'];
            $_SESSION['youName'] = $info['youName'];

            // echo "<pre>";
            // var_dump($info);
            // echo "</pre>";

            Header("Location: ../main/main.php");
        }
    } else {
        msg("에러 발생 - 관리자에게 문의하세요.");
    }


?>
                </div>
            </div>
        </section>
        <!-- //banner -->
    </main>
    <!-- //main -->

    <?php include "../include/footer.php" ?>
    <!-- //footer -->

    <?php include "../login/login.php" ?>
    <!-- //login -->

    <!-- script -->
    <script src="../assets/js/custom.js"></script>

</body>
</html>