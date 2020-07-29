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

    public function saveData()
    {

        $model = new ModelMain();
        $data = $_POST;
        $id = $model->saveData($data);

        if ($id != false) {
            setcookie("email", $data['email']);
            setcookie("idUser", $id);
            echo "true";
        } else {
            echo "false";
        }


    }

    public function checkEmail()
    {
        $this->model = new ModelMain();
        if ($this->model->checkEmail($_POST['email'])) {
            echo(json_encode(false));
        } else {
            echo(json_encode(true));
        }
    }


    public function showIcons()
    {
        if (isset($_FILES['photo']['name']) && ! empty($_FILES['photo']['name'])) {
            $extension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
            $filename = uniqid() . "." . $extension;;
            $target = 'public/images/'.$filename;
            move_uploaded_file($_FILES['photo']['tmp_name'], $target);
        } else {
            $filename = NULL;
        }


        $model = new ModelMain();
        $data = $_POST;

        $id = $_COOKIE['idUser'];
        $email = $_COOKIE['email'];
        if ($filename != NULL) {
            $model->updatePhoto($filename, $id, $email);
        }

        $result = $model->updateData($data, $id, $_COOKIE['email']);
        if ($result <= 0) {
            echo "true";
        } else {
            echo "false";
        }
    }

    public function newForm(){
        setcookie("email", "", time() - 3600);
        setcookie("idUser", "", time() - 3600);
        header("Location: /");
    }
}