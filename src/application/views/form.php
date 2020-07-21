<?php require('partials/header.php'); ?>

    <div id="map"></div>
    <script src="../../public/js/map.show.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAk10RdU1wJJ7UZnIZj8XBuVQopBvicRPE&callback=initMap"
        async defer></script>


    <form action="" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-8 offset-2">
                <h4 class="text-center">To participate in the conference, please fill out the form</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-8 offset-2 text-center">
                <input  type="text" name="title" placeholder="Firstname"
                       value=""  required>
            </div>
        </div>

        <div class="row">
            <div class="col-8 offset-2 text-center">
                <input  type="text" name="title" placeholder="Lastname"
                        value=""  required>
            </div>
        </div>

        <div class="row">
            <div class="col-8 offset-2 text-center">
                <input type="date" name="end_date" placeholder="Birthdate"
                       value=""  required>
            </div>
        </div>

        <div class="row">
            <div class="col-8 offset-2 text-center">
                <input  type="text" name="title" placeholder="Report subject"
                        value=""  required>
            </div>
        </div>

        <div class="row">
            <div class="col-8 offset-2 text-center">
                <select class="createForm__country-list" name="country_id" required>
                    <option>Choose</option>
                    <?php foreach($countries as $country):?>
                        <option value = '<?= $country['id'];?>'><?= $country['name'];?> </option>
                    <?php endforeach;?>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-8 offset-2 text-center">
                <input type="tel" name="phone" placeholder="Phone number" value="" required>
            </div>
        </div>

        <div class="row">
            <div class="col-8 offset-2 text-center">
                <input type="email" name="email" placeholder="Email" value=""  required>
            </div>
        </div>

        <div class="row">
            <div class="col-2 offset-6 text-right">
                <button form="createForm" type="submit">Save</button>
            </div>
        </div>


    </form>

<?php require('partials/footer.php'); ?>