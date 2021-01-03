
<?php
      session_start();
    
      if(isset($_SESSION["userid"])){
          $userid = $_SESSION["userid"];
      }else{
          $userid = "";
      }
  
      if(isset($_SESSION["username"])){
          $username = $_SESSION["username"];
      }else{
          $username = "";
      }
      
?>

<div id="top">
    <div class="frame">
        <div class="rs_wrap">
            <a href="./index.php"><img src="./img/logo1.jpg" alt="logo" class="respon_img"></a>
            <i class="fas fa-bars"></i>
        </div>
        <ul class="menu">
            <div class="close">×</div>
            <div class="left_menu">
                <ul>
                    <li><a href="./product_list.php?subject=Tent">텐트&nbsp;&amp;&nbsp;타프</a></li>
                    <li><a href="./product_list.php?subject=Table">테이블&nbsp;&amp;&nbsp;체어</a></li>
                    <li><a href="./product_list.php?subject=Sleepingbag">침낭&nbsp;&amp;&nbsp;침구류</a></li>
                    <li><a href="./product_list.php?subject=Stove">화로&nbsp;&amp;&nbsp;BBQ</a></li>
                </ul>
            </div>
            <div class="logo">
                <a href="./index.php"><img src="./img/logo1.jpg" alt=""></a>
            </div>
            
            <div class="right_menu">
                <ul>
<?php
                if(!$userid){

                
?>
                    <li><a href="./login_form.php">로그인</a></li>
                    <li><a href="./member_form.php">회원가입</a></li>
<?php
                }else{
                    
                
?>
<?php
    if($userid == "admin"){
                    
?>
                    <li><a href="./admin.php">관리자메뉴</a></li>
<?php
    }
?>
                    <li><a href="./logout.php">로그아웃</a></li>
                    <li><a href="./member_modify_form.php">내 정보</a></li>
<?php
                }
?>
                    <li><a href="./board_list.php">공지사항</a></li>
                    <li><a href="./category_list.php">Community</a></li>
                    <li class="respon_menu"><a href="./category_list.php">이용안내</a></li>
                </ul>
            </div>
            
        </ul>
    </div>
</div>
<div class="dark"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="./js/respon.js"></script>
<script src="https://kit.fontawesome.com/09743b710b.js" crossorigin="anonymous"></script>


