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

1. Configure web server to point to `public/` directory
2. Update database configuration in `src/config/config.php`
3. Ensure Python is available for data processing
4. Set appropriate file permissions

## Requirements

- PHP 7.4+
- Python 3.6+
- Web server (Apache/Nginx)
- MySQL/MariaDB (optional)
