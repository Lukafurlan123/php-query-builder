<?php
namespace lukafurlan\database\DMLQuery\segment;
/**
 * @author Luka Furlan <Luka.furlan9@gmail.com>
 * @copyright 2018 Luka Furlan
 */

class FullJoinSegment implements Segment {

    public static function build($param) {
        $fromQuery = "FULL JOIN ";

        if(is_array($param)) {

            foreach($param as $table) {
                $fromQuery .= $table . ", ";
            }

            return substr($fromQuery, 0, -2). " ";

        }

        return "FULL JOIN " . $param . " ";
    }

    public static function validate($param){

        if($param == null) {
            return false;
        }

        return true;

    }
}