#1PRJ3

## Contexte
Ce projet vise à moderniser la prise de rendez-vous d’un salon de coiffure en offrant aux clients la possibilité de réserver en ligne 24h/24. Il inclut une vitrine du salon, un système de réservation interactif, une interface d’administration et une gestion complète des disponibilités et services.

---

## Fonctionnalités

### Page vitrine
- Présentation du salon : nom, description, photos
- Liste des services proposés avec durée et prix
- Horaires d'ouverture par jour de la semaine
- Coordonnées et localisation (adresse, téléphone)
- Témoignages clients (optionnel mais valorisé)

### Système de réservation
- Sélection du service dans une liste déroulante
- Calendrier interactif avec créneaux disponibles
- Affichage en temps réel des disponibilités
- Formulaire client : nom, prénom, email, téléphone
- Validation côté client et serveur des données
- Confirmation immédiate avec récapitulatif
- Gestion des conflits :
  - Vérification en temps réel de la disponibilité
  - Empêche la double réservation
  - Gestion des services de durées différentes
  - Blocage automatique des créneaux réservés

### Notifications email
- Email de confirmation automatique au client
- Email de notification au salon
- Template HTML professionnel incluant logo et informations complètes

### Interface administration
- Connexion sécurisée (login/password)
- Vue agenda complète avec toutes les réservations
- Possibilité de valider/annuler une réservation
- Gestion des créneaux de disponibilité
- Gestion des services (nom, durée, prix)

---

## Structure de la base de données

### Table `services`
| Champ | Type | Exemple |
|-------|------|---------|
| id | INT AUTO_INCREMENT | 1 |
| nom | VARCHAR | Coupe homme |
| description | TEXT | Coupe classique pour hommes |
| duree_minutes | INT | 30 |
| prix_euros | DECIMAL | 25.00 |

### Table `reservations`
| Champ | Type | Exemple |
|-------|------|---------|
| id | INT AUTO_INCREMENT | 1 |
| service_id | INT | 1 |
| date_rdv | DATE | 2026-03-20 |
| heure_rdv | TIME | 10:30:00 |
| nom_client | VARCHAR | Dupont |
| email_client | VARCHAR | dupont@example.com |
| telephone | VARCHAR | 0601020304 |
| statut | ENUM | en_attente / confirmé / annulé |

### Table `disponibilites`
| Champ | Type | Exemple |
|-------|------|---------|
| id | INT AUTO_INCREMENT | 1 |
| jour_semaine | VARCHAR | Lundi |
| heure_debut | TIME | 09:00:00 |
| heure_fin | TIME | 12:00:00 |
| actif | BOOLEAN | 1 |

---

## Contraintes techniques
- HTML5 sémantique, CSS3 responsive, JavaScript ES6
- PHP 7+ avec gestion d'erreurs
- MySQL avec requêtes préparées
- Bootstrap 5 autorisé
- Sécurité :
  - Protection XSS
  - Protection contre injection SQL
  - Validation côté serveur
- Compatible navigateurs modernes : Chrome, Firefox, Safari

---

## Installation
1. Cloner le projet :  
```bash
git clone https://github.com/ton-username/nom-du-repo.git
