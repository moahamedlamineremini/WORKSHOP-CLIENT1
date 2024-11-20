# Workshop 1

## Description
Ce projet est un atelier de développement pour MYDIGITALSCHOOL. Il s'agit du backend d'un site de vente de retro gaming, développé avec Symfony.

## Prérequis
- [PHP](https://www.php.net/)
- [Composer](https://getcomposer.org/)
- [Symfony CLI](https://symfony.com/download)
- [Docker](https://www.docker.com/) (optionnel)

## Installation
1. Clonez le dépôt :
    ```bash
    git clone https://github.com/votre-utilisateur/votre-repo.git
    cd votre-repo
    ```

2. Installez les dépendances :
    ```bash
    composer install
    ```

## Commandes de migration
1. Créez une nouvelle migration :
    ```bash
    php bin/console make:migration
    ```

2. Exécutez les migrations :
    ```bash
    php bin/console doctrine:migrations:migrate
    ```

3. Annulez la dernière migration :
    ```bash
    php bin/console doctrine:migrations:rollback
    ```

## Démarrage
Pour démarrer le projet en mode développement :
```bash
symfony serve
```

## Contribuer
Les contributions sont les bienvenues. Veuillez soumettre une pull request pour toute modification.
