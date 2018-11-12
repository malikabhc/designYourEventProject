<?php

class city extends database {

    public $id = '';
    public $cityName = '';
    public $postalCode = '';

    public function __construct() {
        parent::__construct();
        $this->dbConnect();
    }

    /**
     * Méthode permettant de récupérer la ville de l'utilisateur
     * @return boolean
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