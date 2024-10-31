<?php

    require_once(__DIR__ . '/ContactManager.php');

    class Command
    {
        private ContactManager $contactManager;

        public function __construct()
        {
            $this->contactManager = new ContactManager();
        }

        public function list() : void
        {
            echo "Voici la liste des contacts\n";
            $contacts = $this->contactManager->findAll();
            foreach ($contacts as $contact)
            {
                echo $contact; 
            }
        }

        public function detail(int $id) : void
        {
            try {
                $contact = $this->contactManager->findById($id);
                echo "Voici le contact ayant l'id " . $id . "\n";
                echo $contact;
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }

        public function create(string $name, string $email, string $phoneNumber)
        {
            $this->contactManager->createContact($name, $email, $phoneNumber);
        }

        public function delete(int $id) : void
        {
            $this->contactManager->deleteContact($id);
        }

        public function help() : void
        {
            echo "help : affiche cette aide\n";
            echo "list : liste les contacts\n";
            echo "detail [id] : affiche les informations du contact ayant l'[id] indiquer\n";
            echo "create [name], [email], [phone number] : crée un contact\n";
            echo "delete [id] : supprime le contact ayant l'[id]\n";
            echo "quit : quitte le programme\n";
        }
    }

?>