<div class="table-responsive">

    <table class="table table-striped table-hover">
        <tr>
            <th>Barcode</th>
            <th>Product</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Image</th>
            <th>Date</th>
            <th>
                <a href="<?= URLROOT ?>/admin/add">
                    <button class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add new</button>
                </a>
            </th>
        </tr>

        <?php if (!empty($products)) : ?>
            <?php foreach ($products as $product) : ?>
                <tr>
                    <td><?= $product['barcode'] ?></td>
                    <td>
                        <a href="#">
                            <?= $product['description'] ?>
                        </a>
                    </td>
                    <td><?= $product['qty'] ?></td>
                    <td><?= $product['amount'] ?></td>
                    <td>
                        <img src="<?= PUBROOT . '/' . crop($product['image']) ?>" style="width: 100%;max-width:100px;">
                    </td>
                    <td><?= date("jS M, Y", strtotime($product['date'])) ?></td>
                    <td>
                        <a href="<?= URLROOT ?>/admin/edit/<?= $product['product_id']; ?>">
                            <button class="btn btn-success btn-sm">Edit</button>
                        </a>
                        <a href="<?= URLROOT ?>/admin/delete/<?= $product['product_id']; ?>">
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>

    </table>
</div>