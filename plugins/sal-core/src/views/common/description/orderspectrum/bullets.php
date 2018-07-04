<style>
    .order-spectrum{
    list-style: none;
    padding-left: 25px;
    }
    .order-spectrum > li::before{
        content: "-";
        color: #908482;
        font-size: 25px;
        font-family: 'FontAwesome';
        left: -24px;
        top: 0;
        font-weight: 700;
        line-height: 1;
    }
    .text-left {
        text-align: left;
    }
</style>

<ul class="order-spectrum text-left">
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
