<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <?php include "../include/link.php" ?>
</head>
<body>
    <div id="skip">
            <a href="#header">헤더 영역 바로가기</a>
            <a href="#main">컨텐츠 영역 바로가기</a>
            <a href="#footer">푸터 영역 바로가기</a>
        </div>
        <!-- //skip -->

        <?php include "../include/header.php" ?>
        <!-- //header -->

        <main id="main">
        <section id="board" class="container">
            <h2>게시판 영역입니다.</h2>
            <div class="board__inner">
                <div class="board__title">
                    <h3>게시판</h3>
                    <p>웹 디자이너, 웹 퍼블리셔, 프론트앤드 개발자를 위한 게시판 입니다.</p>
                </div>
                <div class="board__view">
                    <table>
                        <colgroup>
                            <col style="width: 20%">
                            <col style="width: 80%">
                        </colgroup>
                        <tbody>
<?php
    $myBoardID = $_GET['myBoardID'];

    // echo $myBoardID;

    $sql = "SELECT b.boardTitle, m.youName, b.regTime, b.boardView, b.boardContents FROM myBoard b JOIN myMember m ON(m.myMemberID = b.myMemberID) WHERE b.myBoardID = {$myBoardID}";
    $result = $connect -> query($sql);


    // 보드 뷰 + 1 (UPDATE 활용)
    $sql = “UPDATE myBoard SET boardView = boardView + 1 WHERE myBoardID = {$myBoardID}“;
    $connect -> query($sql);


    if($result){
        $info = $result -> fetch_array(MYSQLI_ASSOC);
        

        // echo "<pre>";
        // var_dump($info);
        // echo "</pre>";

        echo "<tr><th>제목</th><td>".$info['boardTitle']."</td></tr>";
        echo "<tr><th>등록자</th><td>".$info['youName']."</td></tr>";
        echo "<tr><th>등록일</th><td>".date('Y-m-d H:i', $info['regTime'])."</td></tr>";
        echo "<tr><th>조회수</th><td>".$info['boardView']."</td></tr>";
        echo "<tr><th>내용</th><td class='height'>".$info['boardContents']."</td></tr>";
    }
?>
                            <!-- <tr>
                                <th>등록자</th>
                                <td>오란씨</td>
                            </tr>
                            <tr>
                                <th>날짜</th>
                                <td>2022-09-22</td>
                            </tr>
                            <tr>
                                <th>조회수</th>
                                <td>74</td>
                            </tr>
                            <tr>
                                <th>내용</th>
                                <td class="height">
                                    내 마음의 밝은 미소 <br>
                                    <br>
                                    <br>
                                    삶이 아무리 힘들고 지칠 지라도 <br>
                                    그 삶이 지칠 줄 모르고 새로운 용기와 희망으로 <br>
                                    끊임없이 샘솟아나게 합니다. <br>
                                    <br>
                                    일상 생활에서 힘이 들고 지칠 때에는 <br>
                                    내 모든 것을 이해하고 감싸주시던 어머니의 <br>
                                    따뜻한 사랑으로 미소 지으며 어루만져 주시던 <br>
                                    그 기억들을 생각하고 그것을 마음에 담아보십시오.
                                    <br>
                                    그리고 <br>
                                    내 자신의 삶이 불안해질 때마다 <br>
                                    아버지의 굳은 의지의 삶을 생각하며 <br>
                                    온 가족에게 보여주셨던 믿음직한 웃음을 <br>
                                    가슴에 담아 보십시오. <br>
                                    그러면 어느새 마음은 새로운 평화를 느끼고 <br>
                                    든든함을 얻게 될 것입니다. <br>
                                    <br>
                                    이처럼 <br>
                                    가슴에서 순간, 순간 그리는 마음은 <br>
                                    나를 사랑해 주시던 이들의 웃음으로 인해 <br>
                                    새로운 빛과 용기를 일으키게 되므로 <br>
                                    '밝은 미소'는 생활의 여유로움을 가져다주는 <br>
                                    삶의 샘물과도 같은 것이랍니다. <br>
                                    <br>
                                    나에게 주어진 삶 중에서-나를 바라보며 나의 못난 모습까지도 <br>
                                    웃음으로 감싸줄 수 있다면 <br>
                                    그것은 분명히 나의 행복일 것이며 <br>
                                    나 또한 나를 사랑하는 사람에게 <br>
                                    함박 웃음으로 힘이 되고 싶은 마음이 <br>
                                    무한정 일어날 것입니다. <br>
                                    <br>
                                    - "내 인생의 삶" 중에서-
                                </td>
                            </tr> -->
                        </tbody>
                    </table>
                </div>
                <div class="board__btn">
                    <a href="boardModify.php?myBoardID=<?=$myBoardID?>">수정하기</a>
                    <a href="boardRemove.php?myBoardID=<?=$myBoardID?>" onclick="alert('정말 삭제하시겠습니까?')">삭제하기</a>
                    <a href="board.php">목록보기</a>
                </div>
            </div>
        </section>
        <!-- //board -->
        </main>
        <!-- //main -->

        <?php include "../include/footer.php" ?>
        <!-- //footer -->

</body>
</html>