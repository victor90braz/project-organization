<?php

use Core\Database;
use Core\Response;

$currentNoteId = Response::CURRENT_NOTE_ID;

$config = require base_path('config.php');
$db = new Database($config['database']);

$notes = $db->query("select * from notes where user_id = $currentNoteId")->get();

view("notes/index.view.php", [
    'heading' => 'My Notes',
    'notes' => $notes
]);