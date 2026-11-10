# Réponses TP 4

## Partie 0

**0.3** Non, chaque objet a sa propre marque car `$v1` et `$v2` sont deux objets différents.

## Partie 1

**1.1** On peut afficher `nom` car il est public. Mais `cin`, `dateNaissance` et `getAge()` donnent une erreur car ils sont privés.

**1.2** C'est dangereux car le CIN peut être changé directement par n'importe quel code.

**1.3** Non, elle peut être utilisée par une autre méthode dans la classe, par exemple `__toString()`.

**1.4** Non, depuis l'extérieur ça donne toujours une erreur. `protected` sert surtout pour les classes filles.

## Partie 2

**2.1.a** Avec `new Voiture("Noire")`, la vitesse reste 0. Avec `new Voiture(120)`, PHP peut convertir 120 en texte, mais en mode strict il donne une erreur de type.

**2.1.b** C'est plus court car on déclare et initialise les attributs dans le constructeur.

**2.2.a** PHP donne une erreur car on ne peut pas avoir deux constructeurs dans la même classe.

**2.2.b** On peut mettre des valeurs par défaut :

```php
public function __construct(string $nom = "", string $prenom = "")
```

**2.3.a** Création, destruction, puis fin du script.

**2.3.b** Sans `unset`, la destruction se fait après le message de fin.

**2.3.c** En général `$b` est détruit avant `$a`.

**2.3.d** Le destructeur affiche `Détruire Personne`.

## Partie 3

**3.1** Avant `unset`, `isset` donne `true`. Après `unset`, il donne `false`. `telephone` est refusé car il n'existe pas.

**3.2** Sans `__set` on a une erreur. Avec `__set`, la méthode est appelée automatiquement.

**3.3** Oui, si on accepte toutes les valeurs. Il faut vérifier la valeur avant de la mettre.

**3.4** J'ai utilisé `strlen` et `InvalidArgumentException` pour refuser un nom trop court.

## Partie 4

**4.1** Car `getAge()` est appelée depuis une méthode de la même classe.

**4.2** PHP donne une `TypeError` car `__toString()` doit retourner un texte.

**4.3** C'est pratique pour faire `echo $p` ou concaténer l'objet avec un texte.

## Partie 5

**5.1** Non, le mot de passe n'est pas dans la chaîne.

**5.2** Sans `__serialize()`, le mot de passe apparaît aussi. Ce n'est pas sécurisé.

**5.3** Après `unserialize`, le mot de passe est vide. Dans une vraie application il ne faut jamais garder le mot de passe en clair.

**5.4** Une personne peut modifier les données et créer un objet dangereux. Ça s'appelle PHP Object Injection. On peut utiliser JSON à la place.

## Partie 6

**6.1.a** J'ai ajouté `Chat` avec la méthode `miauler()`.

**6.1.b** Non, car `$c` est un `Chien` et `miauler()` existe seulement dans `Chat`.

**6.2.a** `$nom` ne sera pas initialisé, donc on aura une erreur quand on va l'utiliser.

**6.2.b** Pour que la classe fille puisse accéder à `$nom`.

**6.3.a** On ne peut pas modifier une méthode `final`, hériter d'une classe `final`, ou changer une propriété `readonly`.

**6.3.b** `readonly` peut servir pour un identifiant. `final` peut servir pour une classe qu'on ne veut pas modifier avec l'héritage.

**6.4.a** Une classe fille ne peut pas utiliser une méthode privée. Il faut mettre `getAge()` en `protected`.

**6.4.b** Car `dateNaissance` est privée dans `Personne`.

**6.4.c** On évite de réécrire le même code.

## Partie 7

**7.1** Il manque un opérateur dans la formule de `un_an()`.

**7.2** La formule correcte est : `montant * (1 + taux / 100)`.

**7.3** Non, l'ordre n'est pas pareil que dans l'énoncé. On risque d'inverser le montant et l'intérêt.

**7.4** Après 10 ans, on trouve environ `1 037,50 DH` et `4 072,24 DH`.

## Questions de synthèse

**1.** Une classe est un modèle et un objet est une instance de cette classe.

**2.** La POO organise mieux le code, permet de réutiliser le code et protège les données.

**3.** Pour empêcher de modifier les attributs directement depuis l'extérieur.

**4.** `private` est accessible seulement dans la classe. `protected` est aussi accessible dans les classes filles.

**5.** Oui, les méthodes magiques sont généralement publiques. Les exceptions sont `__construct()`, `__destruct()` et `__clone()`.
