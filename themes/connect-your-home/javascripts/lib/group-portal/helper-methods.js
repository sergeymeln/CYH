function InitializeValidation(selector) {
    $(selector).validator({
        disable: false,
        custom: {
            customEmail: function($el) {
                regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                if (!regex.exec($el.val()))
                {
                    return $el.data('customemail-error');
                }
            }
        }
    }).on('submit', function (e) {
        if (!e.isDefaultPrevented()) {
            //if validation successfully passed
            $.LoadingOverlay("show");
        }
    });
    $(selector).on('valid.bs.validator', function (e) {
        $(e.relatedTarget).data("title", e.detail)
            .tooltip("destroy");
    })
    $(selector).on('invalid.bs.validator', function (e) {
        $(e.relatedTarget).tooltip("destroy") // Destroy any pre-existing tooltip so we can repopulate with new tooltip content
            .data("title", e.detail)
            .tooltip();
    });
}

function RenderSuiteSelect(selector, suites, selectedSuite) {
    var suiteOptions = "";
    var selected = '';

    if (selectedSuite == null && suites.length > 0) {
        // if no selected suite given - make first default
        selected = suites[0];
    }
    for (var i = 0; i < suites.length; i++) {
        if (selectedSuite != null && selectedSuite == suites[i]) {
            selected = 'selected'
        }
        else {
            selected = '';
        }
        suiteOptions += '<option value="' + suites[i] + '" ' + selected + '>' + suites[i] + '</option>';
    }
    var selectField = '<select class="apt-number form-control" name="suite" >' + suiteOptions + '</select>'

    selector.find('.apt-bar-section').html(selectField);
    var aptSelector = selector.find('.apt-number');
    aptSelector.addClass('flasher');
    aptSelector.change(function () {
        var addr = JSON.parse(getCookie(selector.data('widgetid')));
        addr.Suite = this.value;
        setCookie(selector.data('widgetid'), JSON.stringify(addr));
    });
}