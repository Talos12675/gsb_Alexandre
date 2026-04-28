# Application GSB - Compte Rendu de Visite

## Contexte

Vous travaillez pour la DSI du laboratoire pharmaceutique GSB. L'entreprise souhaite moderniser une application permettant aux visiteurs médicaux de saisir et consulter leurs comptes rendus de visite. Votre mission consiste à développer une nouvelle version web de cette application.

Le laboratoire Galaxy Swiss Bourdin (GSB) est issu de la fusion entre le géant américain Galaxy (spécialisé dans le secteur des maladies virales dont le SIDA et les hépatites) et le conglomérat européen Swiss Bourdin (travaillant sur des médicaments plus conventionnels), lui-même déjà union de trois petits laboratoires. Le laboratoire Galaxy Swiss Bourdin (GSB) désire à disposition des visiteurs médicaux une application Web permettant de centraliser les comptes-rendus (rapports) de visite. L'application web reprendra le périmètre applicatif de l'application Access 2003. L'application fournira ainsi une description des produits du laboratoire, les coordonnées des praticiens et des informations détaillées concernant les rapports des visites.

## Travail demandé

Vous devez réaliser une application web en PHP utilisant le framework Laravel permettant :

1. L'authentification d'un visiteur
2. La consultation des visiteurs médicaux
3. La consultation des praticiens
4. La création d'un compte rendu de visite
5. La consultation des comptes rendus du visiteur connecté
6. L'export d'un compte rendu

## Contraintes techniques

Vous devez respecter les exigences suivantes :

- **Sécurité** : Utilisation de requêtes préparées, protection contre les injections SQL, validation des données saisies
- **Qualité du code** : Code structuré, lisible, correctement indenté, commenté lorsque nécessaire
- **Interface** : Respect de la charte graphique fournie, interface claire et ergonomique

## Fonctionnalités implémentées

- Authentification des visiteurs médicaux
- Consultation des praticiens avec recherche avancée
- Création et modification de comptes rendus de visite
- Export PDF des rapports
- Gestion du profil utilisateur (bonus)
- Journalisation des connexions utilisateurs

## Technologies utilisées

- **Backend** : Laravel (PHP)
- **Frontend** : Blade templates, Tailwind CSS, JavaScript
- **Base de données** : MySQL
- **Outils** : Composer, npm, Vite

## Prérequis

Avant de commencer, assurez-vous d'avoir installé les outils suivants sur votre machine :

- **WAMP** (ou XAMPP) : Serveur local pour PHP et MySQL
- **PHP** : Version 8.2
- **Composer** : Gestionnaire de dépendances PHP
- **Node.js** : Version 22 ou supérieure (pour les assets front-end)
- **npm** : Gestionnaire de paquets JavaScript (inclus avec Node.js)
- **Git** : Pour cloner le dépôt (optionnel)

### Installation de WAMP

1. Téléchargez WAMP depuis le site officiel : [https://www.wampserver.com/](https://www.wampserver.com/)
2. Installez WAMP en suivant les instructions d'installation
3. Lancez WAMP et assurez-vous que les services Apache et MySQL sont démarrés (icône verte)

### Configuration PHP

1. Ouvrez WAMP et cliquez sur l'icône dans la barre des tâches
2. Allez dans "PHP" > "PHP extensions" et activez les extensions suivantes :
   - pdo_mysql
   - mbstring
   - openssl
   - fileinfo
   - gd
3. Vérifiez la version PHP : Cliquez sur "PHP" > "Version" et sélectionnez PHP 8.2.x

### Installation de Composer

1. Téléchargez Composer depuis : [https://getcomposer.org/download/](https://getcomposer.org/download/)
2. Installez Composer en suivant les instructions
3. Vérifiez l'installation : Ouvrez un terminal et tapez `composer --version`

### Installation de Node.js

1. Téléchargez Node.js depuis : [https://nodejs.org/](https://nodejs.org/)
2. Installez Node.js (version LTS recommandée)
3. Vérifiez l'installation : Ouvrez un terminal et tapez `node --version` et `npm --version`

## Installation du projet

1. **Cloner ou copier le projet** :
   - Placez le dossier du projet dans le répertoire `www` de WAMP (par exemple : `C:\wamp64\www\sio2\gsb_Alexandre`)

2. **Installer les dépendances PHP** :
   - Ouvrez un terminal dans le dossier du projet
   - Exécutez : `composer install`

3. **Installer les dépendances JavaScript** :
   - Dans le même terminal, exécutez : `npm install`

4. **Configuration de l'environnement** :
   - Copiez le fichier `.env.example` vers `.env` : `cp .env.example .env`
   - Éditez le fichier `.env` avec vos paramètres :
     ```
     APP_NAME="GSB Application"
     APP_ENV=local
     APP_KEY=base64:YOUR_APP_KEY_HERE
     APP_DEBUG=true
     APP_URL=http://localhost/sio2/GSB/public

     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=gsb
     DB_USERNAME=root
     DB_PASSWORD=
     ```

5. **Générer la clé d'application** :
   - Exécutez : `php artisan key:generate`

6. **Migrer la base de données** :
   - Créez une base de données MySQL nommée `gsb` via phpMyAdmin (accessible via WAMP)
   - Exécutez : `php artisan migrate`
   - (Optionnel) Exécutez les seeders : `php artisan db:seed`

7. **Compiler les assets** :
   - Exécutez : `npm run build` (pour production) ou `npm run dev` (pour développement)


## Commandes à exécuter

Voici la liste complète des commandes à exécuter dans l'ordre pour installer et lancer le projet. Ouvrez un terminal dans le dossier racine du projet (`C:\wamp64\www\sio2\GSB`) :

1. **Installer les dépendances PHP** :
   ```
   composer install
   ```

2. **Installer les dépendances JavaScript** :
   ```
   npm install
   ```

3. **Générer la clé d'application Laravel** :
   ```
   php artisan key:generate
   ```

4. **Migrer la base de données** (assurez-vous que la base `gsb_db` existe dans MySQL) :
   ```
   php artisan migrate
   ```

5. **Alimenter la base avec des données de test** :
   ```
   php artisan db:seed
   ```

6. **Compiler les assets front-end** :
   ```
   npm run build
   ```

7. **Démarrer le serveur Laravel** :
   ```
   php artisan serve
   ```

   L'application sera accessible à `http://localhost:8000`.

8. **(Pour le développement) Lancer le serveur de développement pour les assets** :
   ```
   npm run dev
   ```

## Tests

- Exécutez les tests avec : `php artisan test`
- Pour les tests d'intégration, assurez-vous que la base de données de test est configurée

## Structure du projet

- `app/` : Code de l'application (Modèles, Contrôleurs, etc.)
- `database/` : Migrations, seeders, factories
- `public/` : Assets publics
- `resources/` : Vues, CSS, JS
- `routes/` : Définition des routes
- `tests/` : Tests unitaires et fonctionnels

## Évolutions implémentées

- **User Story 1** : Authentification des visiteurs avec gestion du profil
- **User Story 2** : Modification des comptes rendus avec traçabilité des dates
- **User Story 3** : Journalisation des connexions utilisateurs
