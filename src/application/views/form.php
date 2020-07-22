<?php require('partials/header.php'); ?>

    <div id="map"></div>
    <div class="row">
        <div class="col-8 offset-2">
            <div id="info"></div>
        </div>
    </div>

    <form id="first" action="" method="post" enctype="multipart/form-data">


        <div class="row">
            <div class="col-8 offset-2">
                <h4 class="text-center">To participate in the conference, please fill out the form</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-8 offset-2 text-center">
                <input class="form-control" type="text" name="title" placeholder="Firstname"
                       value=""  required>
            </div>
        </div>

        <div class="row">
            <div class="col-8 offset-2 text-center">
                <input class="form-control" type="text" name="title" placeholder="Lastname"
                        value=""  required>
            </div>
        </div>

        <div class="row">
            <div class="col-8 offset-2 text-center">
                <input class="form-control" type="date" name="end_date" placeholder="Birthdate"
                       value=""  required>
            </div>
        </div>

        <div class="row">
            <div class="col-8 offset-2 text-center">
                <input class="form-control"  type="text" name="title" placeholder="Report subject" value=""  required>
            </div>
        </div>

        <div class="row">
            <div class="col-8 offset-2 text-center">
                <select class="form-control" name="country_id" required>
                    <option>Choose country</option>
                    <?php foreach($countries as $country):?>
                        <option value = '<?= $country['id'];?>'><?= $country['name'];?> </option>
                    <?php endforeach;?>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-8 offset-2 text-center">
                <input class="form-control" type="text" name="phone" placeholder="Phone number" value="" required>
            </div>
        </div>

        <div class="row">
            <div class="col-8 offset-2 text-center">
                <input class="form-control" id="formEmail" type="email" name="email" placeholder="Email" value=""  required>
            </div>
        </div>

        <div class="row">
            <div class="col-2 offset-6 text-right">
                <button id="btnNext"  form="createForm" type="submit">Next</button>
            </div>
        </div>
    </form>

    <form id="second" action="" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-8 offset-2 text-center">
                <input class="form-control" type="text" name="company" placeholder="Company" value="">
            </div>
        </div>

        <div class="row">
            <div class="col-8 offset-2 text-center">
                <input class="form-control" type="text" name="position" placeholder="Position" value="">
            </div>
        </div>

        <div class="row">
            <div class="col-8 offset-2 text-center">
                <textarea class="form-control" name="aboutMe" maxlength="255" rows="6" placeholder="About Me"></textarea>
            </div>
        </div>




    </form>

<?php require('partials/footer.php'); ?>