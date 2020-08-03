<?php

namespace application\controllers;

use application\core\Config;
use application\core\Controller;
use application\core\Request;
use application\models\ModelCountry;
use application\models\ModelMain;

class ControllerMain extends Controller
{


    public function index()
    {
        $map_config = Config::get('map_config');
        $share_config = Config::get('share_config');
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
        $data = Request::post();
        $email = $data['email'];
        $id = $model->saveData($data);


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
        $model = new ModelMain();
        if ($model->checkEmail(Request::post('email'))) {
            echo(json_encode(false));
        } else {
            echo(json_encode(true));
        }
    }


    public function showIcons()
    {

        $model = new ModelMain();
        $photo = Request::files('photo', 'name');
        $tmp = Request::files('photo', 'tmp_name');
        $filename = $model->uploadImage($photo, $tmp);



        $data = Request::post();;

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