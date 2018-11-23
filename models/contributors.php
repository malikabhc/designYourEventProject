<?php

class contributors {

    public $id = '';
    public $lastnameContributor = '';
    public $firstnameContributor = '';

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
    public function addContributor() {
        $query = 'INSERT INTO `ye27d_contributors` (`lastnameContributor`, `firstnameContributor`) '
                . 'VALUES (:lastnameContributor, :firstnameContributor)';
        // Etant donné que les données vont être entrées par l'utilisateur on fait un prepare puis un bindValue avec marqueur nominatif et on finit par un execute
        $result = $this->db->prepare($query);
        $result->bindValue(':lastnameContributor', $this->lastnameContributor, PDO::PARAM_STR);
        $result->bindValue(':firstnameContributor', $this->firstnameContributor, PDO::PARAM_STR);
        $result->execute();

        return $this->db->lastInsertId();
    }

}

// Accolade de fin class contributors