<?php require('partials/header.php'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr class="thead-dark text-center">
                        <th>№</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Report subject</th>
                        <th>Email</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 0;
                    foreach ($members as $member) : ?>
                        <tr class="text-center">
                            <td class="align-middle"><?= ++$i ?></td>
                            <?php if ($member['photo'] != null) : ?>
                                <td class="align-middle">
                                    <img class="img rounded-circle profile-img" src="public/images/<?=$member['photo']; ?>">
                                </td>
                            <?php else : ?>
                                <td class="align-middle">
                                    <img class="img rounded-circle profile-img" src="public/images/default.jpg">
                                </td>
                            <?php endif; ?>


                            <td class="align-middle"><?= $member['firstname'] . " " . $member['lastname'] ?></td>
                            <td class="align-middle"><?= $member['rep_subject'] ?></td>
                            <td class="align-middle"><?= $member['email'] ?></td>
                        </tr>

                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<?php require('partials/footer.php'); ?>
