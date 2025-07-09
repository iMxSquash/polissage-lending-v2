# Installation automatique avec Chocolatey
Write-Host "================================================" -ForegroundColor Cyan
Write-Host "Installation automatique PHP et Python" -ForegroundColor Cyan  
Write-Host "================================================" -ForegroundColor Cyan

# Fonction pour vérifier si une commande existe
function Test-Command($cmdname) {
    return [bool](Get-Command -Name $cmdname -ErrorAction SilentlyContinue)
}

# Vérifier si on est en mode administrateur
$isAdmin = ([Security.Principal.WindowsPrincipal] [Security.Principal.WindowsIdentity]::GetCurrent()).IsInRole([Security.Principal.WindowsBuiltInRole] "Administrator")

if (-not $isAdmin) {
    Write-Host "⚠️  Ce script doit être exécuté en tant qu'administrateur" -ForegroundColor Yellow
    Write-Host "Faites clic droit sur PowerShell → 'Exécuter en tant qu'administrateur'" -ForegroundColor Yellow
    Read-Host "Appuyez sur Entrée pour continuer en mode normal (installation manuelle requise)"
}

# Vérifier Chocolatey
Write-Host "`n🔍 Vérification de Chocolatey..." -ForegroundColor Green
if (-not (Test-Command choco)) {
    Write-Host "📦 Installation de Chocolatey..." -ForegroundColor Yellow
    Set-ExecutionPolicy Bypass -Scope Process -Force
    [System.Net.ServicePointManager]::SecurityProtocol = [System.Net.ServicePointManager]::SecurityProtocol -bor 3072
    Invoke-Expression ((New-Object System.Net.WebClient).DownloadString('https://community.chocolatey.org/install.ps1'))
    
    # Rafraîchir les variables d'environnement
    $env:ChocolateyInstall = Convert-Path "$((Get-Command choco).Path)\..\.."
    Import-Module "$env:ChocolateyInstall\helpers\chocolateyProfile.psm1"
    refreshenv
} else {
    Write-Host "✅ Chocolatey déjà installé" -ForegroundColor Green
}

# Installer Python
Write-Host "`n🐍 Vérification de Python..." -ForegroundColor Green
if (-not (Test-Command python)) {
    Write-Host "📦 Installation de Python..." -ForegroundColor Yellow
    choco install python -y
    refreshenv
} else {
    Write-Host "✅ Python déjà installé:" -ForegroundColor Green
    python --version
}

# Installer PHP
Write-Host "`n🐘 Vérification de PHP..." -ForegroundColor Green
if (-not (Test-Command php)) {
    Write-Host "📦 Installation de PHP..." -ForegroundColor Yellow
    choco install php -y
    refreshenv
} else {
    Write-Host "✅ PHP déjà installé:" -ForegroundColor Green
    php --version
}

# Installer Composer
Write-Host "`n🎵 Vérification de Composer..." -ForegroundColor Green
if (-not (Test-Command composer)) {
    Write-Host "📦 Installation de Composer..." -ForegroundColor Yellow
    choco install composer -y
    refreshenv
} else {
    Write-Host "✅ Composer déjà installé:" -ForegroundColor Green
    composer --version
}

# Installation des dépendances du projet
Write-Host "`n📋 Installation des dépendances du projet..." -ForegroundColor Green

if (Test-Path "composer.json") {
    Write-Host "📦 Installation des dépendances PHP..." -ForegroundColor Yellow
    composer install
    Write-Host "✅ Dépendances PHP installées" -ForegroundColor Green
} else {
    Write-Host "⚠️  composer.json non trouvé" -ForegroundColor Yellow
}

if (Test-Path "python\requirements.txt") {
    Write-Host "📦 Installation des dépendances Python..." -ForegroundColor Yellow
    pip install -r python\requirements.txt
    Write-Host "✅ Dépendances Python installées" -ForegroundColor Green
} else {
    Write-Host "⚠️  requirements.txt non trouvé" -ForegroundColor Yellow
}

Write-Host "`n================================================" -ForegroundColor Cyan
Write-Host "🎉 Installation terminée !" -ForegroundColor Green
Write-Host "================================================" -ForegroundColor Cyan

Write-Host "`nPour lancer le projet:" -ForegroundColor White
Write-Host "  .\start-dev.bat" -ForegroundColor Cyan

Write-Host "`nAccès aux services:" -ForegroundColor White
Write-Host "  • Application: http://localhost:8000" -ForegroundColor Cyan
Write-Host "  • Demo: http://localhost:8000/demo" -ForegroundColor Cyan
Write-Host "  • API: http://localhost:10000/health" -ForegroundColor Cyan

Read-Host "`nAppuyez sur Entrée pour continuer"
