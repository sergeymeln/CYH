 // Attach FastClick to remove the 300ms tap delay on touch browsers
$(function() {
    FastClick.attach(document.body);
});

$(document).ready(function() {

    $('#get-a-quote input[type="text"]').jvFloat();

    $(window).ready(function(){
        $('.masthead-widget').stop(true, true).delay(1000).animate({top: '36%'});
    });
    $(window).ready(function(){
        $('.widget-holder').stop(true, true).delay(1000).animate({top: '0%'});
    });

    // disclaimer text modal
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });


    $('.resultsAddress, .searchError').click(function(){
      $('#address').focus();
    });


    
    $(function() {
      $('a[href*="#"]:not(.m)').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
          if (target.length) {
            $('html, body').animate({
              scrollTop: target.offset().top
            }, 1000);
            return false;
          }
        }
      });
    });    

    function loadingBlinker(button){
        $('.search-button').attr('disabled', 'disabled');
        $('.search-button').attr('title', 'Please select an address from the autocomplete dropdown in order to find deals near you!');        
        var ogText = "";
        var stopper = "•••";
        setInterval(function(){
            if(button.text().length > 3 ){
                button.text("•");
                ogText = "•";
            } else {
                ogText += "•";
                button.text(ogText);
            }
        }, 500);
    }
    
    if(getCookie('zipcode') == ""){
        $('.search-button').attr('disabled', 'disabled');
        $('.search-button').attr('title', 'Please select an address from the autocomplete dropdown in order to find deals near you!');
    } else {
        $('.search-button').removeAttr('disabled');
        $('.search-button').removeAttr("title");
    }

    $('.search-button').click(function(){
        loadingBlinker($('.search-button'));
        $('#search-form').submit();
    });


    $('#street_number').val(getCookie('street_number'));
    $('#route').val(getCookie('street'));
    $('#suite').val(getCookie('suite'));
    $('#locality').val(getCookie('city'));
    $('#administrative_area_level_1').val(getCookie('state'));
    $('#postal_code').val(getCookie('zipcode'));
    $('#country').val('USA');

    // Set the invisible form from the cookies
    $('#street_number_business_modal').val(getCookie('street_number'));
    $('#route_business_modal').val(getCookie('street'));
    $('#suite_business_modal').val(getCookie('suite'));
    $('#locality_business_modal').val(getCookie('city'));
    $('#administrative_area_level_1_business_modal').val(getCookie('state'));
    $('#postal_code_business_modal').val(getCookie('zipcode'));
    $('#country_business_modal').val('USA');

    var toggle = 0;

    var url = "https://expressentry.melissadata.net/";
    var id = "113933534";
    
    jQuery(document).ready(function()
      {
        $('#address, #homeSearch, #edpSearch, #search-services').autocomplete(
        {
            showHeader: true,
            minLength: 4,
            delay: 200,
            source: function(request, response) {
                $.getJSON(url + "jsonp/ExpressFreeForm?callback=?", {format: "jsonp", id: id, FF: request.term, maxrecords: "30"}, function (data) {
                    response($.map(data.Results, function( item ) {

                        if(item.Address.SuiteCount == 1)
                          return{label: item.Address.AddressLine1 + " " + item.Address.City + " " + item.Address.SuiteName + " " + item.Address.SuiteCount + ", " + item.Address.State + " " + item.Address.PostalCode, value: item.Address.AddressLine1 + " " + item.Address.City + ", " + item.Address.SuiteName + " " + item.Address.SuiteCount + ", " + item.Address.State + " " + item.Address.PostalCode, addObj: item};
                        else if(item.Address.SuiteCount > 1)
                          return{label: item.Address.AddressLine1 + " " + item.Address.City + " (" + item.Address.SuiteName + "" + "), " + item.Address.State + " " + item.Address.PostalCode, value: item.Address.AddressLine1 + " " + item.Address.City + ", " + item.Address.State + " " + item.Address.PostalCode, addObj: item};
                        else
                          return{label: item.Address.AddressLine1 + " " + item.Address.City + ", " + item.Address.State + " " + item.Address.PostalCode, value: item.Address.AddressLine1 + " " + item.Address.City + ", " + item.Address.State + " " + item.Address.PostalCode, addObj: item};
                    }));
                });
            },

        select: function(evt, ui)
        {

            $('.search-button').attr('disabled', 'disabled');
            $('.search-button').attr('title', 'Please select an address from the autocomplete dropdown in order to find deals near you!');

            var res = ui.item.addObj;
            var addressNumber = res.Address.AddressLine1.substr(0,res.Address.AddressLine1.indexOf(' '));
            var addressStreet = res.Address.AddressLine1.substr(res.Address.AddressLine1.indexOf(' ')+1);
            var zipcode = res.Address.PostalCode.split("-")[0];
            var city = res.Address.City;


            var state = res.Address["CountrySubdivisionCode"].split("-")[1];
            var concatAddress = addressNumber + " " + addressStreet + " " + city + " " + state + " " + zipcode;
            var suiteLen = res.Address.SuiteList;
            $('#suite').val(res.Address.SuiteList[1]);
            setCookie('suite', "", 1);

            var suiteArr = JSON.stringify(suiteLen);
            setCookie('suiteArr', suiteArr, 1);
            var inputStr = '#' + $(this).attr('id');
            var inputSelect = $(inputStr);
            if(suiteLen.length > 1 && toggle > 0){
                $('#testing').animate({width: '0%'}, 1000, function(){
                    $('#testing').remove();
                    toggle = 0;
                    suiteSelector(suiteLen, inputSelect);
                });
            }
            else if(suiteLen.length == 1 && toggle > 0){
                $('#testing').animate({width: '0%'}, 1000, function(){
                    $('#testing').remove();
                });
                toggle = 0;
            }

            function suiteSelector(suites, input){
                if(toggle < 1 && suites.length > 1){
                    var suiteCount = "";
                    for(var i = 0; i < suites.length; i++){
                        suiteCount += '<option value="'+ suites[i] +'">'+ suites[i] +'</option>';
                    }
                    input.animate({}, 1000, function(){
                        if(!input.hasClass('rebateGiftInput')){
                            input.after('<select id="testing" class="testing" name="search" style="width: 0px; margin-left: 5px; -webkit-appearance: menulist-button; border: solid 1px rgb(204, 204, 204); text-align-last:center; height: 30px;  -webkit-appearance: none; -webkit-border-radius: 0px; background: #fff;">'+ suiteCount +'</select>');
                            input.animate({width: '50%'}, 1000);
                            $('#testing').animate({width: '20%'}, 1000);
                            $('#testing').addClass('flasher');
                            suiteSaver();
                        } else {
                            input.css({display: 'inline'});
                            input.animate({width: '70%'}, 1000, function(){
                                input.after('<select id="testing" class="testing form-inline" name="search" style="width: 0px; display: inline; margin-left: 5px; -webkit-appearance: menulist-button; border: solid 1px rgb(204, 204, 204); text-align-last:center; height: 36px;  border-radius: 5px;  -webkit-appearance: none; -webkit-border-radius: 5px; background: #fff;">'+ suiteCount +'</select>');
                                $('#testing').animate({width: '27%'}, 1000);
                                $('#testing').addClass('flasher');
                                suiteSaver();
                            });
                        }
                    });
                    toggle++;
                } else {
                    loadingBlinker($('.search-button'));
                    $('#search-form').submit();
                }
            }

            function suiteSaver(){
               var suiteVal = $('#testing').val();
                setCookie('suite', suiteVal, 1);
                $('#testing').change(function(){
                    $('#testing').removeClass('flasher');
                    suiteVal = $('#testing').val();
                    setCookie('suite', suiteVal, 1);
                    $('#suite').val(suiteVal);
                    $('#suite_business_modal').val(suiteVal);
                    loadingBlinker($('.search-button'));
                    $('#search-form').submit();
                });
            }

            $('#street_number').val(addressNumber);
            $('#route').val(addressStreet);
            $('#locality').val(city);
            $('#administrative_area_level_1').val(state);
            $('#postal_code').val(zipcode);
            $('#country').val('USA');

            $('#street_number_business_modal').val(addressNumber);
            $('#route_business_modal').val(addressStreet);
            $('#locality_business_modal').val(city);
            $('#administrative_area_level_1_business_modal').val(state);
            $('#postal_code_business_modal').val(zipcode);
            $('#country_business_modal').val('USA');

            setCookie('fullAddress', concatAddress, 1);
            setCookie('street_number', addressNumber, 1);
            setCookie('street', addressStreet, 1);
            setCookie('city', city, 1);
            setCookie('state', state, 1);
            setCookie('zipcode', zipcode, 1);

            $('#address, #homeSearch, #edpSearch, #search-services').val(concatAddress);
            suiteSelector(suiteLen, inputSelect);

        }
    });


    $('input#address, input#homeSearch').focus(function() {
        $('.search-button').attr('disabled', 'disabled');
        $('.search-button').attr('title', 'Please select an address from the autocomplete dropdown in order to find deals near you!');
        $(this).val('');
    });

    $('input#address, input#homeSearch').focusout(function() {
        var cook = getCookie('fullAddress');
        if(cook){
            $('.search-button').removeAttr('disabled');
            $('.search-button').removeAttr("title");
            $(this).val(cook);
        }
    });
});

    checkCookie();

});