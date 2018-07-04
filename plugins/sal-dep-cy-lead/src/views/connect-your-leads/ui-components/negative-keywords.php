<?php if (isset($keywordsArr) && count($keywordsArr) > 0) : ?>
<div class="row">
    <div class="col-sm-offset-2 col-sm-8">
        <table class="table table-condensed table-striped">
            <thead>
            <tr>
                <th><strong>Term</strong></th>
                <th><strong>Match Type</strong></th>
            </tr>
            </thead>
            <?php foreach ($keywordsArr as $keyword) : ?>
                <tr>
                    <td><?php echo $keyword[0]; ?></td>
                    <td>
                        <?php echo (isset($keyword[1]) && !empty($keyword[1])) ? $keyword[1] : 'Negative Broad'; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>

<?php endif; ?>
