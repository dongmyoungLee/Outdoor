<?php
   //#1. 체크한 항목의 개수를 파악
   if(isset($_POST["unit"])){  //몇개를 선택했는가
      $num_unit = count($_POST["unit"]);
   }else{
      echo ("
         <script>
            alert('삭제할 게시글을 선택하세요.');
            history.go(-1);
         </script>
      ");
   }


   include "./db_con.php";


   for($i=0; $i<$num_unit; $i++){
      $num = $_POST["unit"][$i];  //반복하는 과정상 각 value 값을 받아서 저장

      $sql = "select * from buy where num='$num'";
      $result = mysqli_query($con, $sql);
      $row = mysqli_fetch_array($result);

    


      //#2. board 테이블 내부의 선택한 항목 행 삭제
      $sql = "delete from buy where num='$num'";
      mysqli_query($con, $sql);
   }

   mysqli_close($con);

   echo("
      <script>
         location.href='./admin.php';
      </script>
   ");

?>