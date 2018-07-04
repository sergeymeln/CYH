<?php

/* @var $list array */
?>
<section class="brands">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <h2>
                        Top Brands to Serve You
                    </h2>
                </div>
            </div>
            <div class="text-center">
                <?php
                if (count($list) > 0):
                    $counter = 0;
                    foreach ($list as $sp) {
                        $counter++;
                        /* @var $sp \CYH\Models\ServiceProvider */
                        ?>
                        <img class="brand-band-img mleft20 mright20 mtop20" src="<?php echo $sp->Logo; ?>">
                        <?php
                    }
                endif;
                ?>
            </div>
        </div>
        <!-- /.col-md-12 -->
    </div>
    <!-- /.row -->
    <div class="row service-cta mtop30">
        <div class="col-md-12">
            <a href="<?php echo $brandsLink; ?>" class="btn btn-success btn-lg"
               style="width: auto;display: inline-block;">
                Review Services Now
            </a>
        </div>
    </div>

</section>