<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Outdoor - 회원정보수정</title>
    <link rel="stylesheet" href="./css/common.css">
    <link rel="stylesheet" href="./css/member_modify.css">
</head>

<body>
    <header>
        <?php include "./header.php"; ?>
    </header>

    <section>

        <?php
        include "./db_con.php";

        $sql = "select * from register where id='$userid'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);

        $pass = $row["pass"];
        $name = $row["name"];
        $email = $row["email"];

        mysqli_close($con);
        ?>


        <div id="main_content">
            <div id="login_box">
                <div id="login_title">
                    <span>정보수정</span>
                </div>
                <div id="login_form">
                    <form name="member_form" action="member_modify.php?id=<?= $userid ?>" method="post">
                        <h3>회원정보</h3>
                        <ul>
                            <li>
                                <span class="label">
                                    <label for="id">아이디</label>
                                </span>
                                <span class="input">
                                    <p><?= $userid ?></p>
                                </span>
                            </li>
                            <li>
                                <span class="label">
                                    <label for="pass">비밀번호</label>
                                </span>
                                <span class="input">
                                    <input type="password" name="pass" placeholder="패스워드 입력" value="<?= $pass ?>" readonly>
                                </span>
                                <span class="modify">
                                    <button type="button" class="modify_btn">변경</button>
                                </span>
                            </li>
                            <li>
                                <span class="label">
                                    <label for="pass_cf">비밀번호 확인</label>
                                </span>
                                <span class="input">
                                    <input type="password" name="pass_cf" placeholder="패스워드 확인 입력" value="<?= $pass ?>" readonly>
                                </span>
                            </li>
                            <li>
                                <span class="label">
                                    <label for="name">이름</label>
                                </span>
                                <span class="input">
                                    <input type="text" name="name" placeholder="이름 입력" value="<?= $name ?>">
                                </span>
                            </li>
                            <li>
                                <span class="label">
                                    <label for="email">E-mail</label>
                                </span>
                                <span class="input">
                                    <input type="email" name="email" placeholder="E-mail 입력" value="<?= $email ?>">
                                </span>
                            </li>
                        </ul>
                        <div id="login_btn">
                            <button type="button" onclick="check_input();">수정하기</button>
                            <button type="button" onclick="reset_form();">취소하기</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <div class="dark"></div>
    <div class="popup">
        <div class="popup_title">
            <h2>비밀번호 변경</h2>
        </div>
        <div class="popup_cont">
            <form name="modi_member_form" action="member_modify_pass.php?id=<?= $userid ?>" method="post" id="pop_modify">
                <ul>
                    <li>
                        <span class="label">
                            <label for="pass">비밀번호</label>
                        </span>
                        <span class="input">
                            <input type="password" name="pass_modi" placeholder="패스워드 입력" >
                        </span>
                    </li>
                    <li>
                        <span class="label">
                            <label for="pass_cf">비밀번호 확인</label>
                        </span>
                        <span class="input">
                            <input type="password" name="pass_cf_modi" placeholder="패스워드 확인 입력">
                        </span>
                    </li>
                </ul>
                <div id="login_btn">
                    <button type="button" onclick="modi_check_input();">수정하기</button>
                </div>
            </form>
        </div>
        <div class="close">×</div>
    </div>
    <footer>
        <?php include "./footer.php"; ?>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="./js/member_form.js"></script>
</body>

</html>