@echo off
echo Starting Polissage Lending v2 development servers...

echo Starting Python API on port 10000...
start /B python python/api.py

echo Starting PHP server on port 8000...
start /B php -S localhost:8000 -t public

echo Servers started:
echo - PHP: http://localhost:8000
echo - Python API: http://localhost:10000
echo - Demo: http://localhost:8000/demo

pause
