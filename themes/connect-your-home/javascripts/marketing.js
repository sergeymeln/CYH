var InternetCities = InternetCities || {};

(function () {
    var self = this;

    self.vm = null;

    self.Initialize = function (data) {
        self.vm = self.GetVm();
        self.vm.Initialize(data);
        ko.applyBindings(self.vm, document.getElementById("internetCityPage"));
        self.vm.Loading(false);
    };

    self.GetVm = function () {
        return new InternetCitiesVm();
    };

    function InternetCitiesVm() {
        var inner = this;

        inner.InternetCategories = [4, 5];
        inner.InternetTvCategories = [7];


        inner.Loading = ko.observable(true);
        inner.BestOffersLoading = ko.observable(false);
        inner.AllProductsLoading = ko.observable(false);
        inner.SelectedProvider = ko.observable();
        inner.BestOffersTabSelected = ko.observable(1);
        inner.AllProductsTabSelected = ko.observable(1);
        inner.HeaderProviderOrderNumber = ko.observable(1);
        inner.TopProvidersOrderNumber = ko.observable(1);
        inner.BestOffersOrderNumber = ko.observable(1);
        inner.AllProductsOrderNumber = ko.observable(1);
        inner.MobileTableOptions = {
            dots: false,
            slidesToShow: 1,
            slidesToScroll: 1,
        };

        inner.SelectedBestOffersCategories = ko.pureComputed(function () {
            switch (inner.BestOffersTabSelected()) {
                //internet
                case 1:
                    return inner.InternetCategories;
                    break;
                //internet + TV
                case 2:
                    return inner.InternetTvCategories;
                    break;
            }
        });

        inner.SelectedAllProductsCategories = ko.pureComputed(function () {
            switch (inner.AllProductsTabSelected()) {
                //internet
                case 1:
                    return inner.InternetCategories;
                    break;
                //internet + TV
                case 2:
                    return inner.InternetTvCategories;
                    break;
            }
        });

        inner.UpdateBestOfferTab = function (context, e, value) {
            //unslick is required to restore markup for the foreach to work properly
            inner.BestOffersLoading(true);
            $('#best-offers-slick').slick('unslick');
            inner.BestOffersTabSelected(value);
            inner.BestOffersOrderNumber(1);
        };

        inner.UpdateAllProductsTab = function (context, e, value) {
            inner.AllProductsLoading(true);
            //unslick is required to restore markup for the foreach to work properly
            $('#all-products-slick').slick('unslick');
            inner.AllProductsTabSelected(value);
            inner.AllProductsOrderNumber(1);
        };

        inner.Initialize = function (data) {
            ko.mapping.fromJS(data, {}, inner);
            InitCustomComputeds();
            InitUIComponents();
        };

        inner.FormatPrice = function (price) {
            if (price) {
                return '$' + price.toString();
            }
            else {
                return '-';
            }
        };

        inner.SeeAllProviderPackages = function (element) {
            inner.SelectedProvider(element.provider.Id());
            inner.AllProductsTabSelected(1);
            ScrollToAllProducts();
        };

        inner.SeeAllInternetOffers = function () {
            //resetting selection
            inner.SelectedProvider(undefined);
            inner.AllProductsOrderNumber(1);
            ScrollToAllProducts();
        };

        function InitCustomComputeds() {
            inner.ProviderCount = ko.pureComputed(function () {
                return inner.Providers().length;
            });

            inner.TopProviderCount = ko.pureComputed(function () {
                return (inner.TopProviders().length < 5) ? inner.TopProviders().length : 5;
            });

            inner.HasSpectrum = ko.pureComputed(function () {
                return (inner.Providers().filter(function (e) {
                    return /Spectrum/.test(e.Name());
                }).length > 0);
            });

            inner.QuickFactsBegin = ko.pureComputed(function () {
                return inner.City.Bullets().slice(0, inner.City.Bullets().length / 2);
            });

            inner.QuickFactsEnd = ko.pureComputed(function () {
                return inner.City.Bullets().slice(inner.City.Bullets().length / 2);
            });

            inner.BestOffersInternet = ko.pureComputed(function () {
                return inner.ProductListSorted().filter(function (elem) {
                    return (elem.IsBestOffer() && $.inArray(elem.ServiceProviderCategory.Category.Id(), inner.SelectedBestOffersCategories()) !== -1);
                });
            }).extend({rateLimit: 500});


            inner.BestOffersInternetCount = ko.pureComputed(function () {
                return inner.BestOffersInternet().length;
            });

            inner.AllProductsInternet = ko.pureComputed(function () {
                return inner.ProductListSortedAll().filter(function (elem) {
                    if (inner.SelectedProvider() !== undefined) {
                        return (elem.ServiceProviderCategory.Provider.Id() == inner.SelectedProvider() && $.inArray(elem.ServiceProviderCategory.Category.Id(), inner.SelectedAllProductsCategories()) !== -1);
                    }
                    else {
                        return $.inArray(elem.ServiceProviderCategory.Category.Id(), inner.SelectedAllProductsCategories()) !== -1;
                    }
                });
            }).extend({rateLimit: 500});
            inner.AllProductsInternetCount = ko.pureComputed(function () {
                return inner.AllProductsInternet().length;
            });

            inner.ProviderSliderOptions = ko.pureComputed(function () {
                var slideCount = (inner.ProviderCount() > 5) ? 5 : inner.ProviderCount();
                return {
                    dots: false,
                    accessibility: true,
                    centerMode: true,
                    centerPadding: '0px',
                    arrows: true,
                    slidesToShow: slideCount,
                    mobileFirst: true,
                    slidesToScroll: 1,
                    responsive: [
                        {
                            breakpoint: 1020,
                            settings: {
                                slidesToShow: slideCount,
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
                };
            });
        }

        inner.FormatPhone = function (phone) {
            return phone.toString().slice(0, 3) + '-' + phone.toString().slice(3, 6) + '-' + phone.toString().slice(6, 10);
        };

        function ScrollToAllProducts() {
            var brandsSection = $('#all-available-offers'),
                new_position = $(brandsSection).offset();

            $('html, body').stop().animate({scrollTop: new_position.top}, 500);
        }

        function InitUIComponents() {



            // let slidersAmount = $('.providers-slider li').length;
            // let amount = slidersAmount;
            //
            //
            // if (slidersAmount > 5) {
            //     amount = 5;
            // }

            // $(".providers-slider").owlCarousel({
            //     loop:true,
            //     margin:10,
            //     nav:true,
            // });
            //         $(".providers-slider").slick({
            //             dots: false,
            //             accessibility: true,
            //             /* adaptiveHeight: true,*/
            //             centerMode: true,
            //             centerPadding: '0px',
            //             arrows: true,
            //            // slidesToShow: amount,
            //             mobileFirst: true,
            //             slidesToScroll: 1,
            // //            customPaging: getSlideAmount('.providers-slider'),
            //             responsive: [
            //                 {
            //                     breakpoint: 1020,
            //                     settings: {
            //           //              slidesToShow: amount,
            //                         slidesToScroll: 1
            //                     }
            //                 },
            //                 {
            //                     breakpoint: 991,
            //                     settings: {
            //                         slidesToShow: 3,
            //                         slidesToScroll: 1
            //                     }
            //                 },
            //                 {
            //                     breakpoint: 600,
            //                     settings: {
            //                         slidesToShow: 3,
            //                         slidesToScroll: 1
            //                     }
            //                 },
            //                 {
            //                     breakpoint: 480,
            //                     settings: {
            //                         slidesToShow: 1,
            //                         slidesToScroll: 1
            //                     }
            //                 },
            //                 {
            //                     breakpoint: 318,
            //                     settings: {
            //                         slidesToShow: 1,
            //                         slidesToScroll: 1
            //                     }
            //                 }
            //             ]
            //         });

            //tableSliderInit();

            /*
            $(document).on('click', 'a[data-brand-id]', function (e) {
                e.preventDefault();

                var brandId = $(this).attr('data-brand-id'),
                    brandsSection = $('#all-available-offers'),
                    brandList = $('#brandsList'),
                    new_position = $(brandsSection).offset();

                $('html, body').stop().animate({scrollTop: new_position.top}, 500);

                if (brandList.val() === brandId) {
                    return;
                }
                brandList.val(brandId).change();
            });*/
        }

        //required to handle all products provider selection
        inner.SelectedProvider.subscribe(function () {
            inner.AllProductsLoading(true);
            $('#all-products-slick').slick('unslick');
            inner.AllProductsOrderNumber(1);
        }, null, "beforeChange");
    }

}).apply(InternetCities);

$(document).on('ready', function () {

    $(window).load(function () {
        let winWidth = $(window).width();

        const ellipsestext = "...";
        const moretext = "read more";
        const lesstext = "show less";

        if (winWidth < 768 && location.hash) {
            const hash = location.hash.slice(1);
            $('.terms-table-slider').slick({
                dots: false,
                slidesToShow: 1,
                slidesToScroll: 1,
                adaptiveHeight: true
            });
            const numSlide = $('.' + hash).closest('.slick-slide').attr('data-slick-index');
            $('.terms-table-slider').slick('slickGoTo', parseInt(numSlide));
        }

        if (winWidth < 768) {

            $('.information-section .content').each(function () {
                const contentHtml = $(this).html();
                const firstP = $(this).find('p')[0];
                const showChar = $(firstP).html().length;

                if (contentHtml.length > showChar) {
                    var html = '<p>' + $(firstP).html() + '</p>' +
                        '<span class="morecontent">' +
                        '<span>' + contentHtml + '</span>' +
                        '<a href="#" class="morelink">' + moretext + '</a></span>';

                    $(this).html(html);
                }
            });
        }
        $(".morelink").click(function () {
            if ($(this).hasClass("less")) {
                $(this).removeClass("less");
                $(this).html(moretext);
            } else {
                $(this).addClass("less");
                $(this).html(lesstext);
            }
            $(this).parent().prev().toggle();
            $(this).prev().toggle();
            return false;
        });
    });

    $(document).on('click', '.providers-table .slide-cell', function () {
        const $hiddenRow = $(this).parent().next('.hidden-row ');

        if ($hiddenRow.hasClass('open')) {
            $(this).removeClass('open');
            $hiddenRow.removeClass('open');
        } else {
            $(this).addClass('open');
            $hiddenRow.addClass('open');
        }

        $hiddenRow.find('td .hidden-content').slideToggle();
    });

    $("#zipCode").keypress(function (e) {
        if (e.keyCode == 13) {
            $('#cyh_process_zip').trigger('click');
        }
    });

    $('#cyh_process_zip').on('click', function (e) {
        $('#cyh_process_status').text('').addClass('loading');

        var validationResult = validateZip($('#zipCode').val());
        if (!validationResult) {
            $('#cyh_process_status').addClass('error-message').removeClass('loading').text('Please enter accurate zip code');
            setTimeout(function () {
                $('#cyh_process_status').removeClass('error-message').text('');
                $('#zipCode').val($('#currentZipCode').val());
            }, 3000);
            return;
        }
        var data = {
            'action': 'cyh_find_city',
            'zip_code': $('#zipCode').val()
        };

        $.post(ajax_object.ajax_url, data, function (resp) {
            var response = $.parseJSON(resp);
            if (response.result == 'success') {
                window.location.href = response.link;
                $('#cyh_process_status').removeClass('error-message');

            } else {
                $('#cyh_process_status').addClass('error-message').removeClass('loading').text('Please enter accurate zip code');
                setTimeout(function () {
                    $('#cyh_process_status').removeClass('error-message').text('');
                    $('#zipCode').val($('#currentZipCode').val());
                }, 3000);
                e.preventDefault();
            }
        });

        e.preventDefault();
    });

    function validateZip(zipCode) {
        var isValidZip = /(^\d{5}$)|(^\d{5}-\d{4}$)/.test(zipCode);
        return isValidZip;
    }
});
