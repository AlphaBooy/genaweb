<?php


function getUserByID($id, $pdo) {
    $sql = "SELECT * FROM user WHERE ID = :ID";
    $rqt = $pdo->prepare($sql);
    $rqt->execute([$id]);
    $result = $rqt->fetch();
    return $result;
}