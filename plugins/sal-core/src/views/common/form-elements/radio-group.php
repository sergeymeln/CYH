<?php
/* @var $list array */
/* @var $selectedKey string */
/* @var $model \CYH\Models\Html\Element Currently not used */

if (empty($selectedKey))
{
    $selectedKey = (reset($list))->Value;
}

foreach ($list as $value) {
    /* @var $value \CYH\Models\Html\Element */
    ?>
    <div class="radio">
        <label>
            <?php
            do_action('\\' . CYH\Controllers\Common\FormRenderController::class . '::RenderInput', $value, $selectedKey);
            echo $value->Label;
            ?>
        </label>
    </div>
    <?php
}
