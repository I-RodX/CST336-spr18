<?php

function getDataBaseConnection($opt)
{
    $host = 'localhost';
    $dbname = $opt;
    $username = 'irodx';
    $passsword = '';
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $dbConn;
}
