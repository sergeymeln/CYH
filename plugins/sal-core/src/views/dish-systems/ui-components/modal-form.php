<div id="get-a-quote" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">close</span></button>

            </div>
            <div class="modal-body">
                <div>
                    <h2 class="text-center">Thank you for reaching out to DISH Systems!</h2>
                </div>

                <div id="modal-custom-content">
                    <?php if (isset($customFormContent)): ?>
                        <div>
                            <a class="btn btn-danger btn-block" href="tel:866-989-3474">You must CALL now to secure your order<br>866-989-3474</a>
                        </div>
                        <div>
                            Order Summary - Call now to place your order with a live agent
                        </div>
                        <table>
                            <?php foreach ($customFormContent as $contentItem):?>
                                <tr>
                                    <td class="user-info-table-row"><?php echo $contentItem['name']; ?></td>
                                    <td class="user-info-table-row"><?php echo $contentItem['value']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    <?php endif;?>
                </div>
            </div>
            <div class="footer-cta" style="width: 100%;">
                <p id="success">
                    We will be in touch shortly.</p>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
