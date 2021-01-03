<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시판 리스트</title>
    <link rel="stylesheet" href="./css/common.css">
    <link rel="stylesheet" href="./css/board.css">
</head>

<body>
    <header>
        <?php include "./header.php" ?>
    </header>

    <section>
        <div id="board_box">
            <h2 id="board_title">자유게시판</h2>
            <ul id="board_list">
                <li>
                    <span class="field_1">번호</span>
                    <span class="field_2">제목</span>
                    <span class="field_3">작성자</span>
                    <span class="field_4">첨부</span>
                    <span class="field_5">작성일</span>
                    <span class="field_6">조회수</span>
                </li>
<?php
    if(isset($_GET["page"])){  //하단의 페이지 넘버 또는 이전/다음을 클릭시
        $page = $_GET["page"];
     }else{  
        $page = 1;
     }
    // 만약 게시글 13개라면 ? 

    include "./db_con.php";
    $sql = "select * from freeboard order by num desc";
    $result = mysqli_query($con, $sql);
    $total_record = mysqli_num_rows($result); // 13

    $scale = 10;  // 각 페이지별로 10개

    if($total_record % $scale == 0){  // 13 % 10 
        $total_page = $total_record / $scale;
    }else{  
        $total_page = floor($total_record / $scale) + 1; // 1 + 1
    }

    $start = ($page - 1) * $scale; 
    $number = $total_record - $start;

    for($i=$start; $i<$start + $scale && $i<$total_record; $i++){
        mysqli_data_seek($result, $i); //가져올 레코드의 위치로 이동(pager를 클릭시 해당하는 결과값을 가져오는데, 각 인덱스번호로 접근하여 가져오기 위함)

        $row = mysqli_fetch_array($result);
        $num = $row["num"];
        $id = $row["id"];
        $name = $row["name"];
        $subject = $row["subject"];
        $regist_day = $row["regist_day"];
        $hit = $row["hit"];
        if($row["file_name"]){  //DB에 첨부파일이 존재한다면 이미지를 보여준다.
            $file_name = "<img src='./img/file.gif'>";
        }else{  //DB에 첨부파일이 존재하지 않다면 이미지 보여주지 않는다.
            $file_name = "";
        }
?>
                <li>
                    <span class="field_1"><?=$number?></span>
                    <span class="field_2"><a href="./free_board_view.php?num=<?=$num?>&page=<?=$page?>"><?=$subject?></a></span>
                    <span class="field_3"><?=$name?></span>
                    <span class="field_4"><?=$file_name?></span>
                    <span class="field_5"><?=$regist_day?></span>
                    <span class="field_6"><?=$hit?></span>
                </li>
            
<?php       
            $number--;
        }
            mysqli_close($con);
?>
            </ul>
            <ul id="page_num">
<?php
    if($total_page >= 2 && $page >= 2){ // 전체페이지가 2 이상이거나 현재페이지가 2이상인경우
        $new_page = $page - 1;
        echo "<li><a href='free_board_list.php?page=$new_page'>◀ 이전</a></li>";
    }else{ // 현재 페이지가 1번인 경우, 전체 페이지가 하나밖에 없을경우
        echo "<li>&nbsp;</li>";
    }

    for($i=1; $i<=$total_page; $i++){
        if($page == $i){
            echo "<li><span class='cur_page'> $i </span></li>";
        }else{
            echo "<li><a href='free_board_list.php?page=$i'> $i </a></li>";
        }
    }

    if($total_page >= 2 && $page != $total_page){
        $new_page = $page + 1;
        echo "<li><a href='free_board_list.php?page=$new_page'>다음 ▶</a></li>";
    }else{
        echo "<li>&nbsp;</li>";
    }
?>               
            </ul>
<?php
    
        if($userid){

?>
            <ul class="button">
                <li class="button_admin">
                    <button id="admin_btn" type="button" onclick="location.href='./free_board_form.php'">작성하기</button>
                </li>
            </ul>
<?php
        }    
?>
        </div>   
    </section>


    <footer>
        <?php include "./footer.php"; ?>
    </footer>
</body>

</html>