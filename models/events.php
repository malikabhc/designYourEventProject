<?php

class events {

    public $id = '';
    public $eventName = '';
    public $address = '';
    public $dateHourStart = '';
    public $dateHourFinish = '';
    public $eventDescription = '';
    public $facebookLink = '';
    public $twitterLink = '';
    public $instagramLink = '';
    public $snapchatLink = '';
    public $idUsers = '';
    public $idEventsType = '';
    public $idEventsCategory = '';

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
    public function eventRegister() {
        $query = 'INSERT INTO `ye27d_events` (`eventName`, `address`, `dateHourStart`, `dateHourFinish`, `eventDescription`, `facebookLink`, `twitterLink`, `instagramLink`, `snapchatLink`, `idUsers`, `idEventsType`, `idEventsCategory`) '
                . 'VALUES (:eventName, :address, :dateHourStart, :dateHourFinish, :eventDescription, :facebookLink, :twitterLink, :instagramLink, :snapchatLink, :idUsers, :idEventsType, :idEventsCategory)';
        // Etant donné que les données vont être entrées par l'utilisateur on fait un prepare puis un bindValue avec marqueur nominatif et on finit par un execute
        $result = $this->db->prepare($query);
        $result->bindValue(':eventName', $this->eventName, PDO::PARAM_STR);
        $result->bindValue(':address', $this->address, PDO::PARAM_STR);
        $result->bindValue(':dateHourStart', $this->dateHourStart, PDO::PARAM_STR);
        $result->bindValue(':dateHourFinish', $this->dateHourFinish, PDO::PARAM_STR);
        $result->bindValue(':eventDescription', $this->eventDescription, PDO::PARAM_STR);
        $result->bindValue(':facebookLink', $this->facebookLink, PDO::PARAM_STR);
        $result->bindValue(':twitterLink', $this->twitterLink, PDO::PARAM_STR);
        $result->bindValue(':instagramLink', $this->instagramLink, PDO::PARAM_STR);
        $result->bindValue(':snapchatLink', $this->snapchatLink, PDO::PARAM_STR);
        $result->bindValue(':idUsers', $this->idUsers, PDO::PARAM_STR);
        $result->bindValue(':idEventsType', $this->idEventsType, PDO::PARAM_STR);
        $result->bindValue(':idEventsCategory', $this->idEventsCategory, PDO::PARAM_STR);
        $result->execute();
        
        return $this->db->lastInsertId();
    }

} // Accolade de fin class events