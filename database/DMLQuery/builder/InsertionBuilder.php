<?php
namespace lukafurlan\database\DMLQuery\builder;

use lukafurlan\database\DMLQuery\segment\InsertionColumnSegment;
use lukafurlan\database\DMLQuery\segment\IntoSegment;
use lukafurlan\database\DMLQuery\segment\ValueSegment;

/**
 * @author Luka Furlan <Luka.furlan9@gmail.com>
 * @copyright 2018 Luka Furlan
 */

class InsertionBuilder extends Builder {

    public function __construct($connection) {
        parent::__construct("INSERT ", $connection);
    }

    public function into($param) {

        if(!IntoSegment::validate($param)) {
            return $this;
        }

        $this->query .= IntoSegment::build($param);

        return $this;

    }

    public function columns($param) {

        if(!InsertionColumnSegment::validate($param)) {
            return $this;
        }

        $this->query .= InsertionColumnSegment::build($param);

        return $this;

    }

    public function values($param) {

        if(!ValueSegment::validate($param)) {
            return $this;
        }

        $value = ValueSegment::build($param);

        $this->query .= $value['query'];
        $this->bind   = $value['bind'];

        return $this;

    }


}