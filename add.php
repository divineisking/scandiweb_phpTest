<?php

require 'includes/autoloader.inc.php';

//instantiate httpconnect class
$httpConn = new Connections\HttpConnect;
$httpConn->httpConn();

$add = new Connections\Connection;
$add->add();
