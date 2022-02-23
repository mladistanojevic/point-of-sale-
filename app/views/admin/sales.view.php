<div class="table-responsive">

    <table class="table table-striped table-hover">
        <tr>
            <th>Recipt No</th>
            <th>Barcode</th>
            <th>Description</th>
            <th>Qty</th>
            <th>Amount</th>
            <th>Total</th>
            <th>Date</th>
            <th>Cashier</th>
            <th>
                <a href="<?= URLROOT ?>/signup">
                    <button class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add new</button>
                </a>
            </th>
        </tr>

        <?php if (!empty($sales)) : ?>
            <?php foreach ($sales as $sale) : ?>
                <tr>
                    <td><?= $sale['recipt_no'] ?></td>
                    <td> <?= $sale['barcode'] ?></td>
                    <td><?= $sale['description'] ?></td>
                    <td><?= $sale['qty'] ?></td>
                    <td><?= $sale['amount'] ?></td>
                    <td><?= $sale['total'] ?></td>
                    <td><?= date("jS M, Y", strtotime($sale['date'])) ?></td>
                    <td><?= $sale['username']; ?></td>

                </tr>
            <?php endforeach; ?>
        <?php endif; ?>

    </table>
</div>