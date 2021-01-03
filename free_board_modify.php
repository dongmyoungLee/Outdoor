<?php
   $num = $_GET["num"];  
   $page = $_GET["page"];

   $subject = str_replace("'", "`", $_POST["subject"]);
   $content = str_replace("'", "`", $_POST["content"]);

   include "./db_con.php";

   $sql = "update freeboard set subject='$subject', content='$content' where num='$num'";
   mysqli_query($con, $sql);
   mysqli_close($con);

   echo ("
      <script>
         location.href='free_board_list.php?page=$page';
      </script>
   ");


?>