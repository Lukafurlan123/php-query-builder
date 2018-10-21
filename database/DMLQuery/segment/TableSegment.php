<?php
namespace lukafurlan\database\DMLQuery\segment;

/**
 * @author Luka Furlan <Luka.furlan9@gmail.com>
 * @copyright 2018 Luka Furlan
 */

class TableSegment implements Segment {

    public static function build($param) {

        return $param . " ";

    }

    public static function validate($param) {

        if($param == null || is_array($param)) {
            return false;
        }

        return true;

    }
}