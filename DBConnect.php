<?php

    require_once(__DIR__ . '/config.php');

    class DBConnect 
    {
        private PDO $connexionPDO;

        // Connexion à la base de donnée
        public function __construct()
        {
            $this->connexionPDO = new PDO(
                'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8',
                DB_USER,
                DB_PASS,
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
            );
        }

        public function getPDO(): PDO
        { 
            return $this->connexionPDO;    
        }
    }
?>