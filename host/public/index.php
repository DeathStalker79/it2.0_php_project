<?php

require_once '../vendor/autoload.php';

use It20Academy\App\Core\App;
use It20Academy\App\Controllers\PostsController;


$app = new App();
$app->run();

$view = new PostsController();
$view->index();

