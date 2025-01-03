<?php

use Core\App;
use Core\Validator;
use Core\Database;

$db = App::resolve(Database::class);

$heading = 'Crear una nota';
$errors = [];

if (!Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'La descripcion no debe tener mas de 1000 caracteres y es requerida';
}

if (!empty($errors)) {
    return view("notes/create.view.php", [
        "heading" => $heading,
        'errors' => $errors
    ]);
}

$db->query("INSERT INTO notes(body, user_id) VALUES (:body, :user_id)", [
    'body' => $_POST["body"],
    'user_id' => 1
]);

header('location: /notes');
die();

