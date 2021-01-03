$(document).ready(function(){
    // 2차 배열 패턴 = [이미지, 타이틀, 서브 ,내용]

    const arr = [
        ["텐트 & 타프", "[ ZED ]"],
        ["테이블 & 체어", "[ ZED ]"],
        ["침낭 & 침구류","[ ZED ]"],
        ["화로 & BBQ" , "[ ZED ]"],
        ["텐트 & 타프", "[ NORTHPEAK ]"],
        ["테이블 & 체어", "[ NORTHPEAK ]"],
        ["침낭 & 침구류","[ NORTHPEAK ]"],
        ["화로 & BBQ" , "[ NORTHPEAK ]"],
        ["텐트 & 타프", "[ SNOWLINE ]"],
        ["테이블 & 체어", "[ SNOWLINE ]"],
        ["침낭 & 침구류","[ SNOWLINE ]"],
        ["화로 & BBQ" , "[ SNOWLINE ]"],
        
    ];

    for(i=0; i<arr.length; i++){
        $(".container").append(`<div class="card">
                                    <div class="box">
                                        <div class="content">
                                            <h3>${arr[i][0]}</h3>
                                            <h3>${arr[i][1]}</h3>
                                            <h4>등록</h4>
                                        </div>
                                    </div>
                                </div>`);
    }
    $(".card:eq(0)").click(function(){
        location.href="./product_form.php?subject=Tent&subject2=ZED";
    });
    $(".card:eq(1)").click(function(){
        location.href="./product_form.php?subject=Table&subject2=ZED";
    });
    $(".card:eq(2)").click(function(){
        location.href="./product_form.php?subject=sleepingbag&subject2=ZED";
    });
    $(".card:eq(3)").click(function(){
        location.href="./product_form.php?subject=Stove&subject2=ZED";
    });
    $(".card:eq(4)").click(function(){
        location.href="./product_form.php?subject=Tent&subject2=NORTHPEAK";
    });
    $(".card:eq(5)").click(function(){
        location.href="./product_form.php?subject=Table&subject2=NORTHPEAK";
    });
    $(".card:eq(6)").click(function(){
        location.href="./product_form.php?subject=sleepingbag&subject2=NORTHPEAK";
    });
    $(".card:eq(7)").click(function(){
        location.href="./product_form.php?subject=Stove&subject2=NORTHPEAK";
    });
    $(".card:eq(8)").click(function(){
        location.href="./product_form.php?subject=Tent&subject2=SNOWLINE";
    });
    $(".card:eq(9)").click(function(){
        location.href="./product_form.php?subject=Table&subject2=SNOWLINE";
    });
    $(".card:eq(10)").click(function(){
        location.href="./product_form.php?subject=sleepingbag&subject2=SNOWLINE";
    });
    $(".card:eq(11)").click(function(){
        location.href="./product_form.php?subject=Stove&subject2=SNOWLINE";
    });
});