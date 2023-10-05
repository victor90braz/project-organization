<?php

use Core\Database;
use Core\Response;

$config = require base_path('config.php');
$db = new Database($config['database']);
$currentUserId = Response::CURRENT_USER_ID;


if($_SERVER["REQUEST_METHOD"] === 'POST') {
    $currentNoteId = $_GET['id'];

    $note = $db->query('select * from notes where id = :id', [
        'id' => $_GET['id']
    ])->findOrFail();

    authorize($note['user_id'] === $currentUserId);

    $db->query('delete from notes WHERE id = :id', [
        'id' => $currentNoteId
    ]);

    header('location: /notes');
    exit();
} else {

    $note = $db->query('select * from notes where id = :id', [
        'id' => $_GET['id']
    ])->findOrFail();

    authorize($note['user_id'] === $currentUserId);

    view("notes/show.view.php", [
        'heading' => 'Note',
        'note' => $note
    ]);
}


