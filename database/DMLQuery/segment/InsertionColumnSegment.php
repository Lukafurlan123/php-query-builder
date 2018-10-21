<?php
namespace lukafurlan\database\DMLQuery\segment;

/**
 * @author Luka Furlan <Luka.furlan9@gmail.com>
 * @copyright 2018 Luka Furlan
 */

class InsertionColumnSegment implements Segment {

    public static function build($columns) {

        $columnQuery = "(";

        foreach ($columns as $column) {

            $columnQuery .= $column . ", ";

        }

        return substr($columnQuery, 0, -2) . ") ";

    }

    public static function validate($param) {

        if(!is_array($param)) {

            return false;

        }

        return true;

    }
}