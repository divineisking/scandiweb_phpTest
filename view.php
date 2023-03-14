<?php

    require 'includes/autoloader.inc.php';

    $httpConn = new Connections\HttpConnect;
    $httpConn->httpConn();

    $view = new Connections\ViewConnection;
    $view->view();
