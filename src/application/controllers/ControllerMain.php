<?php

namespace application\controllers;

use application\core\Controller;
use application\core\Request;
use application\models\ModelCountry;
use application\models\ModelMain;

class ControllerMain extends Controller
{


    public function index()
    {
        $map_config = include('application/config/map_config.php');
        $share_config = include('application/config/share_config.php');
        $modelCountry = new ModelCountry();
        $countries = $modelCountry->getCountries();
        $this->view->generate('form.php', [
            'countries' => $countries,
            'map_config' => $map_config,
            'share_config' => $share_config
        ]);
    }

    public function getMembersNumber()
    {
        $modelMain = new ModelMain();
        echo $modelMain->getMembersNumber()[0]['number'];
    }


    public function saveData()
    {

        $model = new ModelMain();
        $firstname = Request::post('firstname');
        $lastname = Request::post('lastname');
        $birthdate = Request::post('birthdate');
        $rep_subj = Request::post('rep_subj');
        $country_id = Request::post('country_id');
        $phone = Request::post('phone');
        $email = Request::post('email');
        $id = $model->saveData($firstname, $lastname, $birthdate, $rep_subj, $country_id, $phone, $email);


        if ($id != false) {
            setcookie("email", $email);
            setcookie("idUser", $id);
            echo "true";
        } else {
            echo "false";
        }


    }

    public function checkEmail()
    {
        $this->model = new ModelMain();
        if ($this->model->checkEmail(Request::post('email'))) {
            echo(json_encode(false));
        } else {
            echo(json_encode(true));
        }
    }


    public function showIcons()
    {
        $photo = Request::files('photo', 'name');
        if (isset($photo) && !empty($photo)) {
            $extension = pathinfo($photo, PATHINFO_EXTENSION);
            $filename = uniqid() . "." . $extension;;
            $target = 'public/images/' . $filename;
            move_uploaded_file(Request::files('photo', 'tmp_name'), $target);
        } else {
            $filename = null;
        }



        $model = new ModelMain();
        $data = INPUT_POST;

        $id = $_COOKIE['idUser'];
        $email = $_COOKIE['email'];
        if ($filename != null) {
            $model->updatePhoto($filename, $id, $email);
        }

        $result = $model->updateData($data, $id, $_COOKIE['email']);
        if ($result <= 0) {
            echo "true";
        } else {
            echo "false";
        }
    }

    public function newForm()
    {
        setcookie("email", "", time() - 3600);
        setcookie("idUser", "", time() - 3600);
        header("Location: /");
    }
}