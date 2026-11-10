<?php

class Voiture
{
    public function __construct(
        public string $couleur = "Blanche",
        public int $vitesse = 0
    ) {
        echo "Voiture {$this->couleur} créée." . PHP_EOL;
    }

    public function afficher(): void
    {
        echo "Couleur : {$this->couleur} | Vitesse : {$this->vitesse} km/h" . PHP_EOL;
    }

    public function __destruct()
    {
        echo "Voiture {$this->couleur} détruite." . PHP_EOL;
    }
}

class Personne
{
    public function __construct(
        public string $nom = "",
        public string $prenom = ""
    ) {
        echo "Création " . __CLASS__ . PHP_EOL;
    }

    public function __destruct()
    {
        echo "Détruire " . __CLASS__ . PHP_EOL;
    }
}

$v1 = new Voiture();
$v2 = new Voiture("Rouge", 50);
$v3 = new Voiture("Noire");

$v1->afficher();
$v2->afficher();
$v3->afficher();

$personneVide = new Personne();
$personne = new Personne("Hachimi", "Sara");

unset($v1);
echo "Fin du script." . PHP_EOL;

// new Voiture(120) provoque une TypeError en mode strict, car 120 n'est pas une chaîne.

