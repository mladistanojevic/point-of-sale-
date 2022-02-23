<nav class="navbar navbar-expand-lg navbar-light bg-light" style="min-width:350px">
    <a class="navbar-brand" href="#"><?= APPNAME ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="<?= URLROOT; ?>">Point Of Sale</a>
            </li>
            <?php if (isLogged() && $_SESSION['user']->role == 'admin') : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= URLROOT ?>/admin">Admin</a>
                </li>
            <?php endif; ?>
            <?php if (!isLogged()) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= URLROOT ?>/login">LogIn</a>
                </li>
            <?php else : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= URLROOT ?>/logout">Logout</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>