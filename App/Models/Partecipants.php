<?php

namespace App\Models;

use PDO;

/**
 * Example user model
 *
 * PHP version 7.0
 */
class Partecipants extends \Core\Model
{

    /**
     * Get all the users as an associative array
     *
     * @return array
     */
    public static function getPartecipants($event_id)
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT nome, cognome FROM partecipanti JOIN utenti USING (utente_id) WHERE evento_id=' . $event_id);
        $result = array();

        if ($stmt->num_rows > 0) {
            // output data of each row
            while ($row = $stmt->fetch_assoc()) {
                $obj = [
                    "name" => $row["nome"],
                    "surname" => $row["cognome"]
                ];
                array_push($result, $obj);
            }
        }
        return $result;
    }
}
