$(document).ready(function(){


  /* 메인 슬라이드 */

    var coverflowSetting = {
      slideShadows : true,
      rotate : 30, 
      stretch : 0, 
      depth : 150, 
      modifier : 1, 
  }
  
  var myswiper = null;
  
  function init(){
  
      if(myswiper != null) myswiper.destroy();
  
      myswiper = new Swiper( '.first', {
          autoplay : { 
              delay : 3000, 
          },
          speed : 3000, 
  
          navigation : {
              nextEl : '.swiper-button-next', // 다음 버튼 클래스명
              prevEl : '.swiper-button-prev', // 이번 버튼 클래스명
          },
          scrollbar : {
            el : '.swiper-scrollbar',
            draggable: true,
          },
          slidesPerView : 1,
      });
  }
  
  init();


  /* 텐트 */

  new Swiper('.tent', {
    effect : 'coverflow', 
    coverflowEffect : coverflowSetting,

      spaceBetween : 30,
      loop : true,    
    
      autoplay : { 
      delay : 4000,
      spped : 4000, 
  },
    
    breakpoints: {
        640: {
          slidesPerView: 2,
        },
        768: {
          slidesPerView: 3,
        },
        992: {
          slidesPerView: 5,
        },
      }
  });


  /* 테이블 */

  new Swiper('.table', {
    spaceBetween : 20,
    loop : true,    
    
    
    navigation : { // 네비게이션
        nextEl : '.swiper-button-next', // 다음 버튼 클래스명
        prevEl : '.swiper-button-prev', // 이번 버튼 클래스명
    },
    autoplay : { 
      delay : 4000,
      spped : 4000, 
   },
    breakpoints: {
        640: {
          slidesPerView: 2,
        },
        768: {
          slidesPerView: 3,
        },
        992: {
          slidesPerView: 5,
        },
      }
  });

  /* 침낭 */

  new Swiper('.bad', {
    spaceBetween : 20,
    loop : true,    
    autoplay : { 
      delay : 4000,
      spped : 4000, 
   },
    navigation : { // 네비게이션
        nextEl : '.swiper-button-next', // 다음 버튼 클래스명
        prevEl : '.swiper-button-prev', // 이번 버튼 클래스명
    },
    breakpoints: {
        640: {
          slidesPerView: 2,
        },
        768: {
          slidesPerView: 3,
        },
        992: {
          slidesPerView: 5,
        },
      }
  });

  /* 화로 */

  new Swiper('.stove', {
    spaceBetween : 20,
    loop : true,    
    autoplay : { 
      delay : 4000,
      spped : 4000, 
   },
    navigation : { // 네비게이션
        nextEl : '.swiper-button-next s1', // 다음 버튼 클래스명
        prevEl : '.swiper-button-prev s2', // 이번 버튼 클래스명
    },
    breakpoints: {
        640: {
          slidesPerView: 2,
        },
        768: {
          slidesPerView: 3,
        },
        992: {
          slidesPerView: 5,
        },
      }
  });



  







});