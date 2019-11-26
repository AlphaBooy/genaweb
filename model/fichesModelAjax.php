<?php
$pdo = getPDO();

$table = 'fiche';
$primaryKey = 'id';

$collone = array(
    array("db" => "id", "dt" => 0),
    array("db" => "userCrea", "dt" => 1),
    array("db" => "dateCrea", "dt" => 2),
    array("db" => "userDerniereModif", "dt" => 3),
    array("db" => "dateDerniereModif", "dt" => 4),
);

$sql_details = array(
    'user' => getUser(),
    'pass' => getPass(),
    'db'   => getDB(),
    'host' => getHost()
);

require "ssp.class.php";

echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $collone)
);