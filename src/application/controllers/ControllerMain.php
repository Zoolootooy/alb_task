<?php

namespace application\controllers;

use application\core\Controller;
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
        $this->view->generate('form.php', ['countries' =>  $countries, 'map_config' => $map_config,
            'share_config' => $share_config]);
    }

    public function checkData(){
        $model = new ModelMain();
        $data = $_POST;
        $model->checkData($data);
        setcookie("my", "It's value", time()+60);
        echo "true";
    }

    public function checkEmail(){
        $this->model = new ModelMain();
        if ($this->model->checkEmail($_POST['email'])){
            echo(json_encode(false));
        } else {
            echo(json_encode(true));
        }
    }

    public function addPerson(){

    }

    public function showIcons(){

    }

}