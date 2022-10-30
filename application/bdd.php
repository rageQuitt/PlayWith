<?php

// Réadapter pour viser votre BDD avec votre utilisateur SQL !!

$cnx = new PDO(
    'mysql:host=localhost;dbname=playwith',
    'pierrentoutoume',
    '63484691MTNkY2FkN2E0MmVhZDAxODZlMzVjZDEwe63fccd2',
    [
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', 
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION 
    ]
);