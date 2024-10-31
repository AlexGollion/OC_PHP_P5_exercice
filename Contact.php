<?php
    class Contact 
    {
        private int $id;
        private string $name;
        private string $email;
        private string $phoneNumber;

        // constructeur d'un contact
        public function __construct($id, $name, $email, $phoneNumber)
        {
            $this->id = $id;
            $this->name = $name;
            $this->email = $email;
            $this->phoneNumber = $phoneNumber;
        }

        // getter pour l'id du contact
        public function getId(): int
        {
            return $this->id;
        }

        // getter pour l'id du contact
        public function getName(): string
        {
            return $this->name;
        }

        // getter pour l'id du contact
        public function getEmail(): string
        {
            return $this->email;
        }

        // getter pour l'id du contact
        public function getPhoneNumber(): string
        {
            return $this->phoneNumber;
        }

        // Permet de renvoyé les informations du contact sous forme de string
        public function __toString()
        {
            $toString = 'Id: ' . $this->id . ', Name: ' . $this->name . ', Email: ' . $this->email . ', Phone number: ' . $this->phoneNumber . "\n";
            return $toString;
        }
    }
?>