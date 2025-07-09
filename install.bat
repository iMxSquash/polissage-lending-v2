@echo off
echo ================================================
echo Installation automatique PHP et Python
echo ================================================

echo.
echo Verification des installations existantes...

:: Verifier Python
python --version >nul 2>&1
if %errorlevel% == 0 (
    echo [OK] Python deja installe
    python --version
) else (
    echo [INFO] Python non trouve, installation necessaire
    echo.
    echo Ouvrez Microsoft Store et installez Python 3.11
    echo OU telechargez depuis https://python.org/downloads/
    echo N'oubliez pas de cocher "Add Python to PATH"
    echo.
    pause
)

:: Verifier PHP
php --version >nul 2>&1
if %errorlevel% == 0 (
    echo [OK] PHP deja installe
    php --version
) else (
    echo [INFO] PHP non trouve, installation necessaire
    echo.
    echo Option 1: Chocolatey (recommande)
    echo   1. Installer Chocolatey: https://chocolatey.org/install
    echo   2. Executer: choco install php
    echo.
    echo Option 2: Manuel
    echo   1. Telecharger: https://windows.php.net/download/
    echo   2. Extraire dans C:\php
    echo   3. Ajouter C:\php au PATH
    echo.
    pause
)

:: Verifier Composer
composer --version >nul 2>&1
if %errorlevel% == 0 (
    echo [OK] Composer deja installe
    composer --version
) else (
    echo [INFO] Composer non trouve
    echo Telecharger: https://getcomposer.org/download/
    echo.
    pause
)

echo.
echo ================================================
echo Installation des dependances du projet
echo ================================================

if exist "composer.json" (
    echo Installation des dependances PHP...
    composer install
    if %errorlevel% == 0 (
        echo [OK] Dependances PHP installees
    ) else (
        echo [ERREUR] Echec installation PHP
    )
) else (
    echo [ATTENTION] composer.json non trouve
)

if exist "python\requirements.txt" (
    echo Installation des dependances Python...
    pip install -r python\requirements.txt
    if %errorlevel% == 0 (
        echo [OK] Dependances Python installees
    ) else (
        echo [ERREUR] Echec installation Python
    )
) else (
    echo [ATTENTION] requirements.txt non trouve
)

echo.
echo ================================================
echo Installation terminee !
echo ================================================
echo.
echo Pour lancer le projet:
echo   start-dev.bat
echo.
echo Acces aux services:
echo   - Application: http://localhost:8000
echo   - Demo: http://localhost:8000/demo  
echo   - API: http://localhost:10000/health
echo.
pause
