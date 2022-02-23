<?php require_once APPROOT . '/views/includes/head.php'; ?>
<?php require_once APPROOT . '/views/includes/nav.php'; ?>
<div class="container-fluid con border col-lg-5 col-md-7 col-sm-9 mt-5 p-2 shadow">

    <form method="post">
        <center>
            <h3><i class="fa-solid fa-address-card"></i>Create New User</h3>
        </center>
        <br>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Username</label>
            <input type="text" name="username" value="<?= get_val('username'); ?>" class="form-control <?= $usernameError ? 'border-danger' : '' ?>" id="exampleFormControlInput1" placeholder="Username">
        </div>
        <?php if ($usernameError) : ?>
            <div class="alert alert-danger" role="alert">
                <?= $usernameError; ?>
            </div>
        <?php endif; ?>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input type="email" name="email" value="<?= get_val('email'); ?>" class="form-control <?= $emailError ? 'border-danger' : '' ?>" id="exampleFormControlInput1" placeholder="name@example.com">
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

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Retype Password</span>
            <input type="text" name="password2" class="form-control <?= $password2Error ? 'border-danger' : '' ?>" placeholder="Retype Password" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <?php if ($password2Error) : ?>
            <div class="alert alert-danger" role="alert">
                <?= $password2Error; ?>
            </div>
        <?php endif; ?>
        <div class="input-group mb-3">
            <select class="my-2 form-control" name="gender" placeholder="Gender" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>

        <br>
        <button class="btn btn-primary float-end">Add</button>
        <a href="<?= URLROOT ?>/admin/users">
            <button type="button" class="btn btn-danger">Cancel</button>
        </a>
    </form>
</div>


<?php require_once APPROOT . '/views/includes/footer.php'; ?>