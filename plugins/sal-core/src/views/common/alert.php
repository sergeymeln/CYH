<?php

/* @var $alert \CYH\ViewModels\Alert */
switch ($alert->Status) {
    case \CYH\Models\Core\ResultCodes::SUCCESS:
        $class = 'alert-success';
        break;
    case \CYH\Models\Core\ResultCodes::WARNING:
        $class = 'alert-warning';
        break;
    case \CYH\Models\Core\ResultCodes::ERROR:
        $class = 'alert-danger';
        break;
    case \CYH\Models\Core\ResultCodes::INFO:
        $class = 'alert-info';
        break;
}

if ($alert->IsCentered) {
    $class .= ' text-center';
}

if ($alert->IsDismissable) {
    $class .= ' alert-dismissible';
}

?>
<div class="alert <?php echo $class; ?>" role="alert">
    <?php if ($alert->IsDismissable): ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">×</span></button>
    <?php endif; ?>

    <?php echo $alert->Message; ?>
</div>
