<?php

namespace It20Academy\App\Core;

class App
{
    public function run()
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Credentials: true");
        header("Access-Control-Max-Age: 1000");
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");
        header("Access-Control-Allow-Methods: PUT, POST, GET, OPTIONS, DELETE");

        $request = new Request();
        if (! $request->validateCommand()) {
            dump('Invalid data');

            return false;
        }

        $controllerName = $request->getController();
        $method = $request->getMethod();

        $controller = new $controllerName;
        $controller->$method();
    }
}