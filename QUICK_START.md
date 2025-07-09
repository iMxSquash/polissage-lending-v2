# 🚀 DÉMARRAGE RAPIDE

## 1. Installation automatique

### Méthode A: PowerShell (Recommandé)
```powershell
# Clic droit sur PowerShell → "Exécuter en tant qu'administrateur"
Set-ExecutionPolicy -ExecutionPolicy RemoteSigned -Scope CurrentUser
.\install.ps1
```

### Méthode B: Script Batch
```bash
# Double-clic sur le fichier
install.bat
```

## 2. Lancement du projet
```bash
# Double-clic sur le fichier
start-dev.bat
```

## 3. Accès
- **Application** : http://localhost:8000
- **Demo** : http://localhost:8000/demo

---

## ⚠️ En cas de problème

### Python non reconnu
```bash
# Essayer avec "py" au lieu de "python"
py --version
```

### PHP non reconnu  
```bash
# Redémarrer le terminal après installation
# OU télécharger manuellement: https://windows.php.net/download/
```

### Port déjà utilisé
- Fermer les autres serveurs web
- OU changer les ports dans start-dev.bat

### Chocolatey bloqué
```powershell
# Exécuter en administrateur
Set-ExecutionPolicy Bypass -Scope Process -Force
```

---

## 📋 Installation manuelle

Si les scripts automatiques ne marchent pas :

1. **Python** : https://python.org/downloads/ (cocher "Add to PATH")
2. **PHP** : https://windows.php.net/download/ (extraire + ajouter au PATH)  
3. **Composer** : https://getcomposer.org/download/

Puis exécuter :
```bash
composer install
pip install -r python/requirements.txt
```
