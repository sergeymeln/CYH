<?php /* @var $spInfo \CYH\Models\ServiceProvider */ ?>
<?php
$formattedPhone = \CYH\Helpers\FormatHelper::FormatPhoneNumber($spInfo->Phone->Number);
?>
<div class="row">
    <div class="col-md-12">
        <div class="blue-bg">
            <h2>Protect Your Family Today</h2>
            <p>Get 24/7 professional monitoring with an ADT Home Security System.</p>
            <a href="tel:<?php echo $formattedPhone;?>" class="btn btn-orange btn-lg">Call <?php echo $formattedPhone;?> to order ADT!</a>
        </div>
    </div>
</div>