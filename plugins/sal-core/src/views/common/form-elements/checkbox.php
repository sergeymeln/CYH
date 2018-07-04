<?php
/* @var $input \CYH\Models\Html\Element */
/* @var $checked boolean */
?>
<div class="checkbox">
    <label>
        <input type="checkbox" name="<?php echo $input->Name; ?>" value="<?php echo $input->Value; ?>" <?php echo ($checked) ? 'checked' : '' ?>
            <?php do_action('\\' . CYH\Controllers\Common\FormRenderController::class . '::RenderAttributes', $input->Arrtibutes) ?> class="<?php echo $input->CssClass; ?>">
        <?php echo $input->Label; ?>
    </label>
</div>
