{{-- scripts for entire project --}}
<script src="/js/jquery-3.3.1.min.js"></script>
<script src="/js/jquery-ui.js"></script>
<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/app.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.7/holder.min.js" integrity="sha512-O6R6IBONpEcZVYJAmSC+20vdsM07uFuGjFf0n/Zthm8sOFW+lAq/OK1WOL8vk93GBDxtMIy6ocbj6lduyeLuqQ==" crossorigin="anonymous"></script>
<script src="/js/owl.carousel.min.js"></script>
<script src="/js/jquery.countdown.min.js"></script>
<script src="/js/bootstrap-datepicker.min.js"></script>
<script src="/js/jquery.easing.1.3.js"></script>
<script src="/js/aos.js"></script>
<script src="/js/jquery.fancybox.min.js"></script>
<script src="/js/jquery.sticky.js"></script>
<script src="/js/main.js"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script type="text/javascript">
    //Set height of page to free space
    var docHeight = $(window).height();
    var navHeight = $('.site-navbar').height();
    var rem = docHeight - navHeight;
    var cardHeight = $('.mx-auto.card').height();
    var footerHeight = $('.page-footer').height();
    console.log(rem);
    console.log("final: " + (rem));
    if ($('div').hasClass('row cover')){
      $('.row.cover').css('height', (rem+50) + 'px');
      console.log('hasCover');
    }else{
      $('.row.push-down').css('min-height', (rem - footerHeight) + 'px');
      $('.row.push-down').css('margin-top', (navHeight + 50) + 'px');
      $('body').css('overflow-x', 'hidden');
      console.log('hasPushDown');
    }
    $('.mx-auto.card').css('margin-top', ((rem*0.5) - (cardHeight*0.5)  ) + 'px');


    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })

    // create random pin
    function makeid(length) {
      var result           = '';
      var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
      var charactersLength = characters.length;
      for ( var i = 0; i < length; i++ ) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
      }
      var stfPin = document.getElementById('password');
      var confStfPin = document.getElementById('conf_password');
      stfPin.value = result;
      confStfPin.value = result;
      // console.log(result);
    }


    $(document).ready(function(){
      // auto hide alerts
      $(".alert.alert-dismissable").fadeTo(3500, 500).slideUp(500, function(){
          console.log('started');
          $(".alert.alert-dismissable").slideUp(500);
      });

    });
</script>
