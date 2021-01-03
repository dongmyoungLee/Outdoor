<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>아이디 중복체크</title>
	<link rel="stylesheet" href="./css/id_check.css">
</head>
<body>
	<h2>아이디 중복체크</h2>
	<div id="idChk_txt">
<?php
        $id = $_GET["id"];
        

		if(!$id){  
			echo ("<p>아이디를 입력해주세요.</p>");
		}else{

			include "./db_con.php";
			$sql = "select * from register where id='$id'";
			$result = mysqli_query($con, $sql);
			$num_record = mysqli_num_rows($result);
			
			if($num_record){  
				echo "<p><b>".$id."</b> 아이디는 중복된 아이디입니다.</p><p>다른 아이디를 사용해 주세요.</p>";
			}else{  
				echo "<p><b>".$id."</b> 아이디는 사용가능합니다.</p>";
			}
			mysqli_close($con);
		}
?>			
	</div>
	<div id="close">
		<button type="button" onclick="self.close();">닫기</button>
	</div>

	
</body>
</html>