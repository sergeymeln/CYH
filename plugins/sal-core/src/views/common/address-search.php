<?php
/* @var $addressSearch \CYH\ViewModels\AddressSearch */
?>
    <div class="mbottom10">
        <div class="address-search-widget" data-widgetid="<?php echo $addressSearch->WidgetId ?>">
            <div class="row" data-prepopulate="false">
                <div class="col-sm-9">
                    <div class="row">
                        <div class="address-bar-section col-sm-12">
                            <input id="prepopulatedAddr"
                                   class="addr-search-inline form-control input address-autocomplete ui-autocomplete-input"
                                   type="form-control" placeholder="Enter address"
                                   autocomplete="off">
                            <input id="existingCustomerAddress" type="hidden"
                                   value="<?php echo $addressSearch->ExistingAddress; ?>">
                            <input id="existingCustomerAptNo" type="hidden"
                                   value="<?php echo $addressSearch->ExistingAptNo; ?>">
                        </div>
                        <div class="apt-bar-section">

                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <a href="<?php echo $addressSearch->GetSearchLink() ?>" disabled
                       class="btn btn-green search-button-header address-submit-btn"
                       title="Please select an address from the autocomplete dropdown in order to find deals near you!">
                        Search
                    </a>
                </div>
            </div>
            <p id="address-widget-message" class="text-danger text-left hide">
                <small>Please select an address from the autocomplete dropdown in order to find deals near you!</small>
            </p>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            var autocompleteSelector = ".address-search-widget[data-widgetid='<?php echo $addressSearch->WidgetId ?>'] .addr-search-inline";
            $(autocompleteSelector).autocomplete(
                {
                    showHeader: true,
                    minLength: 4,
                    delay: 200,
                    create: function (event, ui) {
                        this.widgetState = new WidgetState();
                        var widgetState = this.widgetState;
                        var widgetRoot = $(this).parents('.address-search-widget').first();
                        widgetRoot.find('.address-submit-btn').click(function (e) {
                            if ($(this).attr('disabled') != 'disabled') {
                                widgetRoot.find('#address-widget-message').addClass("hide");
                                var urlParts = $(this).attr('href').split('?');
                                if (!widgetState.HasBeenChanged) {
                                    $(this).attr('href', urlParts[0] + '?search=0');
                                }
                            }
                            else {
                                e.preventDefault();
                                widgetRoot.find('#address-widget-message').removeClass("hide");
                            }
                        });

                        if (widgetRoot.data('prepopulate') == true) {
                            var address = widgetRoot.find('#existingCustomerAddress').val();

                            if (address !== null && address.trim() !== '') {
                                $(this).autocomplete('search', address);
                            }
                            else {
                                widgetRoot.data('prepopulate', false);
                            }
                        }
                    },
                    source: function (request, response) {
                        var widget = $(this.element).parents('.address-search-widget').first();
                        widget.find('.address-submit-btn').attr('disabled', 'disabled');
                        $('.address-search-widget').LoadingOverlay("show");

                        var url = "https://expressentry.melissadata.net/";
                        var id = "113933534";
                        $.getJSON(url + "jsonp/ExpressFreeForm?callback=?", {
                                format: "jsonp",
                                id: id,
                                FF: request.term,
                                maxrecords: "30"
                            }, (function (widget) {
                                return function (data) {
                                    if (data.Results.length == 0) {
                                        widget.find('.address-submit-btn').attr('disabled', 'disabled');
                                    }
                                    response($.map(data.Results, function (item) {
                                        if (item.Address.SuiteCount == 1)
                                            return {
                                                label: item.Address.AddressLine1 + " " + item.Address.City + " " + item.Address.SuiteName + " " + item.Address.SuiteCount + ", " + item.Address.State + " " + item.Address.PostalCode,
                                                value: item.Address.AddressLine1 + " " + item.Address.City + ", " + item.Address.SuiteName + " " + item.Address.SuiteCount + ", " + item.Address.State + " " + item.Address.PostalCode,
                                                addObj: item
                                            };
                                        else if (item.Address.SuiteCount > 1)
                                            return {
                                                label: item.Address.AddressLine1 + " " + item.Address.City + " (" + item.Address.SuiteName + "" + "), " + item.Address.State + " " + item.Address.PostalCode,
                                                value: item.Address.AddressLine1 + " " + item.Address.City + ", " + item.Address.State + " " + item.Address.PostalCode,
                                                addObj: item
                                            };
                                        else
                                            return {
                                                label: item.Address.AddressLine1 + " " + item.Address.City + ", " + item.Address.State + " " + item.Address.PostalCode,
                                                value: item.Address.AddressLine1 + " " + item.Address.City + ", " + item.Address.State + " " + item.Address.PostalCode,
                                                addObj: item
                                            };
                                    }));
                                }
                            })(widget)
                        ).done(function () {
                            $('.address-search-widget').LoadingOverlay("hide");
                        });
                    },

                    select: function (evt, ui) {
                        this.widgetState.HasBeenChanged = true;
                        var res = ui.item.addObj;

                        var address = new Address({
                            BdNumber: res.Address.AddressLine1.substr(0, res.Address.AddressLine1.indexOf(' ')),
                            Street: res.Address.AddressLine1.substr(res.Address.AddressLine1.indexOf(' ') + 1),
                            Zip: res.Address.PostalCode.split("-")[0],
                            City: res.Address.City,
                            Country: "USA",
                            State: res.Address["CountrySubdivisionCode"].split("-")[1],
                            Suite: res.Address.SuiteList[0]
                        });

                        var widgetRoot = $(this).parents('.address-search-widget').first();

                        if (res.Address.SuiteList.length > 1) {
                            var selectedSuite = null;
                            //resetting state for address bar
                            widgetRoot.find('.address-bar-section').removeClass('col-sm-12').addClass('col-sm-8');
                            //resetting state for apartment bar
                            widgetRoot.find('.apt-bar-section').addClass('col-sm-4');
                            if (widgetRoot.data('prepopulate') == true) {
                                selectedSuite = widgetRoot.find('#existingCustomerAptNo').val();
                                address.Suite = selectedSuite;
                            }

                            RenderSuiteSelect(widgetRoot, res.Address.SuiteList, selectedSuite);
                        }
                        else {
                            //resetting state for address bar
                            widgetRoot.find('.address-bar-section').removeClass('col-sm-8').addClass('col-sm-12');
                            //resetting state for apartment bar
                            widgetRoot.find('.apt-bar-section').removeClass('col-sm-4');
                            widgetRoot.find('.apt-bar-section').html('');
                        }

                        widgetRoot.find('#address-widget-message').addClass("hide");
                        widgetRoot.find('.address-submit-btn').removeAttr('disabled');

                        widgetRoot.data('prepopulate', false);

                        var serializedAddrData = JSON.stringify(address);
                        setCookie(widgetRoot.data('widgetid'), serializedAddrData, 1);
                    }
                });

            $(autocompleteSelector).bind('paste', function (e) {
                //forcing autocomplete to update information even if value is the same
                $(autocompleteSelector).autocomplete('search', $(this).val());
            });

            $(autocompleteSelector).focusout(function () {
                var widget = $(this).parents('.address-search-widget').first();
                var inputValue = $.trim($(this).val());
                if (inputValue.length < 4) {// making sure the button is disabled if there is not enough symbols to search
                    widget.find('.address-submit-btn').attr('disabled', 'disabled');
                }
            });
        });

    </script>
<?php
wp_enqueue_script('gp-loadingoverlay');
?>