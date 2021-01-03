<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OutDoor</title>
    <link rel="stylesheet" href="./css/common.css">
    <link rel="stylesheet" href="./css/slide.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
    <link rel="stylesheet" href="./css/main_product_tent.css">
    <link rel="stylesheet" href="./css/main_product_table.css">
    <link rel="stylesheet" href="./css/main_product_bad.css">
    <link rel="stylesheet" href="./css/main_product_stove.css">
    <link rel="stylesheet" href="./css/banner.css">
    <link rel="stylesheet" href="./css/banner2.css">
</head>

<body>
    <header>
<?php
        include "./header.php";
?>
    </header>
    <main>
<?php
        include "./main_slide2.php";
?>
<?php
     include "./main_product_tent.php";
?>
<?php
     include "./banner.php";
?>
<?php
     include "./main_product_table.php";
?>
<?php
     include "./banner2.php";
?>
<?php
     include "./main_product_bad.php";
?>
<?php
     include "./main_product_stove.php";
?>

    </main>
    <footer>
<?php
        include "./footer.php";
?>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="./js/respon.js"></script>
    <script src="https://kit.fontawesome.com/09743b710b.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
    <script src="./js/swiper_produck.js"></script>
</body>

</html>