<aside class="col-md-4 pull-left">
    <nav>
        <h3 class="title-bar">DISH Network Packages & Channels</h3>
        <?php wp_nav_menu( array( 'theme_location' => 'sidebar-menu' ) ); ?>
    </nav>
    <section class="need-help">
        <h3 class="title-bar">Order By Phone</h3>
        <div class="need-help">
            <?php the_field('sidebar_help', 'option'); ?>
        </div>
    </section>
    <section class="credt-free-option">
        <h3 class="title-bar">Worry No More</h3>
        <div class="no-credit-content">
            <?php the_field('sidebar_no_credit', 'option'); ?>
        </div>
    </section>
</aside>