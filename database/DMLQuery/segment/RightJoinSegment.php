<?php
namespace lukafurlan\database\DMLQuery\segment;
/**
 * @author Luka Furlan <Luka.furlan9@gmail.com>
 * @copyright 2018 Luka Furlan
 */

class RightJoinSegment implements Segment {

    public static function build($param) {
        $fromQuery = "RIGHT JOIN ";

        if(is_array($param)) {

            foreach($param as $table) {
                $fromQuery .= $table . ", ";
            }

            return substr($fromQuery, 0, -2) . " ";

        }

        return "RIGHT JOIN " . $param . " ";
    }

    public static function validate($param){

        if($param == null) {
            return false;
        }

        return true;

    }
}