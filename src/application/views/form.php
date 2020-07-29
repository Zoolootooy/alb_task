<?php require('partials/header.php'); ?>


    <div id="map" class="mb-5"></div>

    <div class="container">
        <div class="row">
            <div class="col-12 mb-5">
                <div class="row">
                    <div class="col-8 offset-2">
                        <h4 id="titleFirst" class="text-center mb-5 mt-3 ">To participate in the conference, please fill out the
                            form</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 ">
                        <h4 id="titleSecond" class="text-center mb-5">Tell us about you.</h4>
                    </div>
                </div>

                <form id="first" name="first" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-12  form-group ">
                            <label for="firstname">First name</label>
                            <input id="firstname" class="form-control shadow-sm" type="text" name="firstname"
                                   placeholder="First name"
                                   value="" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 form-group">
                            <label for="lastname">Last name</label>
                            <input id="lastname" class="form-control shadow-sm" type="text" name="lastname" placeholder="Lastname"
                                   value="" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 form-group">
                            <label for="lastname">Birth date</label>
                            <input type="text" class="form-control shadow-sm" id="birthdate" required readonly="readonly">

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 form-group">
                            <label for="rep_subj">Report subject</label>
                            <input id="rep_subj" class="form-control shadow-sm" type="text" name="rep_subj"
                                   placeholder="Report subject" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 form-group">
                            <label for="country_id">Choose county</label>
                            <select class="form-control shadow-sm" id="country_id" name="country_id" required>
                                <option></option>
                                <?php foreach ($countries as $country): ?>
                                    <option value='<?= $country['id']; ?>'><?= $country['name']; ?> </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 form-group">
                            <label for="phone">Phone number</label>
                            <input id="phone" class="form-control shadow-sm" type="text" name="phone" placeholder="Phone number"
                                   value="" required>
                            <input type="checkbox" hidden id="phone_mask" checked>
                            <label id="descr" for="phone_mask" hidden></label>


                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 form-group">
                            <label for="email">Email</label>
                            <input id="email" class="form-control shadow-sm" type="email" name="email" placeholder="Email"
                                   value=""
                                   required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4 offset-md-8 col-lg-2 offset-lg-10  text-right">
                            <input id="btnNextFirst" class="btn btn-primary btn-lg btn-block shadow-sm" value="Next"
                                   type="submit">
                        </div>
                    </div>
                </form>


                <form id="second" name="second" method="post" enctype="multipart/form-data">


                    <div class="row">
                        <div class="col-12  form-group">
                            <label for="company">Company</label>
                            <input id="company" class="form-control shadow-sm" type="text" name="company" placeholder="Company"
                                   value="">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12  form-group">
                            <label for="position">Position</label>
                            <input id="position" class="form-control shadow-sm" type="text" name="position" placeholder="Position"
                                   value="">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12  form-group">
                            <label for="about">About</label>
                            <textarea id="about" class="form-control shadow-sm" name="about" maxlength="21845" rows="6"
                                      placeholder="About Me"></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 form-group">
                            <div class="row">
                                <div class="col-12">
                                    <label for="exampleFormControlFile1">Photo</label>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <input id="photo" type="file" class="" name="photo"/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4 offset-md-8 col-lg-2 offset-lg-10 text-right">
                            <button id="btnNextSecond" class="btn btn-primary btn-lg btn-block shadow-sm" value=""
                                    type="submit">Next
                            </button>
                        </div>
                    </div>
                </form>

                <div class="row">
                    <div class="col-8 offset-2 text-center">
                        <div id="icons">
                            <div class="row mb-5">
                                <div class="col-12">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?= $share_config['link'] ?>"
                                       onclick="window.open(this.href, '', 'menubar=no,toolbar=no,resisable=yes,' +
                                    'scrollbars=yes,height=500,width=800');return false;"
                                       class="fa fa-facebook mr-3"></a>
                                    <a href="https://twitter.com/share?url=<?= $share_config['link'] ?>&text=<?= $share_config['text'] ?>"
                                       onclick="window.open(this.href, '', 'menubar=no,toolbar=no,resisable=yes,' +
                                    'scrollbars=yes,height=500,width=800');return false;"
                                       class="fa fa-twitter ml-3"></a>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 offset-4">
                                    <form action="/members_list" method="LINK">
                                        <button class="btn btn-primary btn-lg btn-block shadow-sm">All members</button>
                                    </form>

                                    <form action="/newForm" method="LINK">
                                        <button class="btn btn-primary btn-lg btn-block shadow-sm mt-3">Fill form again</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>


<?php require('partials/footer.php'); ?>