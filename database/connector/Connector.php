<?php
namespace lukafurlan\database\connector;

/**
 * @author Luka Furlan <Luka.furlan9@gmail.com>
 * @copyright 2018 Luka Furlan
 */

abstract class Connector {

    public $connection;

    abstract function connect();

}