<?php

use Core\App;
use Core\Database;
use Core\Contanier;

$contanier = new Contanier();

$contanier->bind('Core\Database', function () {
    $config = require base_path('config.php');

    return new Database($config['database'], $config['username'], $config['password']);
});

App::setContanier($contanier);