<?php

class contributors extends database {

    public $id = '';
    public $lastnameContributor = '';
    public $firstnameContributor = '';

    /**
     * Méthode magique __construct
     */
    public function __construct() {
        parent::__construct();
        $this->dbConnect();
    }
    
    /**
     * Méthode permettant l'enregistrement d'un évènement
     * @return boolean
     */
    public function contributorRegister() {
        $query = 'INSERT INTO `ye27d_contributors` (`lastnameContributor`, `firstnameContributor`) '
                . 'VALUES (:lastnameContributor, :firstnameContributor)';
        // Etant donné que les données vont être entrées par l'utilisateur on fait un prepare puis un bindValue avec marqueur nominatif et on finit par un execute
        $result = $this->db->prepare($query);
        $result->bindValue(':eventName', $this->eventName, PDO::PARAM_STR);
        $result->bindValue(':address', $this->address, PDO::PARAM_STR);

        return $result->execute();
    }
    
} // Accolade de fin class contributors