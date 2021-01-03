<?php
   $id = $_POST["id"];
   $name = $_POST["name"];
   $title = $_POST["title"];
   $price = $_POST["price"];
   $crush = $_POST["crush"];
   $gram = $_POST["gram"];
    $lastprice = str_replace(",", "", $_POST["last_price"]);
    $money = $_POST["money"];
   
    $register_day = date("Y-m-d (H:i)");

   // var_dump("판매자 id" , $id);
   // var_dump("판매자 이름" , $name);
   // var_dump("판매물건 이름" ,$title);
   // var_dump("판매가격" , $price);
   // var_dump("수령방식" ,$crush);
   // var_dump("기간" ,$gram);
   // var_dump("최종금액" ,$lastprice);
   // var_dump("계좌번호" ,$money);
   // var_dump("주문시간" ,$register_day);

   
   include "./db_con.php";

   $sql = "insert into sell (id, name, title, price, crush, gram, lastprice, money, register_day) values('$id', '$name', '$title', '$price', '$crush', '$gram', '$lastprice', '$money', '$register_day')";

   mysqli_query($con, $sql);

   mysqli_close($con);

   echo ("
      <script>
        alert('대여 등록이 완료 되었습니다.');
         location.href = './index.php';
      </script>
   ");

?>