<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$email = $_POST["email"];
$password = $_POST["password"];

$errors = [];

// validate form inputs
if (!Validator::email($email)) {
    $errors["email"] = "Email invalido por favor introduzca una direccion email valida";
}

if (!Validator::string($password, 7, 255)) {
    $errors["password"] = "Introduzca una contraseña con al menos 7 caracteres";
}

if (!empty($errors)) {
    return view('registration/create.view.php', [
        'errors' => $errors
    ]);
}

// verificar si existe con el pk

// si si existe redirec a login
$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();

if ($user) {
    //user exists
    //TODO: Redirigir a login
    header('location: /login');
    exit();
} else {
    //crear usuario
    $db->query('INSERT INTO users(email,password) VALUES(:email, :password)', [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_DEFAULT)
    ]);

    login($user);

    header('location: /');
    exit();
}






