<?php
namespace lukafurlan\database\DMLQuery;

/**
 * @author Luka Furlan <Luka.furlan9@gmail.com>
 * @copyright 2018 Luka Furlan
 */

class DMLQuery {

    private $query;
    private $bind;

    public function __construct($query, $bind) {
        $this->query = $query;
        $this->bind = $bind;
    }

    /**
     * @return mixed
     */
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * @param mixed $query
     */
    public function setQuery($query)
    {
        $this->query = $query;
    }

    /**
     * @return mixed
     */
    public function getBind()
    {
        return $this->bind;
    }

    /**
     * @param mixed $bind
     */
    public function setBind($bind)
    {
        $this->bind = $bind;
    }

}