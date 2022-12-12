<?php

require __DIR__.'/vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\Auth;

$factory = (new Factory)
    ->withServiceAccount('phpfirebase-72c77-firebase-adminsdk-lavjt-7b26bdc690.json')
    ->withDatabaseUri('https://phpfirebase-72c77-default-rtdb.firebaseio.com/');

$database = $factory->createDatabase();
$auth = $factory->createAuth();