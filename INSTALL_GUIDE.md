# Installation PHP et Python sur Windows

## Étape 1: Installation de Python

### Option A: Téléchargement Direct (Recommandé)
1. Aller sur https://www.python.org/downloads/
2. Cliquer sur "Download Python 3.11.x" (dernière version)
3. **IMPORTANT**: Cocher "Add Python to PATH" lors de l'installation
4. Cliquer "Install Now"

### Option B: Microsoft Store
1. Ouvrir Microsoft Store
2. Chercher "Python 3.11"
3. Installer

### Vérification Python
Ouvrir un nouveau terminal (cmd ou PowerShell) et taper :
```bash
python --version
pip --version
```

## Étape 2: Installation de PHP

### Option A: Téléchargement Direct
1. Aller sur https://windows.php.net/download/
2. Télécharger "Thread Safe" version 8.1 ou 8.2
3. Extraire dans `C:\php`
4. Ajouter `C:\php` au PATH système :
   - Windows + R → `sysdm.cpl`
   - Onglet "Avancé" → "Variables d'environnement"
   - Sélectionner "Path" → "Modifier" → "Nouveau"
   - Ajouter `C:\php`

### Option B: Chocolatey (Plus simple)
1. Installer Chocolatey : https://chocolatey.org/install
2. Ouvrir PowerShell en administrateur
3. Exécuter :
```bash
choco install php
```

### Vérification PHP
Ouvrir un nouveau terminal et taper :
```bash
php --version
```

## Étape 3: Installation de Composer (Gestionnaire PHP)
1. Aller sur https://getcomposer.org/download/
2. Télécharger et installer "Composer-Setup.exe"
3. Vérifier :
```bash
composer --version
```

## Étape 4: Test du Projet

### Installer les dépendances
```bash
# Dans le dossier du projet
cd c:\DEV\alternance\formation_detailing\polissage-lending-v2

# Installer les dépendances PHP
composer install

# Installer les dépendances Python
pip install -r python/requirements.txt
```

### Lancer les serveurs
```bash
# Méthode 1: Script automatique
start-dev.bat

# Méthode 2: Manuel
# Terminal 1 - API Python
cd python
python api.py

# Terminal 2 - Serveur PHP
cd public
php -S localhost:8000
```

### Accès aux services
- **Application principale** : http://localhost:8000
- **Page de démo** : http://localhost:8000/demo
- **API Python** : http://localhost:10000/health

## Dépannage

### Python non reconnu
- Redémarrer le terminal après installation
- Vérifier que Python est dans le PATH
- Essayer `py` au lieu de `python`

### PHP non reconnu
- Vérifier que PHP est dans le PATH
- Redémarrer le terminal
- Essayer de relancer en tant qu'administrateur

### Port déjà utilisé
- Changer le port dans les scripts :
  - PHP : `php -S localhost:8001`
  - Python : modifier `PORT=10001` dans api.py

### Problème de dépendances
```bash
# Réinstaller les dépendances Python
pip install --upgrade -r python/requirements.txt

# Réinstaller les dépendances PHP  
composer install --no-cache
```
