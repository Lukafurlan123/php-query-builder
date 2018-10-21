<?php
namespace lukafurlan\database\DMLQuery;

use lukafurlan\database\DMLQuery\builder\DeletionBuilder;
use lukafurlan\database\DMLQuery\builder\InsertionBuilder;
use lukafurlan\database\DMLQuery\builder\SelectionBuilder;
use lukafurlan\database\DMLQuery\builder\UpdationBuilder;

/**
 * @author Luka Furlan <Luka.furlan9@gmail.com>
 * @copyright 2018 Luka Furlan
 */

class DMLQueryManager {

    private $connectorType;
    private $connector;

    public function __construct($connectorType) {
        $this->connectorType = $connectorType;
        $this->connector = new $connectorType();
        $this->connector->connect();
    }

    public function select() {
        return new SelectionBuilder($this->connector->connection);
    }

    public function delete() {
        return new DeletionBuilder($this->connector->connection);
    }

    public function insert() {
        return new InsertionBuilder($this->connector->connection);
    }

    public function update() {
        return new UpdationBuilder($this->connector->connection);
    }

}