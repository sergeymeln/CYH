<?php
/* @var $settings array */
?>
<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        var globalSettings = <?php \CYH\Helpers\JsOutputHelper::OutputObjectJson($settings)?>;
        var formSelector = globalSettings['formSelector'];
        $(window).on('scroll', function () {
            if ($('#main-menu').hasClass('stick'))
            {
                $.fn.validator.Constructor.FOCUS_OFFSET = $('#main-menu').outerHeight();
            }
        });
        $(formSelector).validator().on('submit', function (e) {
            if (globalSettings['recaptchaEnabled'] == true)
            {
                //if there was no response submit recaptcha and block form submission to server until recaptcha finishes
                if (!grecaptcha.getResponse()) {
                    event.preventDefault(); //prevent form submit
                    grecaptcha.execute();
                }
            }
        });

        $(formSelector).on('valid.bs.validator', function (e) {
            if ($(e.relatedTarget).is(":checkbox")) {
                $(e.relatedTarget).parent().data("title", e.detail)
                    .tooltip("destroy");
            }
            else {
                $(e.relatedTarget).data("title", e.detail)
                    .tooltip("destroy");
            }
        })
        $(formSelector).on('invalid.bs.validator', function (e) {
            if ($(e.relatedTarget).is(":checkbox")) {
                $(e.relatedTarget).parent().tooltip("destroy") // Destroy any pre-existing tooltip so we can repopulate with new tooltip content
                    .data("title", e.detail)
                    .tooltip();
            }
            else {
                $(e.relatedTarget).tooltip("destroy") // Destroy any pre-existing tooltip so we can repopulate with new tooltip content
                    .data("title", e.detail)
                    .tooltip();
            }


        });
    });

    function onRecaptchaSubmit(token) {
        var globalSettings = <?php \CYH\Helpers\JsOutputHelper::OutputObjectJson($settings)?>;
        if (globalSettings['recaptchaEnabled'] == true)
        {
            jQuery(globalSettings['formSelector']).submit();
        }
    }
</script>
