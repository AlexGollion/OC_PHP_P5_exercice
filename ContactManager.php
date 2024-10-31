<?php

    require_once(__DIR__ . '/DBConnect.php');
    require_once(__DIR__ . '/Contact.php');

    class ContactManager
    {
        private DBConnect $bdd;
        private PDO $pdo;
        
        // constructeur d'un contactManager
        public function __construct()
        {
            $this->bdd = new DBConnect();
            $this->pdo = $this->bdd->getPDO();
        }

        // renvoie la liste de tous les contacts
        public function findAll(): array
        {
            $sqlQuerry = 'SELECT * FROM contact';
            $contactStatement = $this->pdo->prepare($sqlQuerry);
            $contactStatement->execute();
            $contactsReq = $contactStatement->fetchAll();
            $contactList = array();

            foreach ($contactsReq as $contact)
            {
                $contactTemp = new Contact($contact['id'], $contact['name'], $contact['email'], $contact['phone_number']);
                array_push($contactList, $contactTemp);
            }

            return $contactList;
        }

        // renvoie les informations du contact ayant l'id passé en paramètre
        public function findById(int $id) : Contact
        {
            $sqlQuerry = 'SELECT * FROM contact WHERE id = :id';
            $contactStatement = $this->pdo->prepare($sqlQuerry);
            $contactStatement->execute([
                'id' => $id,
            ]);
            $contactRes = $contactStatement->fetchAll();
            if (!empty($contactRes))
            {
                $contact = new Contact($contactRes[0]['id'], $contactRes[0]['name'], $contactRes[0]['email'], $contactRes[0]['phone_number']);
                return $contact;
            }
            else
            {
                throw new Exception("Contact non trouvé\n");
            }
        }

        // créer un nouveau contact avec les informations passé en paramètre
        public function createContact(string $name, string $email, string $phoneNumber) : void
        {
            $sqlQuerry = 'INSERT INTO contact(name, email, phone_number) VALUES (:name, :email, :phone_number)';
            $contactStatement = $this->pdo->prepare($sqlQuerry);
            $contactStatement->execute([
                'name' => $name,
                'email' => $email,
                'phone_number' => $phoneNumber,
            ]);       
        }
        
        // supprime le contact ayant l'id passé en paramètre
        public function deleteContact(int $id) : void
        {
            $sqlQuerry = 'DELETE FROM contact WHERE id = :id';
            $contactStatement = $this->pdo->prepare($sqlQuerry);
            $contactStatement->execute([
                'id' => $id,
            ]);     
        }
    }

?>