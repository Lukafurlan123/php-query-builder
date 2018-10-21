<?php
namespace lukafurlan\database\DMLQuery\builder;

use lukafurlan\database\DMLQuery\segment\FullJoinSegment;
use lukafurlan\database\DMLQuery\segment\InnerJoinSegment;
use lukafurlan\database\DMLQuery\segment\LeftJoinSegment;
use lukafurlan\database\DMLQuery\segment\RightJoinSegment;
use lukafurlan\database\DMLQuery\segment\TableSegment;
use lukafurlan\database\DMLQuery\segment\UpdationColumnSegment;
use lukafurlan\database\DMLQuery\segment\WhereSegment;

/**
 * @author Luka Furlan <Luka.furlan9@gmail.com>
 * @copyright 2018 Luka Furlan
 */

class UpdationBuilder extends Builder {

    public function __construct($connection) {
        parent::__construct("UPDATE ", $connection);
    }

    public function table($param) {

        if(!TableSegment::validate($param)) {
            return $this;
        }

        $this->query .= TableSegment::build($param);

        return $this;

    }

    public function columns($param) {

        if(!UpdationColumnSegment::validate($param)) {
            return $this;
        }

        $value = UpdationColumnSegment::build($param);

        $this->query .= $value['query'];
        $this->bind  = $value['bind'];

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

    public function bind($bind) {

        $this->bind = array_merge($this->bind, $bind);

        return $this;

    }

}