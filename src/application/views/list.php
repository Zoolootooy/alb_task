<?php require('partials/header.php');?>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr class="thead-dark">
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
                    <tr>
                        <td><?= ++$i ?></td>
                        <td><?=$member['photo']?></td>
                        <td><?=$member['firstname']." ".$member['lastname']?></td>
                        <td><?=$member['rep_subject']?></td>
                        <td><?=$member['email']?></td>
                    </tr>

                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<?php require('partials/footer.php'); ?>
