<?php  $formattedPhone = \CYH\Helpers\FormatHelper::FormatPhoneNumber($spInfo->Phone->Number); ?>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <hr/>
        <h4 class="footer-headline">
            Call us today at
            <?php  if (!empty($spInfo->Phone->Number)){?>

                <a class="btn btn-success btn-lg btn-blue" href="tel:<?php echo $formattedPhone; ?>"><i class="glyphicon glyphicon-earphone"></i>
                    <?php echo $formattedPhone;  ?></a> for a FREE quote!

            <?php }else{ ?>

                <a class="btn btn-success btn-lg btn-blue" href="tel:<?php echo the_field('cyb_phone_number', 'option') ?>"><i class="glyphicon glyphicon-earphone"></i>
                    <?php the_field('cyb_phone_number', 'option') ?></a> for a FREE quote!

            <?php } ?>
        </h4>
    </div>
</div>