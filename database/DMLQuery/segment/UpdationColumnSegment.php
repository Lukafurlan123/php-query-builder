<?php
namespace lukafurlan\database\DMLQuery\segment;

/**
 * @author Luka Furlan <Luka.furlan9@gmail.com>
 * @copyright 2018 Luka Furlan
 */

class UpdationColumnSegment implements Segment {

    public static function build($columns) {

        $columnQuery = "SET ";
        $bind = [];

        foreach ($columns as $key => $value) {

            $columnQuery .= $key . " = :" . $key . ", ";

            $bind[":" . $key] = $value;

        }

        $columnQuery = substr($columnQuery, 0, -2) . " ";

        return [
            "query" => $columnQuery,
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