<?php
namespace lukafurlan\database\DMLQuery\segment;

/**
 * @author Luka Furlan <Luka.furlan9@gmail.com>
 * @copyright 2018 Luka Furlan
 */

class ColumnSegment implements Segment {


    public static function build($columns) {

        $columnQuery = "";

        foreach ($columns as $column) {

            if(is_array($column)) {

                if(!isset($column['column'], $column['alias'])) {
                    continue;
                }

                $columnQuery .= $column['column'] . " AS " . $column['alias'] . ", ";

            } else {
                $columnQuery .= $column . ", ";
            }

        }

        return substr($columnQuery, 0, -2) . " ";

    }

    public static function validate($columns) {

        if($columns == null || is_array($columns) && count($columns) == 0 || !is_array($columns)) {
            return false;
        }

        return true;

    }

}