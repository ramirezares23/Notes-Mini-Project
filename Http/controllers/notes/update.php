<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$heading = 'Editando una nota';
$currentUserId = 1;

// find de note
$note = $db->query('SELECT * from notes WHERE id = :id', [
    'id' => $_POST['id']
])->findOrFail();

//autorizar
authorize($note['user_id'] === $currentUserId);

// validar
$errors = [];

if (!Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'La descripcion no debe tener mas de 1000 caracteres y es requerida';
}

// update
if (count($errors)) {
    return view("notes/create.view.php", [
        "heading" => $heading,
        'errors' => $errors,
        'note' => $note
    ]);
}

$db->query('update notes set body = :body where id = :id',[
    'id'=> $_POST['id'],
    'body'=> $_POST['body'],
]);

//redirigir
header('location: /notes');
die();