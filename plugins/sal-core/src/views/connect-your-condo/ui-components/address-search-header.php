<?php
/* @var $header \CYH\ViewModels\CYH\ResultsHeaderSection */
?>
<section class="results-header">
    <div class="row top-info">
        <div class="col-md-12">
            <div class="breadcrumbs">
                <?php if (function_exists('qt_custom_breadcrumbs') && $header->DisplayBreadcrumbs == true) {
                    qt_custom_breadcrumbs();
                    echo " for <a class='resultsAddress'>" . $header->Address->Street . ' ' . $header->Address->Route . ' ';
                    echo (!empty($header->Address->Suite) ? ' ' . $header->Address->Suite : '') . ", " . $header->Address->City . ", " . $header->Address->State . "  - " . $header->Address->Zip . "</a>";
                }
                ?>
            </div>
        </div>
    </div>
</section>
