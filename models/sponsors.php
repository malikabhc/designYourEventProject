<?php

class sponsors {

    public $id = '';
    public $sponsorName = '';
    public $sponsorLink = '';
    
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
    public function addSponsor() {
        $query = 'INSERT INTO `ye27d_sponsors` (`sponsorName`, `sponsorLink`) '
                . 'VALUES (:sponsorName, :sponsorLink)';
        // Etant donné que les données vont être entrées par l'utilisateur on fait un prepare puis un bindValue avec marqueur nominatif et on finit par un execute
        $result = $this->db->prepare($query);
        $result->bindValue(':sponsorName', $this->sponsorName, PDO::PARAM_STR);
        $result->bindValue(':sponsorLink', $this->sponsorLink, PDO::PARAM_STR);
        $result->execute();

        return $this->db->lastInsertId();
    }

}

// Accolade de fin class sponsors