<?php
	$id = $_GET["id"];
	$pass = $_POST["pass_modi"];  



	include "./db_con.php";

	$sql = "update register set pass='$pass'";
	$sql .= "where id='$id'";

	mysqli_query($con, $sql);

	// 세션상태 초기화
	$sql2 = "select * from register where id='$id'";
	$result = mysqli_query($con, $sql2);
	$row = mysqli_fetch_array($result);  //id, name, pass, email, level, point

	var_dump($row["name"]);  //위에서 업데이트가 종료된 값을 가져옴

	session_start();
	$_SESSION["username"] = $row["name"];
	mysqli_close($con);

	echo ("
		<script>
			location.href='index.php';
		</script>
	");





?>