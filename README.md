# Polissage Lending v2

Professional car detailing training website built with PHP, JavaScript, and Python.

## Architecture

- **PHP**: Backend logic, routing, and data management
- **JavaScript**: Interactive UI elements, animations, and carousels
- **Python**: Data processing and analytics

## Structure

```
polissage-lending-v2/
├── public/                 # Web root
│   ├── index.php          # Entry point
│   ├── css/               # Stylesheets
│   ├── js/                # JavaScript files
│   └── images/            # Static images
├── src/                   # PHP source code
│   ├── config/            # Configuration files
│   ├── controllers/       # Request handlers
│   ├── models/            # Data models
│   ├── services/          # Business logic
│   ├── utils/             # Utilities
│   └── views/             # Templates
│       ├── components/    # Reusable components
│       └── pages/         # Page templates
├── python/                # Python scripts
│   └── processors/        # Data processing scripts
└── data/                  # Data files
```

## Features

- Responsive design
- Course catalog with animations
- Review carousel with touch support
- Contact form with validation
- Mobile-friendly navigation
- Data analytics with Python
- Clean PHP architecture

## Setup

### 1. Configuration du serveur web

Configure your web server to point to `public/` directory as document root.

### 2. Installation Python

```bash
# Navigate to python directory
cd python/

# Install dependencies
pip install -r requirements.txt

# Initialize sample data (optional)
python init_data.py

# Start Python API server
python api.py
```

The Python API will be available at `http://localhost:5000`

### 3. PHP Configuration

1. Update database configuration in `src/config/config.php`
2. Set appropriate file permissions for web server
3. Ensure PHP 7.4+ is installed

### 4. Quick Start Commands

```bash
# Start PHP development server (alternative)
php -S localhost:8080 -t public/

# Test Python API
curl http://localhost:5000/health

# Run data processors
python python/test_processors.py
```

## Requirements

- PHP 7.4+
- Python 3.6+
- Web server (Apache/Nginx)
- MySQL/MariaDB (optional)
