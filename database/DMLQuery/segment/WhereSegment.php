<?php
namespace lukafurlan\database\DMLQuery\segment;

/**
 * @author Luka Furlan <Luka.furlan9@gmail.com>
 * @copyright 2018 Luka Furlan
 */

class WhereSegment implements Segment {

    public static function build($param) {

        $where = "WHERE ";

        foreach($param as $condition) {

            $where .= $condition . " AND ";

        }

        return substr($where, 0, -4);

    }

    public static function validate($param) {

        if($param == null || count($param) == 0) {
            return false;
        }

        return true;

    }

}