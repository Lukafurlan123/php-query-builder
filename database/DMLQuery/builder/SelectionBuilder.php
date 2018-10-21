<?php
namespace lukafurlan\database\DMLQuery\builder;

use lukafurlan\database\DMLQuery\segment\ColumnSegment;
use lukafurlan\database\DMLQuery\segment\FromSegment;
use lukafurlan\database\DMLQuery\segment\FullJoinSegment;
use lukafurlan\database\DMLQuery\segment\GroupSegment;
use lukafurlan\database\DMLQuery\segment\InnerJoinSegment;
use lukafurlan\database\DMLQuery\segment\LeftJoinSegment;
use lukafurlan\database\DMLQuery\segment\LimitSegment;
use lukafurlan\database\DMLQuery\segment\OrderSegment;
use lukafurlan\database\DMLQuery\segment\RightJoinSegment;
use lukafurlan\database\DMLQuery\segment\WhereSegment;

/**
 * @author Luka Furlan <Luka.furlan9@gmail.com>
 * @copyright 2018 Luka Furlan
 */

class SelectionBuilder extends Builder {

    private $flag = null;

    public function __construct($connection)
    {
        parent::__construct("SELECT ", $connection);
    }

    public function execute() {

        $stmt = $this->connection->prepare($this->query);
        $stmt->execute($this->bind);

        if (isset($this->flag)) {
            $data = $stmt->fetch($this->flag);
        } else {
            $data = $stmt->fetchAll();
        }

        return $data;

    }

    public function columns($param) {

        if(!ColumnSegment::validate($param)) {
            $this->query .= "* ";
            return $this;
        }

        $this->query .= ColumnSegment::build($param);

        return $this;

    }

    public function from($param) {

        if(!FromSegment::validate($param)) {
            return $this;
        }

        $this->query .= FromSegment::build($param);

        return $this;

    }

    public function where($param) {

        if(!WhereSegment::validate($param)) {
            return $this;
        }

        $this->query .= WhereSegment::build($param);

        return $this;

    }

    public function innerJoin($table, $conditions) {

        if(!InnerJoinSegment::validate($table) || !WhereSegment::validate($conditions)) {
            return $this;
        }

        $this->query .= InnerJoinSegment::build($table);
        $this->query .= "ON " . substr(WhereSegment::build($conditions), 5);

        return $this;

    }

    public function leftJoin($table, $conditions) {

        if(!LeftJoinSegment::validate($table) || !WhereSegment::validate($conditions)) {
            return $this;
        }

        $this->query .= LeftJoinSegment::build($table);
        $this->query .= "ON " . substr(WhereSegment::build($conditions), 5);

        return $this;

    }

    public function rightJoin($table, $conditions) {

        if(!RightJoinSegment::validate($table) || !WhereSegment::validate($conditions)) {
            return $this;
        }

        $this->query .= RightJoinSegment::build($table);
        $this->query .= "ON " . substr(WhereSegment::build($conditions), 5);

        return $this;

    }

    public function fullJoin($table, $conditions) {

        if(!FullJoinSegment::validate($table) || !WhereSegment::validate($conditions)) {
            return $this;
        }

        $this->query .= FullJoinSegment::build($table);
        $this->query .= "ON " . substr(WhereSegment::build($conditions), 5);

        return $this;

    }

    public function group($param) {

        if(!GroupSegment::validate($param)) {
            return $this;
        }

        $this->query .= GroupSegment::build($param);

        return $this;

    }

    public function order($param) {

        if(!OrderSegment::validate($param)) {
            return $this;
        }

        $this->query .= OrderSegment::build($param);

        return $this;

    }

    public function limit($param) {

        if(!LimitSegment::validate($param)) {
            return $this;
        }

        $this->query .= LimitSegment::build($param);

        return $this;

    }

    public function flag($flag) {

        $this->flag = $flag;
        return $this;

    }

    public function bind($bind) {

        $this->bind = $bind;

        return $this;

    }

}