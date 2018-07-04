<? /* @var $header \CYH\ViewModels\UI\HeaderSectionItem */ ?>
<style>
    .brands-heading {
        font-size: 44px;
        text-align: center;
        font-family: gotham_boldregular;
    }

    h1.light-grey {
        color: #cccccc;
        display: inline-block;
    }

    span.light-grey {
        color: #cccccc;
        display: inline-block;
        padding: 0 10px;
    }
</style>
<div class="row service-head">
    <div class="col-md-12">
        <div class="brands-heading">
            <?php
            switch ($header->RenderMode) {
                case \CYH\ViewModels\RenderMode::SEPARATED:
                    ?>
                    <h1>
                    <span class="light-grey">
                        <?php echo $header->PageHeadingLeft ?> ::
                    </span>
                        <?php echo $header->PageHeadingRight ?>
                    </h1>
                    <?php
                    break;
                case \CYH\ViewModels\RenderMode::STRING:
                default:
                    echo $header->PageHeadingLeft;
            }
            ?>
        </div>
        <?php if (count($header->HeaderLinks) > 0) : ?>
            <ul class="package-nav">
                <?php
                // loop through the rows of data
                foreach ($header->HeaderLinks as $link) {
                    /* @var $link \CYH\ViewModels\UI\HeaderLink */
                    ?>
                    <li>
                        <a href="<?php echo $link->Link ?>">
                            <?php echo $link->Name ?>
                        </a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        <?php endif; ?>
        <p>
            <?php echo $header->PageStrapline; ?>
        </p>
        <?php if (!empty($header->Description)):  ?>
            <p>
                <?php echo $header->Description ?>
            </p>
        <?php endif;  ?>

    </div>
    <!-- /.col-md-12 -->
</div>
