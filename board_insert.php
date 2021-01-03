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
    $subject = str_replace("'", "`", $_POST["subject"]);
    $content = str_replace("'", "`", $_POST["content"]);
    $regist_day = date("Y-m-d (H:i)");
    $notice = $_POST["notice"];
    /* 첨부 파일 */

    $upload_dir = "./data/"; 
    $upfile_name = $_FILES["upfile"]["name"];
    $upfile_tmp_name = $_FILES["upfile"]["tmp_name"]; 
    $upfile_type = $_FILES["upfile"]["type"]; 
    $upfile_size = $_FILES["upfile"]["size"]; 
    $upfile_error = $_FILES["upfile"]["error"]; 

    if($upfile_name && !$upfile_error){  
        $file = explode(".", $upfile_name);
        $file_name = $file[0];
        $file_ext = $file[1];
    

        $new_file_name = date("Y_m_d_H_i_s");
        $copied_file_name = $new_file_name.".".$file_ext;
        $uploaded_file = $upload_dir.$copied_file_name; 
    
        if($upfile_size > 3000000){
            echo ("
                <script>
                    alert('업로드 한 파일의 크기가 3MB를 초과 하였습니다. |n 파일 사이즈를 조정하여 다시 업로드 하시기 바랍니다.');
                    history.go=(-1);
                </script>
            ");
        }

        // move_uploaded_file(file, newlocation) : 업로드 된 파일을 새로운 위치의 파일(경로포함)로 이동
        move_uploaded_file($upfile_tmp_name, $uploaded_file);



        //파일을 넣지못했을때
        // if(!move_uploaded_file($upfile_tmp_name, $uploaded_file)){
        //     echo ("
        //         <script>
        //             alert('파일을 지정한 디렉토리에 옮기는 것을 실패 했습니다.');
        //             history.go(-1);
        //         </script>
        //     ");
        // }



    }else{
        $upfile_name = "";
        $upfile_type = "";
        $copied_file_name = "";
    }

    // 데이터 베이스에 접근

    include "./db_con.php";
    
    $sql = "insert into board (id, name, subject, content, regist_day, hit, file_name, file_type, file_copied, notice)";
    $sql .= "values('$userid', '$username', '$subject', '$content', '$regist_day', 0, '$upfile_name', '$upfile_type', '$copied_file_name', '$notice')";

    mysqli_query($con, $sql);

    //작업이 종료되면 게시판 리스트로 이동
    echo ("
        <script>
            location.href='board_list.php';
        </script>
    ");
?>