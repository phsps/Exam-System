<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=tosvvi_college_db', 'root', '');
    //echo 'Connection Successful';
} catch (PDOException $f) {
    echo 'Connection error: '.$f->getmessage();
}

//SMTP
  define('M_HOST', 'smtp.gmail.com');
  define('M_USERNAME', 'elearningshf@gmail.com');
  define('M_PASSWORD', 'Myshf123@');
  define('M_SMTPSECURE', 'ssl');
  define('M_PORT', '465');
