# Réponses – TP 4 POO en PHP

## Partie 0

### 0.3

`$v1` et `$v2` ne partagent pas la même valeur de `marque`. Chaque objet est une instance différente de la classe et possède ses propres valeurs d'attributs.

## Partie 1

### 1.1

`$p->cin` et `$p->dateNaissance` provoquent une erreur car ces attributs ne sont pas publics. `$p->getAge()` provoque aussi une erreur car cette méthode est privée. Un membre privé n'est accessible que depuis sa propre classe. Après le changement de `cin` en `protected`, il reste inaccessible depuis l'extérieur.

### 1.2

Un CIN est une donnée personnelle. S'il était public, n'importe quel code pourrait le lire ou le modifier sans contrôle.

### 1.3

Une méthode privée n'est pas inutile. Elle peut être appelée par une autre méthode de la même classe, par exemple par `__toString()` pour afficher l'âge.

### 1.4

Depuis l'extérieur, le comportement ne change pas : un attribut `protected` reste inaccessible. La différence est qu'une classe fille peut accéder à un membre `protected`, mais pas à un membre `private`.

## Partie 2

### 2.1.a

`new Voiture("Noire")` utilise `"Noire"` comme couleur et garde la vitesse par défaut égale à `0`. Sans mode strict, PHP peut convertir `120` en chaîne pour `new Voiture(120)`. Avec `declare(strict_types=1)`, cet appel provoque une `TypeError` car le premier paramètre attend une chaîne.

### 2.1.b

La promotion de propriétés évite de déclarer les attributs séparément puis de les initialiser avec `$this`. Le constructeur est plus court.

### 2.2.a

PHP n'autorise pas deux méthodes portant le même nom dans une classe. Deux constructeurs provoquent donc une erreur de redéclaration.

### 2.2.b

On peut utiliser un seul constructeur avec des valeurs par défaut :

```php
public function __construct(string $nom = "", string $prenom = "")
{
    $this->nom = $nom;
    $this->prenom = $prenom;
}
```

### 2.3.a

Avec `unset`, l'ordre est : création de la voiture, destruction de la voiture, puis fin du script.

### 2.3.b

Sans `unset`, le message « Fin du script » s'affiche avant la destruction, car le destructeur est appelé à la fin du script.

### 2.3.c

À la fin du script, les deux objets sont généralement détruits dans l'ordre inverse de leur création : `$b`, puis `$a`.

### 2.3.d

Le destructeur de `Personne` affiche `Détruire Personne` lorsque l'objet est détruit.

## Partie 3

### 3.1

Les quatre méthodes sont complétées dans `partie3.php`. Le premier `isset` retourne `true`, puis après `unset`, il retourne `false`. La propriété `telephone` est refusée car elle n'existe pas.

### 3.2

Sans `__set`, modifier un attribut privé depuis l'extérieur provoque une erreur. Avec `__set`, PHP appelle automatiquement cette méthode, qui peut accepter, refuser ou valider la valeur.

### 3.3

Oui, `__set` peut casser l'encapsulation s'il accepte tout sans contrôle. Il faut vérifier le nom de la propriété et valider la valeur avant l'affectation.

### 3.4

Dans `partie3.php`, le nom est refusé s'il contient moins de deux caractères. Une `InvalidArgumentException` est alors lancée.

## Partie 4

### 4.1

`getAge()` fonctionne dans `__toString()` parce que les deux méthodes appartiennent à la même classe. Une méthode privée reste accessible à l'intérieur de sa classe.

### 4.2

`__toString()` doit retourner une chaîne. Retourner un entier provoque une `TypeError`.

### 4.3

`__toString()` permet d'utiliser directement l'objet comme une chaîne. Il est pratique avec `echo $objet` et lors de la concaténation avec une autre chaîne.

## Partie 5

### 5.1

Le mot de passe ne figure pas dans la chaîne sérialisée, car `__serialize()` retourne seulement le nom et l'âge.

### 5.2

