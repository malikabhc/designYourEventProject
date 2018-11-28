<?php

class city {

    public $id = '';
    public $cityName = '';
    public $postalCode = '';

    /**
     * Méthode magique __construct
     */
    public function __construct() {
        $database = databaseSingleton::getInstance();
        $this->db = $database->db;
    }

    /**
     * Méthode permettant de récupérer la ville de l'utilisateur
     */
    public function getCityByPostalCode() {
        $queryResult = array();
        $query = 'SELECT `id`, `cityName`, `postalCode` FROM `ye27d_city` '
                . 'WHERE `postalCode` LIKE :postalCode';
        // Etant donné que les données vont être entrées par l'utilisateur on fait un prepare puis un bindValue avec marqueur nominatif et on finit par un execute
        $result = $this->db->prepare($query);
        $result->bindValue(':postalCode', $this->postalCode . '%', PDO::PARAM_STR);
        if ($result->execute()) {
            $queryResult = $result->fetchAll(PDO::FETCH_OBJ);
        } else {
            $queryResult = false;
        }
        return $queryResult;
    }
}