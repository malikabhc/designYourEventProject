<?php

class contributors {

    public $id = 0;
    public $contributorLastname = '';
    public $contributorFirstname = '';

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
    public function addContributor() {
        $query = 'INSERT INTO `ye27d_contributors` (`contributorLastname`, `contributorFirstname`) '
                . 'VALUES (:contributorLastname, :contributorFirstname)';
        // Etant donné que les données vont être entrées par l'utilisateur on fait un prepare puis un bindValue avec marqueur nominatif et on finit par un execute
        $result = $this->db->prepare($query);
        $result->bindValue(':contributorLastname', $this->contributorLastname, PDO::PARAM_STR);
        $result->bindValue(':contributorFirstname', $this->contributorFirstname, PDO::PARAM_STR);
        $result->execute();

        return $this->db->lastInsertId();
    }

}

// Accolade de fin class contributors