<?php

use Core\Database;
use Core\Response;

$config = require base_path('config.php');
$db = new Database($config['database']);
$currentUserId = Response::CURRENT_USER_ID;

$notes = $db->query("SELECT * FROM notes WHERE user_id = $currentUserId")->get();

view("notes/index.view.php", [
    'heading' => 'My Notes',
    'notes' => $notes
]);