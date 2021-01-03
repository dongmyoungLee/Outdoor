$(document).ready(function(){
    $(".pd_fav").click(function(){
        var $rel = $(this).attr("rel");
        
        $.ajax({
            url : './product_fav.php?num=' + $rel,
            type : 'GET',
            cache : false,
            success : function(data){
                console.log(data);
                $(".pd_fav").find("span").text(data);
            }

        });
        
        
        return false;
    });


    $(".preview p").click(function(){
        $(".popup, .dark").addClass("active"); 
    });

    $(".close").click(function(){
        $(".dark, .popup").removeClass("active");
 
    });

   
   /////////////////////////////////////////////////////////////////


    //  개당 기본가격을 추출
    let $str_price = $(".pd_price").val();
    let $num_price = parseFloat($str_price.replace(",", ""));

    let $total = 0; // 총금액의 숫자형 데이터 초기값
    let $final_total = ""; // 총금액의 문자형 데이터 초기값

    let $each_calc_price = []; // 각 아이템 별로 1개 단위마다 기본값(배열 데이터)
    let $each_total_price = []; // 각 아이템 별로 최종값 (배열 데이터)
    
    
    function calc_price(){
        // 각 항목에 대하여 합산하여 총 금액을 도출
        $total = 0; // 기존값에 의해 값이 추가되는 부분을 막기위해 처음부터 다시 계산을 시킴
        for(i = 0; i < $each_total_price.length; i++){
            $total = $each_total_price[i]; // 최종 배열 데이터 내부의 모든 값을 더한다.
        }

        if($total == 0){ 
           
        }else{ 
            $(".det_total_price").show();
        }
        $final_total = $total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        $(".total_price_num").val($final_total);
    };
    $(".det_total_price").hide();
    
    $("select#crush option:eq(0), select#gram option:eq(0)").prop("selected", true); //최초 로딩시 필수사항을 표기힌다.


    // #4. 조건 : 차례대로 셀렉트 박스를 변경했을 때, my_item 을 하나씩 붙임

    $("#crush").change(function(){
        $("#gram").removeAttr("disabled");
    });



    $("#gram").change(function(){
        // 선택을 변경할 때 마다 li.myitem 이 계속 생성된다.

        let $opt_02_val = parseFloat($(this).val());
        let $present_price = $num_price + $opt_02_val;

        $each_total_price.push($present_price);
        $each_calc_price.push($present_price);

        let $result_opt = $present_price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        $(".opt_box li:last .each_price").text($result_opt);

        calc_price(); // 함수 호출
    });

});

function check_input(){


    if(document.sell_form.gram.disabled){
        alert("수령방법과 기간을 선택하세요");
        return;
    }


    if(!document.sell_form.money.value){
        alert("계좌번호를 입력하세요");
        document.sell_form.money.focus();
        return;
    }


    

    document.sell_form.submit();
}