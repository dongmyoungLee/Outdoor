<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시판 수정</title>
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
        <h2 id="board_title">게시판 수정</h2>
<?php
    $num = $_GET["num"];
    $page = $_GET["page"];
    

    include "./db_con.php";

    $sql = "select * from freeboard where num='$num'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    

    $name = $row["name"];
    $subject = $row["subject"];
    $content = $row["content"];
    $file_name = $row["file_name"];



?>
            <form name="board_form" action="free_board_modify.php?num=<?=$num?>&page=<?=$page?>" method="post" enctype="multipart/form-data">
                <ul id="board_form">
                    <li>
                        <div class="label">
                            <label for="">이름 : </label>
                        </div>
                        <div class="input">
                            <p><?=$userid?></p><!-- session 으로 받아온 $userid,  $username, DB로부터 받아온 $name -->
                        </div>
                    </li>
                    <li>
                        <div class="label">
                            <label for="subject">제목 : </label>
                        </div>
                        <div class="input">
                            <input type="text" name="subject" value="<?=$subject?>">
                        </div>
                    </li>
                    <li>
                        <div class="label">
                            <label for="content">내용 : </label>
                        </div>
                        <div class="input">
                            <textarea name="content"><?=$content?></textarea>
                        </div>
                    </li>
                    <li>
                        <div class="label">
                            <label for="upfile">첨부파일 : </label>
                        </div>
                        <div class="input">
                            <p class="origin_file"><?=$file_name?></p>
                            <!-- <input type="file" class="upload" name="upfile" value="<?=$file_name?>"> -->
                            <!-- type=file의 경우 value값을 넣을 수 없음-->
                        </div>
                    </li>
                </ul>

                <ul class="buttons">
                    <li><button type="button" onclick="check_input();">수정 완료</button></li>
                    <li><button type="button" onclick="location.href='free_board_list.php?page=<?=$page?>'">목록 보기</button></li>
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