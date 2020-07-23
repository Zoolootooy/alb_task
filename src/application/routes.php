<?php

//$router->get('', 'ControllerMain@index');
$router->get('', 'ControllerMain@index');
$router->get('members_list', 'ControllerList@index');
$router->post('checkData', 'ControllerMain@checkData');
$router->post('showIcons', 'ControllerMain@showIcons');
$router->post('checkEmail', 'ControllerMain@checkEmail');