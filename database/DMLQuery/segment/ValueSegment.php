<?php
namespace lukafurlan\database\DMLQuery\segment;

/**
 * @author Luka Furlan <Luka.furlan9@gmail.com>
 * @copyright 2018 Luka Furlan
 */

class ValueSegment implements Segment {

    public static function build($param) {

        $valueQuery = "VALUES ";
        $bind = [];

        if($param[0][0 != null]) {

            foreach($param as $values) {

                $valueQuery .= "(";

                foreach($values as $value) {

                    $valueQuery .= "?, ";

                    array_push($bind, $value);

                }

                $valueQuery = substr($valueQuery, 0, -2);
                $valueQuery .= "), ";

            }

            $valueQuery = substr($valueQuery, 0, -2);

        } else {

            $valueQuery .= "(";

            foreach($param as $value) {

                $valueQuery .= "?, ";

                array_push($bind, $value);

            }

            $valueQuery = substr($valueQuery, 0, -2);
            $valueQuery .= ")";

        }

        return [
            "query" => $valueQuery,
            "bind"  => $bind
        ];

    }

    public static function validate($param) {

        if(!is_array($param)) {

            return false;

        }

        return true;

    }

}