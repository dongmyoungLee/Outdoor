﻿
function check_input(){
    if(!document.login_form.id.value){
        alert("아이디를 입력하세요.");
        document.login_form.id.focus();
        return;
    }
    if(!document.login_form.pass.value){
        alert("비밀번호를 입력하세요.");
        document.login_form.pass.focus();
        return;
    }
    document.login_form.submit();
}
$(document).ready(function(){
    $("#login_excute > ul").keydown(function(e){
        if(e.keyCode == 13){ 
            $("#login_excute").attr("action", "login_ok.php").submit();
        }
    });
});