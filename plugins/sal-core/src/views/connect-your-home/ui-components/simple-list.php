<?php
/* @var $simpleList \CYH\ViewModels\UI\SimpleListItem */

$counter = 0;
?>
<section class="packages">
    <?php
    // check if the repeater field has rows of data
    if (!empty($simpleList->ListItems) && count($simpleList->ListItems) > 0):
        foreach ($simpleList->ListItems as $item) {
            /* @var $item \CYH\ViewModels\UI\ListItem */
            if ($counter == 2) {
                do_action('\CYH\Controllers\ConnectYourHome\UIComponentsController::RenderAddressSearchEmbedded', $simpleList->AddressSearchEmbedded);
            }
            ?>
            <div class="package-module <?php echo (($counter + 1) % 2 != 0) ? '' : 'grey-bg'; ?>"
                 id="<?php echo $item->IdLink ?>">
                <div class="inner">
                    <div class="row">
                        <div class="col-md-8 col-sm-6">
                            <h3>
                                <?php echo $item->Title ?>
                            </h3>
                            <p>
                                <?php echo $item->Tagline ?>
                            </p>
                            <ul class="plus-list">
                                <?php
                                do_action('\CYH\Controllers\Common\CommonUIComponents::RenderDescription', $item->Description, 'common', 'common' );
                                ?>
                            </ul>
                        </div>

                        <div class="col-md-4 col-sm-6">
                            <?php if (!empty($item->ChannelCount)) { ?>
                                <div class="channel-count">
                                    <span class="count">
                                        <?php echo $item->ChannelCount; ?>
                                        <span class="count-strap">
                                            <?php echo $item->ChannelCountLabel; ?>
                                        </span>
                                    </span>
                                </div>
                            <?php } else {
                                if (!empty($item->Logo)) {
                                    echo '<img class="icon-brand" src="' . $item->Logo . '" alt=""/>';
                                }
                            }
                            ?>

                            <div class="price" style="margin-top: 40px;">
                                <?php if (!empty($item->Price)) { ?>
                                    <p><?php echo $item->StartingAtDescription ?></p>
                                    <span class="price-value">$<?php echo $item->Price ?>
                                    </span>
                                    <br/>
                                    <span class="price-strap">
                                    <?php echo $item->EndingAtDescription ?>
                                </span>

                                <?php } ?>

                                <a href="<?php echo $item->ActionButton->Link ?>"
                                   class="<?php echo !empty($item->ActionButton->CssClass) ? $item->ActionButton->CssClass : 'btn btn-success' ?>"
                                   target="<?php echo $item->ActionButton->Target ?>">
                                <?php echo $item->ActionButton->Label ?>
                                </a>

                                <?php if (!is_null($item->TermsAndConditions)): ?>
                                <button type="button" class="<?php echo $item->TermsAndConditions->LegalButton->CssClass ?>" data-toggle="modal" data-target="#<?php echo $item->TermsAndConditions->Id ?>">
                                    <?php echo $item->TermsAndConditions->LegalButton->Label ?>
                                </button>
                                <div class="modal fade" id="<?php echo $item->TermsAndConditions->Id ?>" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">
                                                    &times;
                                                </button>
                                                <h4 class="modal-title">
                                                    <?php echo $item->TermsAndConditions->Title ?>
                                                </h4>
                                            </div>
                                            <div class="modal-body">
                                                <p class='text-left'>
                                                    <?php echo $item->TermsAndConditions->Text ?>
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                                    Close
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            $counter++;
        }
    else :
    endif;
    ?>
</section>
