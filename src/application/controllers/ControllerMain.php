<?php

namespace application\controllers;

use application\core\Controller;
use application\models\ModelCountry;
use application\models\ModelMain;

class ControllerMain extends Controller
{


    public function index()
    {
        $modelCountry = new ModelCountry();
        $countries = $modelCountry->getCountries();
        $this->view->generate('form.php', ['countries' =>  $countries]);
    }

    public function checkEmail(){
        echo "true";
    }

    public function test()
    {
        echo $_POST['email'];
    }

}