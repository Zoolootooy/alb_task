<?php require('partials/header.php');?>


    <div id="map"></div>
    <div class="row">
        <div class="col-8 offset-2" >
            <div id="info"></div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-8 offset-2">
                    <h4 class="text-center">To participate in the conference, please fill out the form</h4>
                </div>
            </div>

            <form id="first" action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-8 offset-2 form-group">
                        <label for="firstname">First name</label>
                        <input id="firstname" class="form-control" type="text" name="title" placeholder="First name"
                               value=""  required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-8 offset-2 form-group">
                        <label for="lastname">Last name</label>
                        <input id="lastname" class="form-control" type="text" name="title" placeholder="Lastname"
                               value=""  required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-8 offset-2 form-group">
                        <label for="lastname">Birth date</label>
                        <input id="birthdate" class="form-control" type="date" name="end_date" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-8 offset-2 form-group">
                        <label for="rep_subj">Report subject</label>
                        <input id="rep_subj" class="form-control" type="text" name="title" placeholder="Report subject" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-8 offset-2 form-group">
                        <label for="country_id">Choose county</label>
                        <select class="form-control" name="country_id" required>
                            <option ></option>
                            <?php foreach($countries as $country):?>
                                <option value = '<?= $country['id'];?>'><?= $country['name'];?> </option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-8 offset-2 form-group">
                        <label for="phone">Phone number</label>
                        <input id="phone" class="form-control" type="text" name="phone" placeholder="Phone number" value="" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-8 offset-2 form-group">
                        <label for="formEmail">Email</label>
                        <input id="formEmail" class="form-control" type="email" name="email" placeholder="Email" value=""  required>
                    </div>
                </div>
            </form>

            <form id="second" action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-8 offset-2 form-group">
                        <label for="company">Company</label>
                        <input id="company" class="form-control" type="text" name="company" placeholder="Company" value="">
                    </div>
                </div>

                <div class="row">
                    <div class="col-8 offset-2 form-group">
                        <label for="position">Position</label>
                        <input id="position" class="form-control" type="text" name="position" placeholder="Position" value="">
                    </div>
                </div>

                <div class="row">
                    <div class="col-8 offset-2 form-group">
                        <label for="about">About</label>
                        <textarea id="about" class="form-control" name="aboutMe" maxlength="255" rows="6" placeholder="About Me"></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-2 offset-2 form-group">
                        <label for="exampleFormControlFile1">Photo</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                </div>
            </form>

            <div class="row">
                <div class="col-8 offset-2 text-center">
                    <div id="icons">
                        <a href="<?= $share_config['facebook'];?>" class="fa fa-facebook"></a>
                        <a href="<?= $share_config['twitter'];?>" class="fa fa-twitter"></a>
                    </div>
                </div>
            </div>


        </div>
    </div>





    <div class="row">
        <div class="col-2 offset-8 text-right">
            <button id="btnNextFirst" class="btn btn-primary btn-lg" type="submit">Next</button>
        </div>
    </div>

<?php require('partials/footer.php'); ?>