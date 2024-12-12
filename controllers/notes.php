<?php

$config = require("config.php");
$db = new Database($config['database'], $config['username'], $config['password']);

$heading = 'Notas';

$notes = $db->query('SELECT * from notes WHERE user_id = 2')->fetchAll();

require 'views/notes.view.php';