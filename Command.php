<?php

    require_once(__DIR__ . '/ContactManager.php');

    class Command
    {
        private ContactManager $contactManager;

        public function __construct()
        {
            $this->contactManager = new ContactManager();
        }

        public function list()
        {
            echo "Voici la liste des contacts\n";
            $contacts = $this->contactManager->findAll();
            foreach ($contacts as $contact)
            {
                echo $contact; 
            }
        }

        public function detail($id)
        {
            try {
                $contact = $this->contactManager->findById($id);
                echo "Voici le contact ayant l'id " . $id . "\n";
                echo $contact;
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }

        public function create($name, $email, $phoneNumber)
        {
            $this->contactManager->createContact($name, $email, $phoneNumber);
        }

        public function delete($id)
        {
            $this->contactManager->deleteContact($id);
        }
    }

?>