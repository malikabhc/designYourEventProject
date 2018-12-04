<?php

class events {

    public $id = 0;
    public $eventName = '';
    public $address = '';
    public $dateHourStart = '';
    public $dateHourFinish = '';
    public $eventDescription = '';
    public $facebookLink = '';
    public $twitterLink = '';
    public $instagramLink = '';
    public $snapchatLink = '';
    public $idUsers = 0;
    public $idEventsType = 0;
    public $idEventsCategory = 0;
    public $idThemes = 0;

    /**
     * Méthode magique __construct
     */
    public function __construct() {
        $database = databaseSingleton::getInstance();
        $this->db = $database->db;
    }

    /**
     * Méthode permettant l'enregistrement d'un évènement
     */
    public function eventRegister() {
        $query = 'INSERT INTO `ye27d_events` (`eventName`, `address`, `dateHourStart`, `dateHourFinish`, `eventDescription`, `facebookLink`, '
                . '`twitterLink`, `instagramLink`, `snapchatLink`, `idUsers`, `idEventsType`, `idEventsCategory`, `idThemes`) '
                . 'VALUES (:eventName, :address, :dateHourStart, :dateHourFinish, :eventDescription, :facebookLink, :twitterLink, '
                . ':instagramLink, :snapchatLink, :idUsers, :idEventsType, :idEventsCategory, :idThemes)';
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
        $result->bindValue(':idThemes', $this->idThemes, PDO::PARAM_STR);
        $result->execute();

        return $this->db->lastInsertId();
    }

    /**
     * Méthode permettant d'afficher les données de l'évènement
     */
    public function displayEvent() {
        $query = 'SELECT  `ye27d_events`.`eventName`, `ye27d_events`.`address`, DATE_FORMAT(`ye27d_events`.`dateHourStart`, \'%Y-%m-%d\') AS `dateStart`, DATE_FORMAT(`ye27d_events`.`dateHourStart`, \'%H:%i\') AS `hourStart`, '
                . 'DATE_FORMAT(`ye27d_events`.`dateHourFinish`, \'%Y-%m-%d\') AS `dateFinish`, DATE_FORMAT(`ye27d_events`.`dateHourFinish`, \'%H:%i\') AS `hourFinish`, '
                . '`ye27d_events`.`eventDescription`, `ye27d_events`.`facebookLink`, `ye27d_events`.`twitterLink`, `ye27d_events`.`instagramLink`, `ye27d_events`.`snapchatLink`, '
                . '`ye27d_contributors`.`contributorLastname`, '
                . '`ye27d_contributors`.`contributorFirstname`,`ye27d_sponsors`.`sponsorName`, '
                . '`ye27d_sponsors`.`sponsorLink`, `ye27d_sponsorsInEvents`.`idSponsors` '                
                . 'FROM `ye27d_events` '
                . 'INNER JOIN `ye27d_contributorsInEvents` '
                . 'ON `ye27d_events`.`id` = `ye27d_contributorsInEvents`.`idEvents` '
                . 'INNER JOIN `ye27d_contributors` '
                . 'ON `ye27d_contributorsInEvents`.`idContributors` = `ye27d_contributors`.`id` '
                . 'INNER JOIN `ye27d_sponsorsInEvents` '
                . 'ON `ye27d_events`.`id` = `ye27d_sponsorsInEvents`.`idEvents` '
                . 'INNER JOIN `ye27d_sponsors` '
                . 'ON `ye27d_sponsorsInEvents`.`idSponsors` = `ye27d_sponsors`.`id` '
                . 'INNER JOIN `ye27d_themes` '
                . 'ON `ye27d_events`.`idThemes` = `ye27d_themes`.`id` '
                . 'WHERE `ye27d_events`.id = :id';
        $result = $this->db->prepare($query);
        $result->bindValue(':id', $this->id, PDO::PARAM_INT);
        $result->execute();
        // Si $result est un objet on fait un fetch pour afficher les données de l'évènement
        if (is_object($result)) {
            $objectResult = $result->fetch(PDO::FETCH_OBJ);
        }
        return $objectResult;
    }

}

// Accolade de fin class events