Sans `__serialize()`, PHP sérialise aussi les attributs privés. Le mot de passe apparaît alors dans la chaîne, ce qui risque d'exposer une donnée sensible.

### 5.3

Après `unserialize`, le mot de passe vaut une chaîne vide. Dans une vraie application, il faudrait demander une nouvelle authentification ou recharger de façon sécurisée les informations nécessaires. Un mot de passe doit aussi être stocké sous forme de hash, jamais en clair.

### 5.4

Des données sérialisées modifiées par un utilisateur peuvent créer des objets inattendus et déclencher des méthodes magiques dangereuses : c'est la PHP Object Injection. Pour échanger de simples données, on utilise plutôt `json_encode()` et `json_decode()` avec une validation des valeurs reçues.

## Partie 6

### 6.1.a

La classe `Chat` hérite de `Animal` et ajoute la méthode `miauler()` dans `partie6.php`.

### 6.1.b

On ne peut pas appeler `$c->miauler()` car `$c` est un objet `Chien`. La méthode `miauler()` appartient à `Chat`, pas à `Chien` ni à `Animal`.

### 6.2.a

Sans `parent::__construct($nom)`, le constructeur de `Personne` n'est pas exécuté et l'attribut typé `$nom` n'est pas initialisé. Son utilisation provoque une erreur.

### 6.2.b

`protected` permet aux classes filles d'utiliser directement `$nom`. Avec `private`, seule `Personne` pourrait y accéder.

### 6.3.a

On ne peut pas redéfinir une méthode `final`, hériter d'une classe `final`, ni modifier une propriété `readonly` après son initialisation. Les trois essais provoquent une erreur fatale.

### 6.3.b

`readonly` convient à une référence de produit qui ne doit pas changer après la création. `final` convient à une classe de sécurité dont le comportement ne doit pas être modifié par héritage.

### 6.4.a

Une classe fille ne peut pas appeler une méthode privée de sa classe mère. Pour permettre l'appel de `$this->getAge()` dans `Etudiant`, il faut déclarer `getAge()` en `protected`.

### 6.4.b

`dateNaissance` est privée dans `Personne`. Même si `Etudiant` hérite de `Personne`, les membres privés restent accessibles uniquement dans la classe qui les déclare.

### 6.4.c

Réutiliser `parent::__toString()` évite de répéter le code. Si l'affichage de `Personne` change, `Etudiant` profite automatiquement de cette modification.

## Partie 7

### 7.1

L'expression `$this->montant 1 * ...` contient une erreur de syntaxe : il manque un opérateur entre `$this->montant` et `1`.

### 7.2

La bonne formule est :

```text
nouveau montant = montant × (1 + taux / 100)
```

### 7.3

L'ordre du code de départ n'est pas cohérent avec l'énoncé. Cela peut pousser l'utilisateur à inverser le montant et le taux lors de l'appel. Le constructeur corrigé reçoit d'abord le montant initial, puis l'intérêt.

### 7.4

Le code corrigé se trouve dans `partie7.php`. Après dix ans, il affiche environ `1 037,50` dirhams et `4 072,24` dirhams.

## Questions de synthèse

### 1

Une classe est un modèle qui définit des attributs et des méthodes. Un objet est une instance concrète créée à partir de cette classe.

### 2

La POO permet de mieux organiser le code, de réutiliser le comportement grâce aux classes et à l'héritage, et de protéger les données avec l'encapsulation.

### 3

Les attributs `private` ou `protected` empêchent leur modification directe depuis n'importe où. La classe peut ainsi contrôler les valeurs et garder un état valide.

### 4

Un membre `private` est accessible seulement dans sa classe. Un membre `protected` est aussi accessible dans les classes filles.

### 5

Les méthodes magiques doivent être publiques, sauf `__construct()`, `__destruct()` et `__clone()`, qui peuvent avoir une autre visibilité. PHP signale un avertissement si les autres méthodes magiques ne sont pas publiques.

