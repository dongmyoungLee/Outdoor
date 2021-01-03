<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>관리자 페이지</title>
    <link rel="stylesheet" href="./css/common.css">
    <link rel="stylesheet" href="./css/admin.css">
</head>

<body>
    <header>
        <?php include "./header.php"; ?>
    </header>
<?php
    if($userid != "admin"){
        echo ("
            <script>
                alert('관리자가 아닙니다.');
                history.go(-1);
            </script>
        ");
    }
    include "./db_con.php";

    $sql = "select * from register order by num desc";
    $result = mysqli_query($con, $sql);
    $total_record = mysqli_num_rows($result); // 행 데이터의 개수

    $number = $total_record; // 전체 회원 수
?>     
    <section>
        <div id="admin_box">
            <h2>관리자 페이지 (회원관리)</h2>
            <ul id="member_list">
                <li>
                    <span class="field1">번호</span>
                    <span class="field2">아이디</span>
                    <span class="field3">이름</span>
                    <span class="field4">가입일</span>
                    <span class="field6">삭제</span>
                </li>
<?php
    while($row = mysqli_fetch_array($result)){
        $num = $row["num"];
        $id = $row["id"];
        $name = $row["name"];
        $register_day = $row["register_day"];
?>
                <li>
                    <form name="member_list" action="./admin_member_modify.php?num=<?=$num?>" method="post">
                        <span class="field1"><?=$number?></span>
                        <span class="field2"><?=$id?></span>
                        <span class="field3"><?=$name?></span>
                        <span class="field4"><?=$register_day?></span>
                        <span class="field5"><button type="button" onclick="location.href='./admin_member_delete.php?num=<?=$num?>'">삭제</button></span>
                    </form>
                </li>
<?php
        $number--;
    }
?>
            </ul>

            <h2>관리자 페이지(게시글 관리)</h2>
            
            <form action="admin_board_delete.php" method="post">
                <ul id="board_list">
                    <li>
                        <span class="board1">선택</span>
                        <span class="board2">번호</span>
                        <span class="board3">이름</span>
                        <span class="board4">제목</span>
                        <span class="board5">첨부파일</span>
                        <span class="board6">작성일</span>
                    </li>
<?php
    $sql = "select * from board order by num desc";
    $result = mysqli_query($con, $sql);
    $total_record = mysqli_num_rows($result);

    $number = $total_record; // 게시판 리스트에 표시하기 위한 연속된 숫자(내림차순)

      while($row = mysqli_fetch_array($result)){
      $num = $row["num"];  //게시글의 고유 번호
      $name = $row["name"];
      $subject = $row["subject"];
      $file_name = $row["file_name"];
      $regist_day = substr($row["regist_day"], 0, 10);
    
?>
                    <li>
                        <span class="board1"><input type="checkbox" name="unit[]" value="<?=$num?>"></span>
                        <span class="board2"><?=$number?></span>
                        <span class="board3"><?=$name?></span>
                        <span class="board4"><?=$subject?></span>
                        <span class="board5"><?=$file_name?></span>
                        <span class="board6"><?=$regist_day?></span>
                    </li>
<?php
        $number--;
    }
    
?>
                </ul>
                <button class="sel_del" type="submit">선택 항목 삭제</button>
            </form>

            <h2>관리자 페이지(대여 등록건)</h2>
            
            <form action="admin_sell_delete.php" method="post">
                <ul id="sell_list">
                    <li>
                        <span class="board1">선택</span>
                        <span class="board2">ID</span>
                        <span class="board3">이름</span>
                        <span class="board4">제품이름</span>
                        <span class="board5">기간</span>
                        <span class="board6">최종가격</span>
                        <span class="board7">계좌번호</span>
                        <span class="board8">판매등록일</span>
                    </li>
<?php
    $sql = "select * from sell order by num desc";
    $result = mysqli_query($con, $sql);
    $total_record = mysqli_num_rows($result);

    $number = $total_record; // 게시판 리스트에 표시하기 위한 연속된 숫자(내림차순)

      while($row = mysqli_fetch_array($result)){
      $num = $row["num"];  //게시글의 고유 번호
      $id = $row["id"];
      $name = $row["name"];
      $title = $row["title"];
      $lastprice = $row["lastprice"];
      $money = $row["money"];
      $register_day = $row["register_day"];

      $gram = $row["gram"];

      if($gram == "0"){
          $gram = "1박 2일";
      }else if($gram == "12000"){
          $gram = "2박 3일";
      }else if($gram == "23000"){
          $gram = "3박 4일";
      }
?>
                    <li>
                        <span class="board1"><input type="checkbox" name="unit[]" value="<?=$num?>"></span>
                        <span class="board2"><?=$id?></span>
                        <span class="board3"><?=$name?></span>
                        <span class="board4"><?=$title?></span>
                        <span class="board5"><?=$gram?></span>
                        <span class="board6"><?=$lastprice?></span>
                        <span class="board7"><?=$money?></span>
                        <span class="board8"><?=$register_day?></span>
                    </li>
<?php
        $number--;
    }
   
?>
                </ul>
                <button class="sel_del" type="submit">선택 항목 대여 성사 완료</button>
            </form>

            <h2>관리자 페이지(대여 요청건)</h2>
            
            <form action="admin_buy_delete.php" method="post">
                <ul id="sell_list">
                    <li>
                        <span class="board1">선택</span>
                        <span class="board2">ID</span>
                        <span class="board3">이름</span>
                        <span class="board4">제품이름</span>
                        <span class="board5">기간</span>
                        <span class="board6">최종가격</span>
                        <span class="board8">구매 요청일</span>
                    </li>
<?php
    $sql = "select * from buy order by num desc";
    $result = mysqli_query($con, $sql);
    $total_record = mysqli_num_rows($result);

    $number = $total_record; // 게시판 리스트에 표시하기 위한 연속된 숫자(내림차순)

      while($row = mysqli_fetch_array($result)){
      $num = $row["num"];  //게시글의 고유 번호
      $id = $row["id"];
      $name = $row["name"];
      $title = $row["title"];
      $lastprice = $row["lastprice"];
      $regist_day = $row["regist_day"];

      $gram = $row["gram"];

      if($gram == "0"){
          $gram = "1박 2일";
      }else if($gram == "12000"){
          $gram = "2박 3일";
      }else if($gram == "23000"){
          $gram = "3박 4일";
      }
?>
                    <li>
                        <span class="board1"><input type="checkbox" name="unit[]" value="<?=$num?>"></span>
                        <span class="board2"><?=$id?></span>
                        <span class="board3"><?=$name?></span>
                        <span class="board4"><?=$title?></span>
                        <span class="board5"><?=$gram?></span>
                        <span class="board6"><?=$lastprice?></span>
                        <span class="board8"><?=$register_day?></span>
                    </li>
<?php
        $number--;
    }
    mysqli_close($con);
?>
                </ul>
                <button class="sel_del" type="submit">선택 항목 대여 성사 완료</button>
            </form>
        </div>
    </section>
    <footer>
         <?php include "./footer.php"; ?>
    </footer>
</body>

</html>