<ul class="plus-list text-left">
    <?php
    /* @var $item \CYH\Helpers\Parsers\BulletSection */
    foreach ($item->GetParsedContent() as $sectionItem) {
        ?>
        <li>
            <?php echo $sectionItem ?>
        </li>

        <?php
    }
    ?>
</ul>
