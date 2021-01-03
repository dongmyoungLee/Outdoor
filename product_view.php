<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>프로그램 상세 페이지</title>
    <link rel="stylesheet" href="./css/common.css">
    <link rel="stylesheet" href="./css/product.css">
</head>

<body>
    <header>
        <?php include "./header.php"; ?>
    </header>

    <?php
    //http://localhost/website/product_view.php?num=10

    $num = $_GET["num"];

    include "./db_con.php";
    $sql = "select * from products where num='$num'";

    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);

    $title = $row["title"];
    $sub = $row["sub"];
    $content = $row["content"];
    $price = number_format($row["price"]);
    $file_copied = "./data/" . $row["file_copied"];
    $hit = $row["hit"];
    $fav = $row["fav"];
    $link = $row["link"];
    $category = $row["category"];

    $new_hit = $hit + 1;
    $sql = "update products set hit='$new_hit'";
    $sql .= "where num='$num'";
    mysqli_query($con, $sql);



    ?>
    <section>
        <div id="product_box">
            <div id="product_detail">
                <div class="pd_view" style="background-image:url(<?= $file_copied ?>);"></div>
                <div class="pd_txt">
                    <h3 class="pd_title"><?= $title ?></h3>
                    <h4 class="pd_sub_title"><?= $sub ?></h4>
                    <p class="pd_content"><?= $content ?></p>
                    <div class="pd_etc">
                        <div class="pd_price"><span><?= $price ?></span>원 / 1박2일</div>
<?php
                    if($userid){

                    
?>
                        <div class="pd_fav" rel='<?= $num ?>'><a href="">좋아요 <span><?= $fav ?></span></a></div>
<?php
                    }
?>
                    </div>
<?php
                    if($category == "Tent"){

                    
?>
                    <div class="preview">
                        <p>[ 제품 설치법  영상 보기 ]</p>
                    </div>
<?php
                    }
?>
        <div id="sub_det">
            <div class="frame">
                <div class="det_box">
                    <div class="det_info">
                        <div class="form_crush">
                            <label for="crush">수령 방법</label>
                            <select name="crush" id="crush">
                                <option disabled> - [필수] 옵션선택</option>
                                <option>택배</option>
                                <option>픽업</option>
                            </select>
                        </div>
                        <p class="result_opt1"></p>
    
                        <div class="form_gram">
                            <label for="gram">기간</label>
                            <select name="gram" id="gram" disabled>
                                <option value="" disabled> - [필수] 옵션선택</option>
                                <option value="0">1박&nbsp;2일</option>
                                <option value="12000">2박&nbsp;3일(+12,000원)</option>
                                <option value="23000">3박&nbsp;4일(+23,000원)</option>
                            </select>
                        </div>
                        <div class="det_total_price">
                            <p class="total_price_tit">총 금액</p>
                            <p class="total_price_num"><span></span>원</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                    <p class="result_opt1"></p>
                    <!-- rel='<?= $num ?> :  의 의미  현재 페이지가 어떤 페이지로 표현 되는가를 인지하게끔 만들어주는 하나의 도구-->
                    <div class="user_btn">
                        <button onclick="location.href='./sell.php?num=<?=$num?>'">대여해주기</button>
                        <button onclick="location.href='./buy.php?num=<?=$num?>'">대여하기</button>
                    </div>
<?php
                if($userid == "admin"){

                
?>
                    <div class="delete">
                        <button onclick="location.href='./product_delete.php?num=<?=$num?>'">삭제하기</button>
                    </div>
<?php
                }
?>
                </div>
            </div>
        </div>
    </section>
    <div class="dark1"></div>
    <div class="popup">
        <div class="cont">
            <div class="fake_dark" onclick="window.open('<?=$link?>');"></div>
            <div class="title">
                <h3>조립 영상</h3>
                <iframe class="movie" src="<?=$link?>" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
        <div class="close1">×</div>
    </div>
    <footer>
        <?php include "./footer.php"; ?>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="./js/product_view.js"></script>
</body>

</html>