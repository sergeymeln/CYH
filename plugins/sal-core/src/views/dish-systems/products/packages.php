<section class="hero">
    <div class="row">
        <div class="col-md-12">
            <div class="masthead">
                <?php $hero_image = get_field('hero_img'); ?>
                <a href="/order-dish-network-online">
                    <img src="<?php echo $hero_image['url']; ?>" alt="<?php echo $hero_image['alt'] ?>"/>
                </a>
            </div>
        </div>
    </div>
</section>
<div class="col-md-8 pull-right">
    <h1 class="page-title title-bar">
        <?php the_field('page_title'); ?>
    </h1>
    <div>
        <?php the_content() ?>
    </div>
    <div>
        <?php
        do_action('\\' . \CYH\Controllers\DishSystems\ProductController::class . '::RenderProductsTable', $products); ?>
    </div>
    <?php do_action('\\' . \CYH\Controllers\DishSystems\ProductController::class . '::RenderProductsCards', $products);  ?>
</div>

<?php
do_action('\\' . CYH\Controllers\DishSystems\UIComponentsController::class . '::RenderSidebar');
do_action('\\' . CYH\Controllers\DishSystems\UIComponentsController::class . '::RenderModalForm', []);
?>