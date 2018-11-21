<?php

class events extends database {

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
    public function eventRegister() {
        $query = 'INSERT INTO `ye27d_events` (`eventName`, `address`, `dateHourStart`, `dateHourFinish`, `eventDescription`, `facebookLink`, `twitterLink`, `instagramLink`, `snapchatLink`) '
                . 'VALUES (:eventName, :address, :dateHourStart, :dateHourFinish, :eventDescription, :facebookLink, :twitterLink, :instagramLink, :snapchatLink)';
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

        return $result->execute();
    }

} // Accolade de fin class events