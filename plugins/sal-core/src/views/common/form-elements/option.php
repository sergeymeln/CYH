<?php
/* @var $option \CYH\Models\Html\Element */
/* @var $selectedKey string */
?>
<option value="<?php echo $option->Value; ?>" <?php echo ($option->Value == $selectedKey) ? 'selected' : '' ?> <?php do_action('\\' . CYH\Controllers\Common\FormRenderController::class . '::RenderAttributes', $option->Arrtibutes) ?>
 >
    <?php echo $option->Label; ?>
</option>
