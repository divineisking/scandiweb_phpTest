<?php

namespace Connections;

//http connection class
class HttpConnect
{
    public function httpConn()
    {
            header("Access-Control-Allow-Origin: *");
            header("Content-Type: application/json");
            header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE ");
            header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    }
}
