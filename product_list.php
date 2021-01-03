<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>product_list.php</title>
    <link rel="stylesheet" href="./css/common.css">
    <link rel="stylesheet" href="./css/product.css">
</head>

<body>
    <header>
<?php
        include "./header.php";
?>
    </header>
    <section>
    <div id="product_box">
<?php
                $category = $_GET["subject"];
?>
            <h2 id="product_title"><?=$category?>&nbsp;List</h2>
            <!-- <div class="total_pd">
                <div class="sort_button">
                    <button class="date_sort">최신순</button>
                    <button class="low_sort">저가순</button>
                    <button class="high_sort">고가순</button>
                    <button class="fav_sort">인기순</button>
                    <select class="sort_sel">
                        <option>선택</option>
                        <option value="date">최신순</option>
                        <option value="low">저가순</option>
                        <option value="high">고가순</option>
                        <option value="fav">인기순</option>
                    </select>
                </div>
            </div> -->
            <ul id="product_list">

<?php
                
                include "./db_con.php";
                $sql = "select * from products where category='$category'";
                //$sql = "select * from board where notice='1' order by num desc";
                $result = mysqli_query($con, $sql);
                $total_record = mysqli_num_rows($result);
                
                
                
                
                for ($i = 0; $i < $total_record; $i++) {
                    mysqli_data_seek($result, $i);
                    $row = mysqli_fetch_array($result);

                    $num = $row["num"];
                    $title = $row["title"];
                    $sub = $row["sub"];
                    $content = $row["content"];
                    $price = number_format($row["price"]);
                    $fav = $row["fav"];
                    $file_copied = "./data/" . $row["file_copied"];
                    $cate = $row["category"];
                    $regist_day = $row["regist_day"];
                
?>
             
                    <li onclick="location.href='product_view.php?num=<?= $num ?>'">
                        <div class="pd_img">
                            <img src="<?= $file_copied ?>" alt="<?= $title ?>">
                        </div>
                        <h3 class="pd_title"><?= $title ?></h3>
                        <p class="pd_sub"><?= $sub ?></p>
                        <div class="pd_info">
                            <div class="pd_price"><span><?= $price ?></span>원</div>
                            <div class="pd_fav">좋아요&nbsp;<span><?= $fav ?></span></div>
                        </div>
                    </li>
                <?php
                }
                ?>


            </ul>
<?php
            if ($userid == "admin") { 



?>
                <ul class="buttons">
                    <li><button type="button" onclick="location.href='./product_form_cate.php'">등록하기</button></li>
                </ul>
<?php
                
            }
?>


        </div>
    </section>
    <footer>
        <?php
        include "./footer.php";
        ?>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="./js/product_list.js"></script>
</body>

</html>