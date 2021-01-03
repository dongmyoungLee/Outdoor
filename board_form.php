<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시판 작성</title>
    <link rel="stylesheet" href="./css/common.css">
    <link rel="stylesheet" href="./css/board.css">
</head>

<body>
    <header>
        <?php
        include "./header.php";
        ?>
    </header>
    <section>

        <div id="board_box">
            <h2 id="board_title">공지사항 작성</h2>
            <form name="board_form" action="board_insert.php" method="post" enctype="multipart/form-data">
                <ul id="board_form">
                    <li>
                        <div class="label">
                            <label for="">이름 : </label>
                        </div>
                        <div class="input">
                            <p><?= $userid ?></p>
                        </div>
                    </li>
                    <li>
                        <div class="label">
                            <label for="subject">제목 : </label>
                        </div>
                        <div class="input">
                            <input type="text" name="subject">
                        </div>
                    </li>
                    <li>
                        <div class="label">
                            <label for="content">내용 : </label>
                        </div>
                        <div class="input">
                            <textarea name="content"></textarea>
                        </div>
                    </li>
                    <li>
                        <div class="label">
                            <label for="upfile">첨부파일 : </label>
                        </div>
                        <div class="input">
                            <input type="file" class="upload" name="upfile">
                        </div>
                    </li>
                    <li>
                        <div class="label">
                            <label for="notice">공지여부 : </label>
                        </div>
                        <div class="input">
                            <select name="notice">
                                <option value="0" selected>일반 게시글</option>
                                <option value="1" selected>공지 게시글</option>
                            </select>
                        </div>
                    </li>
                </ul>

                <ul class="buttons">
                    <li><button type="button" onclick="check_input();">작성 완료</button></li>
                    <li><button type="button" onclick="location.href='board_list.php'">목록 보기</button></li>
                </ul>


            </form>
        </div>

    </section>

    <footer>
        <?php include "./footer.php"; ?>
    </footer>
    <script src="js/board.js"></script>
</body>

</html>