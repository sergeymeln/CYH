$(document).on('ready', function() {

  let slidersAmount = $('.providers-slider li').length;
  let amount = slidersAmount;

  if(slidersAmount > 5) {
    amount = 5;
  }

  $(".providers-slider").slick({
    dots: false,
    accessibility: true,
    adaptiveHeight: true,
    centerMode: true,
    centerPadding: '0px',
    arrows: true,
    slidesToShow: amount,
    adaptiveHeight: true,
    mobileFirst:true,
    slidesToScroll: 1,
    customPaging:  getSlideAmount('.providers-slider'),
    responsive: [
      {
        breakpoint: 1020,
        settings: {
          slidesToShow: amount,
          slidesToScroll: 1
        }
      },
      {
          breakpoint: 991,
          settings: {
              slidesToShow: 3,
              slidesToScroll: 1
          }
      },
      {
          breakpoint: 600,
          settings: {
              slidesToShow: 3,
              slidesToScroll: 1
          }
      },
      {
          breakpoint: 480,
          settings: {
              slidesToShow: 1,
              slidesToScroll: 1
          }
      },
      {
          breakpoint: 318,
          settings: {
              slidesToShow: 1,
              slidesToScroll: 1
          }
      }
    ]
});
    function getSlideAmount(currentSlickElement) {
      const $slickElementArray = $(currentSlickElement);

      $slickElementArray.each(function (i) {
        const $currentNumber = $(this).next('.provider-count').find('.current-slide');
        const $slideCount = $(this).next('.provider-count').find('.slide-count');

        $(this).on('init reInit afterChange', function (event, slick, currentSlide, nextSlide) {
          let i = (currentSlide ? currentSlide : 0) + 1;

          $currentNumber.text(i);
          $slideCount.text(slick.slideCount);
        });
      })
    }

    function tableSliderInit() {
      $('.providers-table-slider').slick({
        dots: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        customPaging :  getSlideAmount('.providers-table-slider')
      });
    }

    function tableSliderDestroy() {
      $('.providers-table-slider.slick-initialized').slick('unslick');
    }

    tableSliderInit();


    $(document).on('click', '.providers-table .slide-cell', function () {
        const $hiddenRow = $(this).parent().next('.hidden-row ');

        if($hiddenRow.hasClass('open')) {
            $(this).removeClass('open');
            $hiddenRow.removeClass('open');
        } else {
            $(this).addClass('open');
            $hiddenRow.addClass('open');
        }

        $hiddenRow.find('td .hidden-content').slideToggle();
    });

    // Tabs
    $('.tab-offers a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
        $('.providers-table-slider').slick("refresh");
    });

    $('.map-section a').on('click', function (e) {
      let currentTab = $('.tab-offers a[href=' + e.target.hash + ']');

      $('html, body').animate({
        scrollTop: (currentTab.offset().top)
      },500);
      currentTab.tab('show');
      $('.providers-table-slider').slick("refresh");
    });

    $('#cyh_process_zip').on('click', function(e) {
        $('#cyh_process_status').text('').addClass('loading');

        var validationResult = validateZip($('#zipCode').val());
        if(!validationResult) {
            $('#cyh_process_status').addClass('error-message').removeClass('loading').text('Please enter valid code');
            setTimeout(function(){
                $('#cyh_process_status').removeClass('error-message').text('');
                $('#zipCode').val('');
                }, 3000);
            return;
        }
        var data = {
            'action': 'cyh_find_city',
            'zip_code': $('#zipCode').val()
        };

        $.post(ajax_object.ajax_url, data, function(resp){
            var response = $.parseJSON(resp);
            if(response.result == 'success') {
                window.location.href=response.link;
                $('#cyh_process_status').removeClass('loading error-message');

            } else {
                $('#cyh_process_status').addClass('error-message').removeClass('loading').text('City was not found');
                setTimeout(function(){
                    $('#cyh_process_status').removeClass('error-message').text('');
                    $('#zipCode').val('');
                }, 3000);
                e.preventDefault();
            }
        });

        e.preventDefault();

    });

    function validateZip(zipCode)
    {
        var isValidZip = /(^\d{5}$)|(^\d{5}-\d{4}$)/.test(zipCode);
        return isValidZip;
    }

    $('#selectBrand').on('click', function(e) {
        let brandLoader = $(this).prev('.loader');
        let brand = $('#brandsList').val();
        let zip = $('#currentZipCode').val();
        let hideTab = $('#brandsList option:selected').attr('data-hideTab');

        brandLoader.addClass('loading');

        if (brand == 'all') {
            $('#allBrandsTab').show();
            $('#oneBrandTab').hide();
            $('#allBrandsTab1').show();
            $('#allBrandsTab1').addClass('active');
            $('#allBrandsTab2').removeClass('active');
            $('#allBrandsTab2').show();
            brandLoader.removeClass('loading');
            tableSliderDestroy();
            tableSliderInit();
        } else {
            var data = {
                'action': 'cyh_show_brand_data',
                'brand_id': brand,
                'zip':zip
            };

            $.post(ajax_object.ajax_url, data, function(resp){
                if(resp.length > 0) {
                    brandLoader.removeClass('loading');
                    $('#allBrandsTab').hide();
                    document.getElementById('oneBrandTab').innerHTML = resp;
                    $('#oneBrandTab').show();
                    $('#allBrandsTab1').show();
                    $('#allBrandsTab2').show();
                    $('#allBrandsTab1').addClass('active');
                    $('#allBrandsTab2').addClass('active');
                    $('#'+hideTab).hide();
                    tableSliderDestroy();
                    tableSliderInit();
                }
            });
        }

        e.preventDefault();

    });

});

