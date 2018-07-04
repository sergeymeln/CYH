<div class="all-results">
    <?php
    if (!empty($list)) {
        do_action('\\' . CYH\Controllers\ConnectYourHome\UIComponentsController::class . '::RenderGrid', $list);
    } else {
        do_action('\\' . CYH\Controllers\ConnectYourHome\UIComponentsController::class . '::RenderContentNotFound', \CYH\ViewModels\ContentNotFound::GetModel(\CYH\Models\Core\ResultCodes::ERROR, 'We were unable to load the content. Please try again later and if the issue persists please contact us'));
    }
    ?>
</div>
