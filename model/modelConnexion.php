<?php

function CompteExiste($mail, $pdo) {
    $sql = "SELECT mail FROM user WHERE mail = :mail";
    $rqt = $pdo->prepare($sql);
    $rqt->execute([$mail]);
    $result = $rqt->fetch(PDO::FETCH_ASSOC);
    if (isset($result['mail'])) {
        return true;
    }
    return false;
}



function CorrectPass($mail,$pass,$pdo) {
    $sql = "SELECT mdp FROM user WHERE mail = :mail";
    $rqt = $pdo->prepare($sql);
    $rqt->execute([$mail]);
    $result = $rqt->fetch(PDO::FETCH_ASSOC);
    if(isset($result['mdp'])) {
        if ($result['mdp'] == $pass) {
            return true;
        }
    }
    return false;
}