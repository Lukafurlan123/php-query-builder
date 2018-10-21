<?php
namespace lukafurlan\database\DMLQuery\segment;

/**
 * @author Luka Furlan <Luka.furlan9@gmail.com>
 * @copyright 2018 Luka Furlan
 */

class SelectSegment implements Segment {

    public static function build($param) {
        return "SELECT ";
    }

    public static function validate($param) {
        return true;
    }
}