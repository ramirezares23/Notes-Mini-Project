<?php

$_SESSION["name"] = "Ares";

$heading = 'Home';

view("index.view.php", [
    "heading"=> $heading
]);