<ul class="plus-list text-left">
    <?php
    /* @var $item \CYH\Helpers\Parsers\BulletSection */
    foreach ($item->GetParsedContent() as $sectionItem) {
        ?>
        <li class="home-product-list-descr">
            <?php echo $sectionItem ?>
        </li>

        <?php
    }
    ?>
</ul>
