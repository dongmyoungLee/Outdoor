<link rel="stylesheet" href="./css/common.css">
<?php
    $cur_year = date("Y");
?>
    <div id="footer">
        <div id="footer_wrap_01">
            <div id="footer_img">
                <a href="./index.php"><img src="./img/logo1.jpg" alt="footer_logo"></a>
            </div>
            <div id="footer_info">
                <a href="#"><span>이용약관</span></a>
                <a href="#"><span>전자금융거래이용약관</span></a>
                <a href="#"><span>개인정보처리방침</span></a>
            </div>
            <div id="footer_content">
                <p id="footer_cont">All rights reserved <?= $cur_year ?> &copy; <span>Outdoor</span></p>
            </div>
        </div>
        <div id="footer_wrap_02">
            <div class="info_01">
                <h3>GUIDE MENU</h3>
                <ul>
                    <li><a href="./board_list.php">공지사항</a></li>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="./introduce_page.php">이용안내</a></li>
                    <li><a href="./introduce_page.php">회사소개</a></li>
                </ul>
            </div>
            <div class="info_02">
                <h3>HELP</h3>
                <ul>
                    <li><span>02-123-4657</span></li>
                    <li><span>평일 11:00~17:00</span></li>
                    <li><span>점심 12:00~13:00</span></li>
                    <li><span>토/일, 공휴일 휴무</span></li>
                </ul>
            </div>
        </div>
    </div>
