<?php
    $id = $_POST["id"];
    $pass = $_POST["pass"];

    include "./db_con.php";

    $sql = "select * from register where id='$id'";
    $result = mysqli_query($con, $sql);
    $num_match = mysqli_num_rows($result);

    if(!$num_match){
        echo ("
            <script>
                alert('존재하는 ID가 없습니다.');
                history.go(-1);
            </script>
        ");
    }else{
        $row = mysqli_fetch_array($result);
        $db_pass = $row["pass"];
        mysqli_close($con);

        if($pass != $db_pass){
            echo ("
                <script>
                    alert('비밀번호가 옳지 않습니다.');
                    history.go(-1);
                </script>
            ");
            exit;

        }else{
            session_start();
            $_SESSION["userid"] = $row["id"];
            $_SESSION["username"] = $row["name"];
            
            echo ("
                <script>
                    location.href='./index.php';
                </script>
            ");
        }
    }

 
 ?>