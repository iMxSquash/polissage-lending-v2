# Polissage Lending v2

Site web professionnel de formation au polissage automobile construit avec PHP et JavaScript.

## Architecture

- **PHP**: Backend, routage et gestion des données
- **JavaScript**: Éléments UI interactifs, animations et carrousels
- **Python**: Script de génération de données (développement uniquement)

## Installation

```bash
# Démarrer le serveur de développement PHP
php -S localhost:8080 -t public/

# Générer des données de test
python python/init_data.py
```

## Prérequis

- PHP 8.0+
- Serveur web (Apache/Nginx)
- Python 3.6+ (pour la génération de données uniquement)
