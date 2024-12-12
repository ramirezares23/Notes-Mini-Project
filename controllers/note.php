<?php


$config = require('config.php');
$db = new Database($config['database'], $config['username'], $config['password']);

$heading = 'Nota';

$note = $db->query('SELECT * from notes WHERE id = :id', [':id'=>$_GET['id']])->fetch();

require 'views/note.view.php';