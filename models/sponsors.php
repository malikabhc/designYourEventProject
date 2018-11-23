<?php

class sponsors {

    public $id = '';
    public $sponsorName = '';
    public $sponsorLink = '';
    public $sponsorLogo = '';

    /**
     * Méthode magique __construct
     */
    public function __construct() {
        $database = databaseSingleton::getInstance();
        $this->db = $database->db;
    }

    /**
     * Méthode permettant l'enregistrement d'un évènement
     * @return boolean
     */
    public function addSponsors() {
        $query = 'INSERT INTO `ye27d_sponsors` (`sponsorName`, `sponsorLink`, `sponsorLogo`) '
                . 'VALUES (:sponsorName, :sponsorLink, :sponsorLogo)';
        // Etant donné que les données vont être entrées par l'utilisateur on fait un prepare puis un bindValue avec marqueur nominatif et on finit par un execute
        $result = $this->db->prepare($query);
        $result->bindValue(':sponsorName', $this->sponsorName, PDO::PARAM_STR);
        $result->bindValue(':sponsorLink', $this->sponsorLink, PDO::PARAM_STR);
        $result->bindValue(':sponsorLogo', $this->sponsorLogo, PDO::PARAM_STR);
        $result->execute();

        return $this->db->lastInsertId();
    }

}

// Accolade de fin class contributors