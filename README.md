# Application d'Actualités - MGLSI News

## Description

MGLSI News est une application web simple de gestion et consultation d’articles d’actualité.  
Elle utilise une base de données MySQL pour stocker les articles et les catégories, et est développée avec HTML, CSS, PHP et TailwindCSS pour le front-end.

---

## Fonctionnalités

- Affichage des articles classés par catégorie
- Ajout, modification et suppression d’articles (via interface PHP)
- Gestion des catégories d’articles
- Interface responsive et moderne grâce à TailwindCSS
- Base de données relationnelle MySQL avec intégrité référentielle entre articles et catégories

---

## Technologies utilisées

- **Frontend** : HTML5, CSS3, [TailwindCSS](https://tailwindcss.com/)
- **Backend** : PHP (version 7+ recommandée)
- **Base de données** : MySQL
- **Autres outils** : Serveur web Apache ou Nginx (ex: via XAMPP, WAMP)

---

## Structure de la base de données

- **Base** : `mglsi_news`
- **Tables** :
  - `Categorie` : stocke les catégories d’articles (Sport, Santé, Éducation, Politique)
  - `Article` : contient les articles avec titre, contenu, date, et référence à une catégorie

---

## Installation

1. **Importer la base de données**

   Depuis ton terminal ou MySQL Workbench, importe le fichier SQL fourni (`mglsi_news.sql`) :

   ```bash
   mysql -u root -p < mglsi_news.sql
