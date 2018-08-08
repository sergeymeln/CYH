$(document).on('ready', function() {

  let slidersAmount = $('.providers-slider li').length;
  let amount = slidersAmount;
  let winWidth = $(window).width();

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

  $(window).load(function () {
    if(winWidth < 768 && location.hash) {
      const hash = location.hash.slice(1);
      $('.terms-table-slider').slick({
        dots: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        adaptiveHeight: true
      });
      const numSlide = $('.'+hash).closest('.slick-slide').attr('data-slick-index');
      $('.terms-table-slider').slick('slickGoTo', parseInt(numSlide));
    }
  })

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

    //Modal
    function getTermsInfo() {
      var modalLink = $('a[data-target="#legalInfo"]');

      modalLink.on('click', function (e) {
        e.preventDefault();
        e.stopPropagation();
        var content = $(this).next('.terms-content').text();
        $('#legalInfo .modal-body .text-left').text(content);

        $('#legalInfo').modal('show');
      });

    }
    getTermsInfo();

    $('#cyh_process_zip').on('click', function(e) {
        $('#cyh_process_status').text('').addClass('loading');

        var validationResult = validateZip($('#zipCode').val());
        if(!validationResult) {
            $('#cyh_process_status').addClass('error-message').removeClass('loading').text('Please enter accurate zip code');
            setTimeout(function(){
                $('#cyh_process_status').removeClass('error-message').text('');
                $('#zipCode').val($('#currentZipCode').val());
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
                $('#cyh_process_status').removeClass('error-message');

            } else {
                $('#cyh_process_status').addClass('error-message').removeClass('loading').text('Please enter accurate zip code');
                setTimeout(function(){
                    $('#cyh_process_status').removeClass('error-message').text('');
                    $('#zipCode').val($('#currentZipCode').val());
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

    $('#brandsList').on('change', function(e) {
        let brandLoader = $(this).parent().parent().parent().find('.loader');
        let brand = $('#brandsList').val();
        let zip = $('#currentZipCode').val();
        let hideTab = $('#brandsList option:selected').attr('data-hideTab');

        const tabsId = ['internetOffers', 'internetTvOffers'];
        const numberForId = 2;
        const allBrandsTabContent =  $('#allBrandsTab');
        const oneBrandTabContent =  $('#oneBrandTab');
        const navigation = $(this).closest('.offers-navigation');
        const tabsNav = navigation.find('li a');
        const activeTab = $(this).closest('.offers-navigation').find('li.active > a').attr('href').replace(/[#\d]/g, '');

        brandLoader.addClass('loading');
        navigation.find('li a.disabled').removeClass('disabled');

        if (brand == 'all') {

            changeTabsNavHref(tabsNav, tabsId);
            showActiveTab(allBrandsTabContent, activeTab, tabsId);

            allBrandsTabContent.show();
            oneBrandTabContent.hide();
            brandLoader.removeClass('loading');
            tableSliderDestroy();
            tableSliderInit();
            getTermsInfo();
        } else {
            var data = {
                'action': 'cyh_show_brand_data',
                'brand_id': brand,
                'zip':zip
            };

            $.post(ajax_object.ajax_url, data, function(resp){
                if(resp.length > 0) {
                    changeTabsNavHref(tabsNav, tabsId, numberForId);

                    allBrandsTabContent.hide();
                    oneBrandTabContent.html(resp).promise().done(function(){

                      showActiveTab($(this), activeTab, tabsId, numberForId);

                    });

                    brandLoader.removeClass('loading');
                    oneBrandTabContent.show();
                    tableSliderDestroy();
                    tableSliderInit();
                    getTermsInfo();
                }
            });
        }

        e.preventDefault();

    });

  function changeTabsNavHref(navigation, tabsIdArray, idNumber ) {
    idNumber = idNumber || '';

    $.each(navigation, function (index, value) {
      $(value).attr('href',  '#'+tabsIdArray[index] + idNumber);
    });
  }

  function showActiveTab(content, activeTab, tabsId, numberForId) {
    numberForId = numberForId || '';
    let currentActiveTab = content.find('div#'+ activeTab + numberForId);
    const tableArray = currentActiveTab.find('table');

    if(tableArray.length === 1 && activeTab != tabsId[0]) {
      const oldTab = $('a[href=#' + activeTab + numberForId +']');
      oldTab.parent().removeClass('active');
      oldTab.addClass('disabled');
      activeTab = tabsId[0];
      $('a[href=#' + activeTab + numberForId +']').parent().addClass('active');
      currentActiveTab = content.find('div#'+ activeTab + numberForId);
    }

    currentActiveTab.addClass('in active');
  }


  $(document).on('click', 'a[data-brand-id]', function (e) {
      e.preventDefault();

      var brandId = $(this).attr('data-brand-id'),
          brandsSection = $('#all-available-offers'),
          brandList = $('#brandsList'),
          new_position = $(brandsSection).offset();

      $('html, body').stop().animate({ scrollTop: new_position.top }, 500);

      if(brandList.val() === brandId) {
        return;
      }
      brandList.val(brandId).change();
  })

});

