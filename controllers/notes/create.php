<?php

use Core\Database;
use Core\Response;

$config = require base_path('config.php');
$db = new Database($config['database']);
$currentUserId = Response::CURRENT_USER_ID;

$errors = [];

view("notes/create.view.php", [
    'heading' => 'Create Note',
    'errors' => $errors
]);