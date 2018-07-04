<?php /* @var $spInfo \CYH\Models\ServiceProvider */ ?>
<section class="hero">
    <div class="row">
        <div class="col-md-12">
            <div class="masthead">
                <?php
                $hero_image = get_field('homepage_hero');
                ?>
                <?php if (isset($spInfo->HeroImage)) {?>

                    <img src="<?php echo $spInfo->HeroImage; ?>" alt="<?php echo $spInfo->Name; ?>" />

                <?php } else {?>

                    <img src="<?php echo $hero_image["url"]; ?>" alt="<?php echo $hero_image['alt'] ?>" />

                <?php } ?>

            </div>
        </div>
    </div>
</section>