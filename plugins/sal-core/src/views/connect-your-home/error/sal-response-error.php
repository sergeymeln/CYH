<div class="row">
    <div class="col-sm-12">
        <section id="content" role="main">
            <header class="header text-green">
                <h1 class="entry-title">Sorry, we encountered a search error</h1>
            </header>
            <section class="entry-content text-center">
                <p>Please try your search again or scroll down to see all providers</p>
            </section>
            <?php
            do_action('\CYH\Controllers\ConnectYourHome\UIComponentsController::RenderGrid', $list);
            ?>
            <div class="disclaimer">
                <p>Prices and promotions are subject to change. Existing customers are not eligible. Discounts can
                    only be applied to new customer and qualifying packages only. Call or click for complete details
                    and restrictions. VISA Gift Cards fulfilled by Connect Your Home&reg; through third-party
                    provider, rebategift.com, upon installation of services and requires 24-36 Month Agreement.</p>
            </div>
        </section>
    </div>
</div>