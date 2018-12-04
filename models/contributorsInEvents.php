<?php

class contributorsInEvents {

    public $id = 0;
    public $idEvents = 0;
    public $idContributors = 0;

    /**
     * Méthode magique __construct
     */
    public function __construct() {
        $database = databaseSingleton::getInstance();
        $this->db = $database->db;
    }

    /**
     * Méthode permettant l'enregistrement des participants d'un évènement
     */
    public function addContributorInEvent() {
        $query = 'INSERT INTO `ye27d_contributorsInEvents` (`idEvents`, `idContributors`) '
                . 'VALUES (:idEvents, :idContributors)';
        // Etant donné que les données vont être entrées par l'utilisateur on fait un prepare puis un bindValue avec marqueur nominatif et on finit par un execute
        $result = $this->db->prepare($query);
        $result->bindValue(':idEvents', $this->idEvents, PDO::PARAM_STR);
        $result->bindValue(':idContributors', $this->idContributors, PDO::PARAM_STR);
        $result->execute();

        return $this->db->lastInsertId();
    }

}

// Accolade de fin class contributors