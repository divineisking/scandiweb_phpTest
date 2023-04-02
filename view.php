<?php

    require 'includes/autoloader.inc.php';

    $httpConn = new Connections\HttpConnect;
    $httpConn->httpConn();

    $view = new Connections\Connection;
    $view->view();
