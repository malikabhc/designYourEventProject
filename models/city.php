<?php

class city extends database {

    public $id = 0;
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
    public function getCity() {
        $query = 'INSERT INTO `ye27d_city` (`cityName`, `postalCode`) '
                . 'VALUES (:cityName, :postalCode)';
        // Etant donné que les données vont être entrées par l'utilisateur on fait un prepare puis un bindValue avec marqueur nominatif et on finit par un execute
        $result = $this->db->prepare($query);
        $result->bindValue(':cityName', $this->cityName, PDO::PARAM_STR);
        $result->bindValue(':postalCode', $this->postalCode, PDO::PARAM_STR);
        return $result->execute();
    }
}