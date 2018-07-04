<?php
/* @var $groupInfo \CYH\Models\Groups\GroupInfo */
?>
<div class="row grey-bg">
    <div class="col-sm-6 mtop20 mbottom20 vertical-separator">
        <p class="text-black text-center mbottom0">
            Want to create an account?
        </p>
        <p class="text-black text-center mbottom0">
            <a class="text-black text-decoration-under"
               href="<?php echo $urlPrefix; ?>register/?groupId=<?php echo $groupInfo->Id; ?>">
                CLICK HERE
            </a>
        </p>
        <p class="text-black text-center mbottom0">
            <small>
                It takes only 2 minutes and ensures eligibility for all special offers and discounts!
            </small>
        </p>
    </div>
    <div class="col-sm-6 mbottom20 mtop20">
        <p class="text-black text-center mbottom0">
            Ready to order your new service?
        </p>
        <p class="text-black text-center mbottom0">
            <a class="text-black text-decoration-under"
               href="tel:<?php echo \CYH\Helpers\FormatHelper::FormatPhoneNumber($groupInfo->SpPhone); ?>">
                CALL <?php echo \CYH\Helpers\FormatHelper::FormatPhoneNumber($groupInfo->SpPhone); ?>
            </a>
        </p>
    </div>
</div>