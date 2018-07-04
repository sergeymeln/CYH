<?php
/* @var $input \CYH\Models\Html\Element */
/* @var $selectedKey string */
?>
<input name="<?php echo $input->Name; ?>" value="<?php echo $input->Value; ?>" <?php echo ($input->Value == $selectedKey) ? 'checked' : '' ?>
    <?php do_action('\\' . CYH\Controllers\Common\FormRenderController::class . '::RenderAttributes', $input->Arrtibutes) ?> class="<?php echo $input->CssClass; ?>"
>
