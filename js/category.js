$(document).ready(function(){
    // 2차 배열 패턴 = [이미지, 타이틀, 서브 ,내용]

    const arr = [
        ["category_01.jpg", "자유게시판", "자유롭게 의견을 나누세요", "캠핑 다녀온 후기 및 느낀점 자유롭게 공유하시고 또한 자유 게시판 에서는 회원끼리의 공유 및 나눔이 불 가능 합니다. 이점 유의하시면서 소통 바랍니다."],
        ["category_02.jpg", "오픈채팅방", "캠핑지에 대한 갖가지 Tip 공유", "노지캠핑 및 캠핑장예약 및 양도 컨택 가능합니다. 노지캠핑에 대한 어려움 다 같이 해결하고 즐거운 캠핑을 만듭니다. 또한 캠핑이 끝난 후에는 깔끔한 뒷처리를 하는 에티켓 잊지 맙시다."],
    ];

    for(i=0; i<arr.length; i++){
        $(".container").append(`<div class="card">
                                    <div class="box">
                                        <div class="content">
                                            <div class="kakao_img" style="background-image:url('img/${arr[i][0]}')"></div>
                                            <h3>${arr[i][1]}</h3>
                                            <h4>${arr[i][2]}</h4>
                                            <p>${arr[i][3]}</p>
                                        </div>
                                    </div>
                                </div>`);
    }
    $(".card:eq(0)").click(function(){
        location.href="./free_board_list.php";
    });
    $(".card:eq(1)").click(function(){
        location.href="./chat.php";
    });
});