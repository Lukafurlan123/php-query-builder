<?php
namespace lukafurlan\database\DMLQuery\builder;

use lukafurlan\database\DMLQuery\segment\FromSegment;
use lukafurlan\database\DMLQuery\segment\WhereSegment;

/**
 * @author Luka Furlan <Luka.furlan9@gmail.com>
 * @copyright 2018 Luka Furlan
 */

class DeletionBuilder extends Builder {

    public function __construct($connection)
    {
        parent::__construct("DELETE ", $connection);
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

    public function bind($bind) {

        $this->bind = array_merge($this->bind, $bind);

        return $this;

    }

}