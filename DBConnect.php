<?php

    class DBConnect 
    {
        private PDO $connexionPDO;

        public function __construct()
        {
            $this->connexionPDO = new PDO(
                'mysql:host=localhost;dbname=oc_php_p_exercice;charset=utf8',
                'root',
                '',
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
            );
        }

        public function getPDO(): PDO
        { 
            return $this->connexionPDO;    
        }
    }
?>