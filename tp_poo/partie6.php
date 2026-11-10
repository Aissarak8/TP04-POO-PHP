<?php

class Animal
{
    public function manger(): void
    {
        echo "Je mange." . PHP_EOL;
    }
}

class Chien extends Animal
{
    public function aboyer(): void
    {
        echo "Wouf !" . PHP_EOL;
    }
}

class Chat extends Animal
{
    public function miauler(): void
    {
        echo "Miaou !" . PHP_EOL;
    }
}

class Personne
{
    public function __construct(
        private string $nom,
        private string $prenom,
        private string $dateNaissance,
        private string $villeNaissance,
        private string $cin
    ) {
    }

    protected function getAge(): int
    {
        $naissance = new DateTime($this->dateNaissance);
        $aujourdhui = new DateTime();

        return $naissance->diff($aujourdhui)->y;
    }

    public function __toString(): string
    {
        return $this->prenom . " " . $this->nom . " (" . $this->getAge() . " ans)";
    }
}

class Etudiant extends Personne
{
    private string $cne;

    public function __construct(
        string $nom,
        string $prenom,
        string $dateNaissance,
        string $villeNaissance,
        string $cin,
        string $cne
    ) {
        parent::__construct($nom, $prenom, $dateNaissance, $villeNaissance, $cin);
        $this->cne = $cne;
    }

    public function getCne(): string
    {
        return $this->cne;
    }

    public function __toString(): string
    {
        return parent::__toString() . " | CNE : " . $this->cne;
    }
}

$chien = new Chien();
$chien->manger();
$chien->aboyer();

$chat = new Chat();
$chat->manger();
$chat->miauler();

$etudiants = [];
$etudiants[] = new Etudiant("Alaoui", "Ahmed", "2002-01-10", "Rabat", "AA123456", "R1001");
$etudiants[] = new Etudiant("Bennani", "Salma", "2001-03-22", "Fès", "BB123456", "R1002");
$etudiants[] = new Etudiant("Chakir", "Youssef", "2003-07-05", "Agadir", "CC123456", "R1003");
$etudiants[] = new Etudiant("Dahbi", "Imane", "2002-11-18", "Casablanca", "DD123456", "R1004");
$etudiants[] = new Etudiant("El Fassi", "Omar", "2001-09-30", "Meknès", "EE123456", "R1005");

foreach ($etudiants as $e) {
    echo $e . PHP_EOL;
}

