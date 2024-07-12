<?php

session_start();
if (!isset($_SESSION['idlogged'])) { 
header ("location:http://localhost/piscine-php-contact/views/connexion.php");
    }


file_put_contents('../fichier.csv','');
