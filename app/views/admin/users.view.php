<div class="table-responsive">

    <table class="table table-striped table-hover">
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            <th>Gender</th>
            <th>Date</th>
            <th>
                <a href="<?= URLROOT ?>/signup">
                    <button class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add new</button>
                </a>
            </th>
        </tr>

        <?php if (!empty($users)) : ?>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?= $user['username'] ?></td>
                    <td> <?= $user['email'] ?></td>
                    <td><?= $user['role'] ?></td>
                    <td><?= $user['gender'] ?></td>
                    <td><?= date("jS M, Y", strtotime($user['date'])) ?></td>

                </tr>
            <?php endforeach; ?>
        <?php endif; ?>

    </table>
</div>