#!/bin/bash

# Start local development servers

echo "Starting Polissage Lending v2 development servers..."

# Start Python API server
echo "Starting Python API on port 10000..."
cd python && python api.py &
PYTHON_PID=$!

# Start PHP development server
echo "Starting PHP server on port 8000..."
cd public && php -S localhost:8000 &
PHP_PID=$!

echo "Servers started:"
echo "- PHP: http://localhost:8000"
echo "- Python API: http://localhost:10000"
echo "- Demo: http://localhost:8000/demo"

# Wait for user input to stop servers
read -p "Press Enter to stop servers..."

# Kill background processes
kill $PYTHON_PID $PHP_PID
echo "Servers stopped."
