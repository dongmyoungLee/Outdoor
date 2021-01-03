<?php
   $num = $_GET["num"];  
   $page = $_GET["page"];

   $subject = str_replace("'", "`", $_POST["subject"]);
   $content = str_replace("'", "`", $_POST["content"]);
   $notice = $_POST['notice'];


   include "./db_con.php";

   $sql = "update board set subject='$subject', content='$content', notice='$notice' where num='$num'";
   mysqli_query($con, $sql);
   mysqli_close($con);

   echo ("
      <script>
         location.href='board_list.php?page=$page';
      </script>
   ");


?>