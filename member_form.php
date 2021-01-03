<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Outdoor - 회원가입</title>
    <link rel="stylesheet" href="./css/common.css">
    <link rel="stylesheet" href="./css/member.css">
</head>

<body>
    <header>
        <?php include "./header.php"; ?>
    </header>

    <section>
        <div id="main_content">
            <div id="login_box">
                <div id="login_title">
                    <span>회원가입</span>
                </div>
                <div id="login_form">
                    <form id="member_excute" name="member_form" action="member_ok.php" method="post">
                        <ul>
                            <li>
                                <span class="label">
                                    <label for="id">아이디</label>
                                    <button type="button" onclick="check_id();">중복체크</button>
                                </span>
                                <span class="input">
                                    <input type="text" name="id" placeholder="아이디 입력">
                                </span>
                            </li>
                            <li>
                                <span class="label">
                                    <label for="pass">비밀번호</label>
                                </span>
                                <span class="input">
                                    <input type="password" name="pass" placeholder="패스워드 입력">
                                </span>
                            </li>
                            <li>
                                <span class="label">
                                    <label for="pass_cf">비밀번호 확인</label>
                                </span>
                                <span class="input">
                                    <input type="password" name="pass_cf" placeholder="패스워드 확인 입력">
                                </span>
                            </li>
                            <li>
                                <span class="label">
                                    <label for="name">이름</label>
                                </span>
                                <span class="input">
                                    <input type="text" name="name" placeholder="이름 입력">
                                </span>
                            </li>
                            <li>
                                <span class="label">
                                    <label for="email">E-mail</label>
                                </span>
                                <span class="input">
                                    <input type="email" name="email" placeholder="E-mail 입력">
                                </span>
                            </li>
                        </ul>
                        <div id="login_btn">
                            <button type="button" onclick="check_input();">회원가입</button>
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
    <script src="./js/member_form.js"></script>
</body>

</html>