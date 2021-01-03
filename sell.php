<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Outdoor - 대여해주기</title>
    <link rel="stylesheet" href="./css/common.css">
    <link rel="stylesheet" href="./css/sell.css">
</head>


<body>
    <header>
        <?php include "./header.php"; ?>
    </header>
    
<?php
	if(!$userid){
		echo ("
			<script>
				alert('로그인 후 이용 바랍니다.');
				location.href='./login_form.php';
			</script>
		");
		exit;
	}
?>
<?php
        $num = $_GET["num"];


        include "./db_con.php";

        $sql = "select * from register where id='$userid'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);

        $pass = $row["pass"];
        $name = $row["name"];
        $email = $row["email"];

        $sql2 = "select * from products where num='$num'";
        $result2 = mysqli_query($con, $sql2);
        $row2 = mysqli_fetch_array($result2);

        $title = $row2["title"];
        $price = $row2["price"];
        
?>

    <section>
        <div id="main_content">
            <div id="login_box">
                <div id="login_title">
                    <span>대여해주기 (등록)</span>
                </div>
                <div id="login_form">
                    <form id="sel_excute" name="sell_form" action="sell_ok.php" method="post">
                        <ul>
                            <li>
                                <span class="label">
                                    <label for="id">아이디</label>
                                </span>
                                <span class="input">
                                    <input type="text" name="id" value="<?=$userid?>" readonly>
                                </span>
                            </li>
                            <li>
                                <span class="label">
                                    <label for="name">이름</label>
                                </span>
                                <span class="input">
                                    <input type="text" name="name" value="<?=$name?>" readonly>
                                </span>
                            </li>
                            <li>
                                <span class="label">
                                    <label for="title">제품 이름</label>
                                </span>
                                <span class="input">
                                <input type="text" name="title" value="<?=$title?>" readonly>
                                </span>
                            </li>
                            <li>
                                <span class="label">
                                    <label for="price">제품 대여 가격</label>
                                </span>
                                <span class="input">
                                    <input class="pd_price" name="price" value="<?=$price?>" readonly>
                                </span>
                            </li>
                            <li>
                                <span class="label">
                                    <label for="crush">수령 방법</label>
                                    <select name="crush" id="crush">
                                        <option disabled> - [필수] 옵션선택</option>
                                        <option>택배</option>
                                        <option>픽업</option>
                                    </select>
                                </span>
                                <span class="label">
                                    <label for="gram">기간</label>
                                    <select name="gram" id="gram" disabled>
                                        <option value="" disabled> - [필수] 옵션선택</option>
                                        <option value="0">1박&nbsp;2일</option>
                                        <option value="12000">2박&nbsp;3일(+12,000원)</option>
                                        <option value="23000">3박&nbsp;4일(+23,000원)</option>
                                    </select>
                                </span>
                            </li>
                            <li>
                                <span class="label">
                                    <label for="last_price">최종 가격</label>
                                </span>
                                <span class="input det_total_price" id="last_price">
                                    <!-- <p class="total_price_num"><span></span></p> -->
                                    <input type="text" class="total_price_num" value="" name="last_price" readonly>
                                </span>
                            </li>
                            <li>
                                <span class="label">
                                    <label for="money">&nbsp;정산 받을 계좌(&nbsp;'-' 빼고 숫자만 입력&nbsp;)</label>
                                </span>
                                <span class="input">
                                    <input type="text" name="money">
                                </span>
                            </li>
                        </ul>
                        <div id="login_btn">
                            <button type="button" onclick="check_input();">대여 등록</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <?php include "./footer.php"; ?>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="./js/sell.js"></script>
</body>

</html>