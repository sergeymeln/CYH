<?php /* @var $disclaimer \CYH\ViewModels\UI\DisclaimerItem */ ?>

<section class='disclaimer'>
    <?php if (!empty($disclaimer->Disclaimer)): ?>
        <p class="disclaimer-bottom">
            <?php echo $disclaimer->Disclaimer; ?>
        </p>
    <?php endif; ?>

    <?php if (!empty($disclaimer->TermsOfService)): ?>
        <button type="button" class="btn btn-info btn-md pull-right" id="myBtn">
            Terms & Conditions
        </button>
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            &times;
                        </button>
                        <h4 class="modal-title">
                            Terms & Conditions
                        </h4>
                    </div>
                    <div class="modal-body">
                        <p class='disclaimerHolder'>
                            <?php echo $disclaimer->TermsOfService; ?>
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
</section>
