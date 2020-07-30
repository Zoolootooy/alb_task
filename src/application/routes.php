<?php

$router->get('', 'ControllerMain@index');
$router->get('members_list', 'ControllerList@index');
$router->get('newForm', 'ControllerMain@newForm');
$router->post('saveData', 'ControllerMain@saveData');
$router->post('showIcons', 'ControllerMain@showIcons');
$router->post('checkEmail', 'ControllerMain@checkEmail');
$router->post('getMembersNumber', 'ControllerMain@getMembersNumber');