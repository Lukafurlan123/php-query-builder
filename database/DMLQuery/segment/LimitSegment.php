<?php
namespace lukafurlan\database\DMLQuery\segment;

/**
 * @author Luka Furlan <Luka.furlan9@gmail.com>
 * @copyright 2018 Luka Furlan
 */

class LimitSegment implements Segment {

    public static function build($param) {

        return "LIMIT " . $param;

    }

    public static function validate($param) {

        if($param == null || is_array($param)) {
            return false;
        }

        return true;

    }
}