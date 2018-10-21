<?php
namespace lukafurlan\database\DMLQuery\builder;

use lukafurlan\database\DMLQuery\DMLQuery;

/**
 * @author Luka Furlan <Luka.furlan9@gmail.com>
 * @copyright 2018 Luka Furlan
 */

abstract class Builder {

    protected $query = "";
    protected $bind  = [];
    protected $connection;

    public function __construct($queryStart, $connection) {
        $this->query .= $queryStart;
        $this->connection = $connection;
    }

    public function build() {
        return new DMLQuery("(" . $this->query . ")", $this->bind);
    }

    public function execute() {
        $stmt = $this->connection->prepare($this->query);
        $stmt->execute($this->bind);
    }

}