<?php
namespace lukafurlan\database\DMLQuery\segment;

/**
 * @author Luka Furlan <Luka.furlan9@gmail.com>
 * @copyright 2018 Luka Furlan
 */

class IntoSegment implements Segment {

    public static function build($param) {

        return "INTO " . $param . " ";

    }

    public static function validate($param) {

        if($param == null) {
            return false;
        }

        return true;

    }

}