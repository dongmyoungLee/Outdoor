// 회원가입 버튼 클릭 시 

function check_input(){
    if(!document.member_form.id.value){
        alert("아이디를 입력하세요");
        document.member_form.id.focus();
        return;
    }
    if(!document.member_form.pass.value){
        alert("비밀번호를 입력하세요");
        document.member_form.pass.focus();
        return;
    }
    if(!document.member_form.pass_cf.value){
        alert("비밀번호 확인을 입력하세요");
        document.member_form.pass_cf.focus();
        return;
    }
    if(!document.member_form.name.value){
        alert("이름을 입력하세요");
        document.member_form.name.focus();
        return;
    }
    if(!document.member_form.email.value){
        alert("E-mail 을 입력하세요");
        document.member_form.email.focus();
        return;
    }

    if(document.member_form.pass.value != document.member_form.pass_cf.value){
        alert("비밀번호 확인이 옳지 않습니다.");
        document.member_form.pass.focus();
        return;
    }

    document.member_form.submit();
}

function modi_check_input(){
    if(!document.modi_member_form.pass_modi.value){
        alert("비밀번호를 입력하세요");
        //document.modi_member_form.pass.focus();
        return;
    }
    if(!document.modi_member_form.pass_cf_modi.value){
        alert("비밀번호 확인 입력하세요");
        //document.modi_member_form.pass.focus();
        return;
    }

    if(document.modi_member_form.pass_modi.value != document.modi_member_form.pass_cf_modi.value){
        alert("비밀번호 확인이 옳지 않습니다.");
        return;
    }
    document.modi_member_form.submit();
}

function reset_form(){
    document.member_form.id.value = "";  //현재 존재하는 value값을 제거
    document.member_form.pass.value = "";
    document.member_form.pass_cf.value = "";
    document.member_form.name.value = "";
    document.member_form.email.value = "";
    document.member_form.id.focus();
    return;
}

$(document).ready(function(){

    $(".modify_btn").click(function(){
        $(".dark, .popup").addClass("show");
    });

    $(".close").click(function(){
        $(".dark, .popup").removeClass("show");
    });

    
    $("#member_excute > ul").keydown(function(e){
        if(e.keyCode == 13){ 
            $("#member_excute").attr("action", "member_ok.php").submit();
        }
    });
    
});

function check_id(){
    window.open("member_check_id.php?id="+document.member_form.id.value, "checkID", "width=400, height=250, left=700, top=300");

}