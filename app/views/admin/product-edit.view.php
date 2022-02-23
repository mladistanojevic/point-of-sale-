<?php require_once APPROOT . '/views/includes/head.php'; ?>
<?php require_once APPROOT . '/views/includes/nav.php'; ?>

<div class="container-fluid border rounded p-4 m-2 col-lg-4 mx-auto">

    <?php if (!empty($row)) : ?>

        <form method="post" enctype="multipart/form-data">

            <h5 class="text-primary"><i class="fa fa-hamburger"></i> Edit Product</h5>

            <div class="mb-3">
                <label for="productControlInput1" class="form-label">Product description</label>
                <input value="<?= $row['description'] ?>" name="description" type="text" class="form-control <?= $descriptionError ? 'border-danger' : '' ?>" id="productControlInput1" placeholder="Product description">
                <?php if ($descriptionError) : ?>
                    <div class="alert alert-danger mt-1" role="alert">
                        <?= $descriptionError; ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label for="barcodeControlInput1" class="form-label">Barcode <small class="text-muted">(optional)</small></label>
                <input value="<?= $row['barcode'] ?>" name="barcode" type="text" class="form-control <?= $barcodeError ? 'border-danger' : '' ?>" id="barcodeControlInput1" placeholder="Product barcode">
                <?php if ($barcodeError) : ?>
                    <div class="alert alert-danger mt-1" role="alert">
                        <?= $barcodeError; ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text">Qty:</span>
                <input name="qty" value="<?= $row['qty'] ?>" type="number" class="form-control <?= !empty($errors['qty']) ? 'border-danger' : '' ?>" placeholder="Quantity" aria-label="Quantity">
                <span class="input-group-text">Amount:</span>
                <input name="amount" value="<?= $row['amount'] ?>" step="0.05" type="number" class="form-control <?= !empty($errors['amount']) ? 'border-danger' : '' ?>" placeholder="Amount" aria-label="Amount">
            </div>
            <?php if (!empty($errors['qty'])) : ?>
                <small class="text-danger"><?= $errors['qty'] ?></small>
            <?php endif; ?>
            <?php if (!empty($errors['amount'])) : ?>
                <small class="text-danger"><?= $errors['amount'] ?></small>
            <?php endif; ?>
            <br>
            <div class="mb-3">
                <label for="formFile" class="form-label">Product Image</label>
                <input name="image" class="form-control" type="file" id="formFile">
                <?php if (!empty($errors['image'])) : ?>
                    <small class="text-danger"><?= $errors['image'] ?></small>
                <?php endif; ?>
            </div>
            <br>
            <img class="mx-auto d-block" src="<?= PUBROOT . '/' . $row['image'] ?>" style="width:80%;">
            <br>
            <button class="btn btn-danger float-end">Save</button>
            <a href="<?= URLROOT ?>/admin/products">
                <button type="button" class="btn btn-primary">Cancel</button>
            </a>
        </form>
    <?php else : ?>
        That product was not found
        <br><br>
        <a href="<?= URLROOT ?>/admin/products">
            <button type="button" class="btn btn-primary">Back to products</button>
        </a>

    <?php endif; ?>

</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>