<?php

$admins = [
    [
        'name' => 'claude',
        'password' => 'cmoi',
        'identifiant'=>"001",
        'idPC'=>'::1',
        'role'=>"administrateur",
    ],
    [
        'name' => 'david',
        'password' => 'leplusbeau',
        'identifiant'=>"002",
        'idPC'=>'169.260.163.165/16',
        'role'=>"administrateur",
    ],
    [
        'name' => 'isabelle',
        'password' => 'ladirectrice',
        'identifiant'=>"003",
        'idPC'=>'200.260.163.165/16',
        'role'=>"directeur",
    ],
   ];

function idIfAdmin($identifiant, $password, $admins) {
    foreach ($admins as $admin) {
        if ($admin['name'] === $identifiant) {
            if ($admin['password'] !== $password) {
                return '-1';
            }
            if ($admin['idPC'] !== $_SERVER["REMOTE_ADDR"]) {
                return '-2';
            }
            return $admin['identifiant'];
        }
    }
    return '-1';
}

 function getUser($user){
    session_start();
    $_SESSION['idlogged']=$user;
 }

 function redirectToAdmin() {
    header ("location:http://localhost/piscine-php-contact/views/admin-createarticle.php");
 }

?>