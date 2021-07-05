<?php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=e_personality',
   'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


function getSingleValue($pdo, $sql, $parameters)
{
    $q = $pdo->prepare($sql);
    $q->execute($parameters);
    return $q->fetchColumn();
}