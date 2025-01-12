<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$notes = $db->query('SELECT * from notes WHERE user_id = 1')->get();

$heading = 'Notas';

view("notes/index.view.php", [
    "heading"=> $heading,
    'notes'=> $notes
]);