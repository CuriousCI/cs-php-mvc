<?php

namespace App\Models;

use PDO;

/**
 * Example user model
 *
 * PHP version 7.0
 */
class Event extends \Core\Model
{

    /**
     * Get all the users as an associative array
     *
     * @return array
     */
    public static function getAll()
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT evento_id, titolo FROM eventi');
        $result = array();

        if ($stmt->num_rows > 0) {
            // output data of each row
            while ($row = $stmt->fetch_assoc()) {
                $obj = [
                    "event_id" => $row["evento_id"],
                    "title" => $row["titolo"]
                ];
                array_push($result, $obj);
            }
        }
        return $result;
    }

    public static function getEvent($id)
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT evento_id, titolo FROM eventi WHERE evento_id=' . $id);
        $result = array();
        if ($stmt->num_rows > 0) {
            // output data of each row
            $row = $stmt->fetch_assoc();
            $obj = [
                "event_id" => $row["evento_id"],
                "title" => $row["titolo"],
            ];
            array_push($result, $obj);
        }
        return $result;
    }
}
