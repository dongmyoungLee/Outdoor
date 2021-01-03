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
    $brand = $_GET["subject2"];
    $category = $_GET["subject"];
    $title = str_replace("'", "`", $_POST["title"]);
    $sub = str_replace("'", "`", $_POST["sub"]);
    $content = str_replace("'", "`", $_POST["content"]);
    $price = $_POST["price"];
    $regist_day = date("Y-m-d (H:i)");
    $link = $_POST["link"];
  
    // 첨부파일 저장하는 구성
    // 첨부파일을 저장하는 공간

    $upload_dir = "./data/"; 
    $upfile_name = $_FILES["upfile"]["name"]; 
    $upfile_tmp_name = $_FILES["upfile"]["tmp_name"]; 
    $upfile_type = $_FILES["upfile"]["type"]; 
    $upfile_size = $_FILES["upfile"]["size"]; 
    $upfile_error = $_FILES["upfile"]["error"]; 

    // 내가 올린 파일은 cmd.txt 라는 텍스트 메모장
    // var_dump($_FILES["upfile"]);
    // ar_dump($upfile_name); // string 'cmd.txt' (length=7)
    // var_dump($upfile_tmp_name); //string 'C:\Bitnami\wampstack-7.4.12-0\php\tmp\phpEB4E.tmp' (length=49)
    // var_dump($upfile_type); // string 'text/plain' (length=10)
    // var_dump($upfile_size); // int 3777 (byte)
    // var_dump($upfile_error); // int 0 -> 에러 없음.


    if($upfile_name && !$upfile_error){ 
        $file = explode(".", $upfile_name);
        $file_name = $file[0];
        $file_ext = $file[1];
        $new_file_name = date("Y_m_d_H_i_s");
        $copied_file_name = $new_file_name.".".$file_ext;
        $uploaded_file = $upload_dir.$copied_file_name;
        
    
        if($upfile_size > 5000000){
            echo ("
                <script>
                    alert('업로드 한 파일의 크기가 5MB를 초과 하였습니다. |n 파일 사이즈를 조정하여 다시 업로드 하시기 바랍니다.');
                    history.go=(-1);
                </script>
            ");
        }
        move_uploaded_file($upfile_tmp_name, $uploaded_file);
    }else{ 
        $upfile_name = "";
        $upfile_type = "";
        $copied_file_name = "";
    }

    // DB 전송

    include "./db_con.php";


    $sql = "insert into products (id, name, title, sub, content, price, fav, hit, regist_day, file_name, file_type, file_copied, category, brand, link)";
   
    $sql .= "values('$userid', '$username', '$title', '$sub', '$content', '$price', 0, 0, '$regist_day', '$upfile_name', '$upfile_type', '$copied_file_name', '$category', '$brand', '$link')";
    
    
 
    mysqli_query($con, $sql);
    mysqli_close($con);
    
    echo ("
        <script>
            location.href='./product_list.php?subject=$category';
        </script>
    ");


?>