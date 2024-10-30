<?php

    require_once(__DIR__ . '/DBConnect.php');
    require_once(__DIR__ . '/Contact.php');

    class ContactManager
    {
        private DBConnect $bdd;
        private PDO $pdo;
        
        public function __construct()
        {
            $this->bdd = new DBConnect();
            $this->pdo = $this->bdd->getPDO();
        }

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

        public function findById($id)
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

        public function createContact($name, $email, $phoneNumber)
        {
            $sqlQuerry = 'INSERT INTO contact(name, email, phone_number) VALUES (:name, :email, :phone_number)';
            $contactStatement = $this->pdo->prepare($sqlQuerry);
            $contactStatement->execute([
                'name' => $name,
                'email' => $email,
                'phone_number' => $phoneNumber,
            ]);       
        }
        
        public function deleteContact($id)
        {
            $sqlQuerry = 'DELETE FROM contact WHERE id = :id';
            $contactStatement = $this->pdo->prepare($sqlQuerry);
            $contactStatement->execute([
                'id' => $id,
            ]);     
        }
    }

?>