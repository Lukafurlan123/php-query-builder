<?php
/**
 * @author Luka Furlan <Luka.furlan9@gmail.com>
 * @copyright 2018 Luka Furlan
 */

use lukafurlan\database\DMLQuery\DMLQueryManager;
use lukafurlan\database\connector\ConnectorType;

require('vendor/autoload.php');

define('MYSQL_HOST', 'localhost');
define('MYSQL_DATABASE', 'database');
define('MYSQL_USERNAME', 'root');
define('MYSQL_PASSWORD', 'password');

$queryManager = new DMLQueryManager(ConnectorType::MYSQL);

$result = $queryManager->select()
            ->columns([
                "id",
                "name"
            ])
            ->from("users")
            ->where([
                "rank > :rank",
                "country = :country"
            ])
            ->bind([
                ":rank" => 5,
                ":country" => "Slovenia"
            ])
            ->execute();


print_r($result);