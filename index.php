<?php
session_start();


use app\config\Routes;

require_once 'app/config/Routes.php';
require_once 'app/config/Config.php';


$routes = new Routes();