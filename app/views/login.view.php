<?php require_once APPROOT . '/views/includes/head.php'; ?>
<div class="container-fluid border col-lg-4 col-md-5 mt-5 p-4 shadow">

    <form method="post">
        <center>
            <h1><i class="fa fa-user"></i></h1>
            <h3>Login</h3>
        </center>
        <br>

        <div class="mb-3">
            <input type="email" name="email" value="<?= get_val('email'); ?>" class="form-control <?= $emailError ? 'border-danger' : '' ?>" id="exampleFormControlInput1" placeholder="Email">
        </div>
        <?php if ($emailError) : ?>
            <div class="alert alert-danger" role="alert">
                <?= $emailError; ?>
            </div>
        <?php endif; ?>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Password</span>
            <input type="text" name="password" class="form-control <?= $passwordError ? 'border-danger' : '' ?>" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
        </div>
        <?php if ($passwordError) : ?>
            <div class="alert alert-danger" role="alert">
                <?= $passwordError; ?>
            </div>
        <?php endif; ?>

        <br>
        <div class="row">
            <button class="btn btn-primary" style="font-size: 20px;">Login</button>
        </div>
    </form>
</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>