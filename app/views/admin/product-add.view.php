<?php require_once APPROOT . '/views/includes/head.php'; ?>
<?php require_once APPROOT . '/views/includes/nav.php'; ?>


<div class="container-fluid border rounded p-4 m-4 col-lg-4 mx-auto">

    <form method="post" enctype="multipart/form-data">

        <h5 class="text-primary"><i class="fa fa-hamburger"></i> Add Product</h5>

        <div class="mb-3">
            <label for="productControlInput1" class="form-label">Product description</label>
            <input name="description" type="text" class="form-control <?= $descriptionError ? 'border-danger' : ''; ?>" id="productControlInput1" placeholder="Product description">
        </div>
        <?php if ($descriptionError) : ?>
            <div class="alert alert-danger" role="alert">
                <?= $descriptionError; ?>
            </div>
        <?php endif; ?>

        <div class="mb-3">
            <label for="barcodeControlInput1" class="form-label">Barcode </label>
            <input name="barcode" type="text" class="form-control  <?= $barcodeError ? 'border-danger' : ''; ?>" id="barcodeControlInput1" placeholder="Product barcode">
        </div>
        <?php if ($barcodeError) : ?>
            <div class="alert alert-danger" role="alert">
                <?= $barcodeError; ?>
            </div>
        <?php endif; ?>

        <div class="input-group mb-3">
            <span class="input-group-text">Qty:</span>
            <input name="qty" value="1" type="number" class="form-control" placeholder="Quantity" aria-label="Quantity">
            <span class="input-group-text">Amount:</span>
            <input name="amount" value="0.00" step="0.05" type="number" class="form-control" placeholder="Amount" aria-label="Amount">
        </div>

        <div class="mb-3">
            <label for="formFile" class="form-label">Product Image</label>
            <input name="image" class="form-control" type="file" id="formFile" required>
        </div>


        <br>
        <button class="btn btn-danger float-end">Save</button>
        <a href="<?= URLROOT ?>/admin/products">
            <button type="button" class="btn btn-primary">Cancel</button>
        </a>
    </form>
</div>


<?php require_once APPROOT . '/views/includes/footer.php'; ?>