# challenge-laravel-students-management

## Prérequis
- PHP 8.0+
- composer
- SQLite

## Installation 

### 1. Cloner le projet 
```
git clone <url-du-repo>
```

### 2. Installer les dépendances
```
composer install
```

### 3. Configurer l'environnement
#### Créer le fichier de configuration .env (indispensable à Laravel) à partir du modèle .env.example
```
copy .env.example .env
```

#### Générer une clé de chiffrement unique (APP_KEY) dans le .env  (pour la sécurité de la config)
```
php artisan key:generate
```

### 4. Créer la base de données SQLite dans le dossier database

### 5. Exécuter les migrations et seeders
```
php artisan migrate --seed
```

### 6.Lancer le serveur
```
php artisan serve
```
