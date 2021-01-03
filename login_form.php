<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Outdoor - Login</title>
    <link rel="stylesheet" href="./css/common.css">
    <link rel="stylesheet" href="./css/login.css">
</head>

<body>
    <header>
        <?php include "./header.php"; ?>
    </header>

    <section>
        <div id="main_content">
                <div id="login_box">
                    <div id="login_title">
                        <span>로그인</span>
                    </div>
                    <div id="login_form">
                        <form id="login_excute" name="login_form" action="login_ok.php" method="post">
                            <ul>
                                <li><input type="text" name="id" placeholder="아이디 입력"></li>
                                <li><input type="password" name="pass" placeholder="비밀번호 입력"></li>
                            </ul>
                            <div id="login_btn">
                                <button class="login_btn" type="button" onclick="check_input();">로그인</button>
                                <button type="button" onclick="location.href='./member_form.php'">회원가입</button>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </section>

    <footer>
        <?php
            include "./footer.php";
        ?>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="./js/login.js"></script>
</body>

</html>