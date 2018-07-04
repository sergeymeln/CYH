<?php
/* @var $list array*/
/* @var $selectedKey string*/
/* @var $model \CYH\Models\Html\Element*/
?>
<select class="<?php echo $model->CssClass; ?>" name="<?php echo $model->Name; ?>" id="<?php echo $model->Id; ?>"
    <?php do_action('\\' . CYH\Controllers\Common\FormRenderController::class . '::RenderAttributes', $model->Arrtibutes) ?> >
    <?php
    foreach ($list as $value) {
        do_action('\\' . CYH\Controllers\Common\FormRenderController::class . '::RenderOption', $value, $selectedKey);
    }
    ?>
</select>
