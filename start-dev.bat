@echo off
echo ================================================
echo Polissage Lending v2 - Serveurs de developpement
echo ================================================

:: Verification des installations
echo Verification des installations...

python --version >nul 2>&1
if %errorlevel% neq 0 (
    echo [ERREUR] Python non trouve. Executez install.bat d'abord
    pause
    exit /b 1
)

php --version >nul 2>&1
if %errorlevel% neq 0 (
    echo [ERREUR] PHP non trouve. Executez install.bat d'abord
    pause
    exit /b 1
)

echo [OK] Python et PHP detectes

:: Verification des dependances
if not exist "vendor\" (
    echo Installation des dependances PHP...
    composer install
)

if not exist "python\__pycache__\" (
    echo Installation des dependances Python...
    pip install -r python\requirements.txt
)

echo.
echo Demarrage des serveurs...

echo Demarrage API Python sur le port 10000...
start "Python API" cmd /k "cd python && python api.py"

timeout /t 2 /nobreak >nul

echo Demarrage serveur PHP sur le port 8000...
start "PHP Server" cmd /k "php -S localhost:8000 -t public"

echo.
echo ================================================
echo Serveurs demarres avec succes !
echo ================================================
echo.
echo Acces aux services:
echo - Application principale: http://localhost:8000
echo - Page de demonstration: http://localhost:8000/demo
echo - API Python (health): http://localhost:10000/health
echo - API PHP (health): http://localhost:8000/api/health
echo.
echo Fermez les fenetres de commande pour arreter les serveurs
echo.
pause
