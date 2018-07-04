<section class="mbottom20">
    <div class="row">
        <div class="brand-band">
            <h2>
                <?php echo $groupInfo->Name; ?><?php echo !empty($groupInfo->AudienceDesignation) ? ' ' . $groupInfo->AudienceDesignation : ''; ?>
                Discounts On These Great Brands</h2>
            <?php
            if (count($groupServiceProviders) > 0):
                foreach ($groupServiceProviders as $sp) {
                    /* @var $sp \CYH\Models\ServiceProvider */
                    ?>
                    <img class="brand-band-img" src="<?php echo $sp->Logo; ?>">
                    <?php
                }
            endif;
            ?>
        </div>
    </div>
</section>
