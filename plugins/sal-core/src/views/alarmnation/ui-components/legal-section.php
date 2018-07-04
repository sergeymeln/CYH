<?php /* @var $spInfo \CYH\Models\ServiceProvider */ ?>
<br>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="footer-headline">
            <small>
                <?php $footerText = get_field('footer_text');
                if( !empty($footerText)) {
                    echo $spInfo->Legal;
                    ?>
                <?php } ?>
            </small>
        </div>
    </div>
</div>
<br>
