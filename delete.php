<?php

require 'includes/autoloader.inc.php';

//instantiate httpconnect class
$httpConn = new Connections\HttpConnect;
$httpConn->httpConn();

$delete = new Connections\DeleteConnection;
$delete->delete();
