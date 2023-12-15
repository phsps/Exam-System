<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=tosvvi_college_db', 'root', '');
    //echo 'Connection Successful';
} catch (PDOException $f) {
    echo 'Connection error: '.$f->getmessage();
}