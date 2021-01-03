<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>공지사항 - 상세보기</title>
	<link rel="stylesheet" href="./css/common.css">
   <link rel="stylesheet" href="./css/board.css">
</head>

<body>
	<header>
      <?php include "./header.php"?>
    </header>

   <section>
			<div id="board_box">
			<h2>공지사항 상세보기</h2>
<?php
	$num = $_GET["num"];
	$page = $_GET["page"];

	include "./db_con.php";


	$sql = "select * from board where num ='$num'";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result);

	$id = $row["id"];
	$name = $row["name"];
	$subject = $row["subject"];
	$content = $row["content"];
	$regist_day = $row["regist_day"];
	$hit = $row["hit"];

	$file_name = $row["file_name"];
	$file_type = $row["file_type"];
	$file_copied = $row["file_copied"];

	$new_hit = $hit + 1;

	$sql = "update board set hit='$new_hit' where num='$num'";
	mysqli_query($con, $sql);
?>

				<ul id="view_content">
					<li>
						<span><b>제목 : </b><?=$subject?></span>
						<span><?=$name?> ｜ <?=$regist_day?></span>
					</li>
					<li>
<?php
						if($file_name){
							$real_name = $file_copied;
							$file_path = "./data/".$real_name;
							$file_size = filesize($file_path);
							
							echo "<div> 첨부파일 : $file_name ($file_size Byte) <a  class='down' href='board_download.php?num=$num&real_name=$real_name&file_name=$file_name&file_type=$file_type'>다운로드</a></div>";
						}
						// var_dump($file_name);
						// var_dump($file_path);
						// var_dump($file_size);
?>
						<div>첨부파일
							<a href="">첨부파일명</a>
						</div>
<?php
	
?>

						<p><?=$content?></p>
					</li>
				</ul>

				<ul class="buttons">
					<li>
						<button type="button" onclick="location.href='./board_list.php?page=<?=$page?>'">목록</button>
					</li>
<?php
	if($userid == $id){
?>
					<li>
						<button type="button" onclick="location.href='board_modify_form.php?num=<?=$num?>&page=<?=$page?>'">수정</button>
					</li>
					<li>
						<button type="button" onclick="location.href='./board_delete.php?num=<?=$num?>&page=<?=$page?>'">삭제</button>
						<!-- data 폴더안의 파일이랑 DB 둘다 삭제해줘야함-->
					</li>
<?php
	}
	// 세션의 $userid 존재한다 -> 로그인 상태
	if($userid){

	
?>
					
					<li>
						<button type="button" onclick="location.href='./board_form.php'">작성하기</button>
					</li>
<?php
	}
?>
				</ul>
			</div>
	</section>

	<footer>
			<?php include "./footer.php"; ?>
	</footer>

</body>

</html>