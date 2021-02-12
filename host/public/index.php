<?php

require_once '../vendor/autoload.php';

use It20Academy\App\Core\App;

$app = new App();
$app->run();

use It20Academy\App\Controllers\PostsController;

$post_controller = new PostsController();
$post_controller->index();
