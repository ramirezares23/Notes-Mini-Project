<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$heading = 'Nota';
$currentUserId = 1;

$note = $db->query('SELECT * from notes WHERE id = :id', [
    'id' => $_GET['id']
])->findOrFail();

authorize($note['user_id'] === $currentUserId);

view("notes/show.view.php", [
    "heading" => $heading,
    'note' => $note
]);
