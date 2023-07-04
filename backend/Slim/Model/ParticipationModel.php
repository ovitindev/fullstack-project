<?php

namespace Slim\Model;

use Slim\Config\Db;
use PDO;
use PDOException;

class ParticipationModel
{
    public function getPaticipation()
    {
        $pdo = Db::getConn(); // Get PDO connection from containers

        // Run the SELECT query
        $stmt = $pdo->prepare('SELECT * FROM participation');
        $stmt->execute(); //search records
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $results;
    }

    public function setParticipation($first_name, $last_name, $participation, $color)
    {
        $sql = "INSERT INTO participation (first_name,last_name,participation,color) VALUES (:firstname, :last_name, :participation, :color)";

        $pdo = Db::getConn(); // Get PDO connection from containers
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':firstname', $first_name, PDO::PARAM_STR);
        $stmt->bindValue(':last_name', $last_name, PDO::PARAM_STR);
        $stmt->bindValue(':participation', $participation, PDO::PARAM_INT);
        $stmt->bindValue(':color', $color, PDO::PARAM_STR);
        $results = $stmt->execute(); //Insert Records

        $insertedId = $pdo->lastInsertId();
        return $insertedId;
    }

    public function deleteParticipation($id)
    {
        $sql = "DELETE FROM participation WHERE id = :id";

        $pdo = Db::getConn(); // Get PDO connection from containers
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $results = $stmt->execute(); // Delete a record by ID

        return $results;
    }
}
