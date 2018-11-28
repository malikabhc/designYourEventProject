<?php

class sponsorsInEvents {

    public $id = '';
    public $idSponsors = '';
    public $idEvents = '';

    /**
     * Méthode magique __construct
     */
    public function __construct() {
        $database = databaseSingleton::getInstance();
        $this->db = $database->db;
    }

    /**
     * Méthode permettant l'enregistrement des sponsors d'un évènement
     */
    public function addSponsorInEvent() {
        $query = 'INSERT INTO `ye27d_sponsorsInEvents` (`idSponsors`, `idEvents`) '
                . 'VALUES (:idSponsors, :idEvents)';
        // Etant donné que les données vont être entrées par l'utilisateur on fait un prepare puis un bindValue avec marqueur nominatif et on finit par un execute
        $result = $this->db->prepare($query);
        $result->bindValue(':idSponsors', $this->idSponsors, PDO::PARAM_STR);
        $result->bindValue(':idEvents', $this->idEvents, PDO::PARAM_STR);
        $result->execute();

        return $this->db->lastInsertId();
    }

}

// Accolade de fin class sponsorsInEvents