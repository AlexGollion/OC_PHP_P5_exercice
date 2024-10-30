<?php
    class Contact 
    {
        private int $id;
        private string $name;
        private string $email;
        private string $phoneNumber;

        public function __construct($id, $name, $email, $phoneNumber)
        {
            $this->id = $id;
            $this->name = $name;
            $this->email = $email;
            $this->phoneNumber = $phoneNumber;
        }

        public function getId(): int
        {
            return $this->id;
        }

        public function getName(): string
        {
            return $this->name;
        }

        public function getEmail(): string
        {
            return $this->email;
        }

        public function getPhoneNumber(): string
        {
            return $this->phoneNumber;
        }

        public function __toString()
        {
            $toString = 'Id: ' . $this->id . ', Name: ' . $this->name . ', Email: ' . $this->email . ', Phone number: ' . $this->phoneNumber . "\n";
            return $toString;
        }
    }
?>