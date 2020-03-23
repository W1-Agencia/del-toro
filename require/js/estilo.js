$(document).ready(function(){



  var _containerMenu = $('[data-menu="menu"]');
  $(window).scroll(function(){
      if($(this).scrollTop()> 70){
          _containerMenu.addClass('menu-variavel');
      }else{
          _containerMenu.removeClass('menu-variavel');
      }
  });

  // JavaScript Document
  var owl = $('#slide .owl-carousel');
  owl.owlCarousel({
    items: 1,
    nav: true,
    navText: [
        '<img src="require/img/icones/toro-esquerda-amarelo.png" alt="Seta esquerda" class="img-fluid" width="45">',
        '<img src="require/img/icones/toro-direita-amarelo.png" alt="Seta direita" class="img-fluid"  width="45">'
    ],
    navContainer: '#slide .custom-nav',
    loop: true,
    margin: 10,
    dots: true,
    autoWidth:false,
    autoplay:true,
    autoplayTimeout:6000,
    autoplayHoverPause:true,
    smartSpeed: 1000,
    responsive:{
        0:{
          items:1,
          nav:false
        },

        360: {
          items:1,
          nav: false
        },

        768: {
          items:1,
          nav: false
        }
    }
  });

   // JavaScript Document
    var owl = $('#promocao .owl-carousel');
    owl.owlCarousel({
      items: 1,
      nav: true,
      navText: [
          '<img src="require/img/icones/toro-esquerda-amarelo.png" alt="Seta esquerda" class="img-fluid" width="45">',
          '<img src="require/img/icones/toro-direita-amarelo.png" alt="Seta direita" class="img-fluid"  width="45">'
      ],
      navContainer: '#promocao .custom-nav',
      loop: true,
      margin: 10,
      dots: true,
      autoWidth:false,
      autoplay:true,
      autoplayTimeout:6000,
      autoplayHoverPause:true,
      smartSpeed: 1000,
      responsive:{
          0:{
            items:1,
            nav:false
          },

          360: {
            items:1,
            nav: false
          },

          768: {
            items:1,
            nav: false
          }
      }
    });

    // JavaScript Document
  var owl = $('#sobre .foto-sobre .owl-carousel');
  owl.owlCarousel({
    items: 1,
    nav: true,
    navText: [
        '<img src="require/img/icones/left.svg" alt="Seta esquerda" class="img-fluid" width="45">',
        '<img src="require/img/icones/right.svg" alt="Seta direita" class="img-fluid"  width="45">'
    ],
    navContainer: '#sobre .foto-sobre .custom-nav',
    loop: true,
    margin: 10,
    dots: true,
    autoWidth:false,
    autoplay:true,
    autoplayTimeout:6000,
    autoplayHoverPause:true,
    smartSpeed: 1000,
    responsive:{
        0:{
          items:1,
          nav:false
        },

        360: {
          items:1,
          nav: false
        },

        768: {
          items:3,
          nav: false
        }
    }
  });

    $("#telefoneContato").mask("(99) 9 9999-9999");


});
