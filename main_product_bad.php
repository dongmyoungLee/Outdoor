
       <section id="container_bad">
           <div class="pd_wrap swiper-container bad">
               <h2>침낭 대여 상품</h2>
               <div class="slide_wrap swiper-wrapper">
<?php
    $category = "Sleepingbag";

    include "./db_con.php";
    $sql = "select * from products where category='$category'";
    $result = mysqli_query($con, $sql);
    $total_record = mysqli_num_rows($result);

    for($i=0; $i<$total_record; $i++){
        mysqli_data_seek($result, $i);
        $row = mysqli_fetch_array($result);

        $num = $row["num"];
        $title = $row["title"];
        $sub = $row["sub"];
        $content = $row["content"];
        $price = number_format($row["price"]);
        $fav = $row["fav"];
        $file_copied = "./data/".$row["file_copied"];
        $brand = $row["brand"];
    
?>
                   <div class="cont_wrap swiper-slide" onclick="location.href='product_view.php?num=<?= $num ?>'">
                        <div class="pd_img" style="background-image:url(<?=$file_copied?>)">
                            
                        </div>
                        <div class="pd_info">
                            <h4><?=$title?></h4>
                            <p><?=$brand?></p>
                            <p><span>1박&nbsp;기준</span>&nbsp;<?=$price?>&nbsp;원</p>
                        </div>
                   </div>
                   
<?php
    }
?>
               </div>
           </div>
       </section>

