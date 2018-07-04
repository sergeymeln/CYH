<ul class="plus-list text-left">
    <?php
    /* @var $item \CYH\Helpers\Parsers\BulletSection */
    foreach ($item->GetParsedContent() as $sectionItem) {
        ?>
        <li>
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> <?php echo $sectionItem ?>
        </li>
        <?php
    }
    ?>
</ul>
