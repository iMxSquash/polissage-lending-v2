# Polissage Lending v2 - Render Deployment

Ready-to-deploy car detailing training platform for Render.com.

## Architecture

- **PHP Web Service**: Main application, static assets, routing
- **Python Web Service**: Data processing REST API
- **Auto-deploy**: Enabled from Git repository
- **PR Previews**: Enabled for testing

## Render Services

### PHP Web Service

- Port: Dynamic (from $PORT)
- Build: `composer install --no-dev --optimize-autoloader`
- Start: `php -S 0.0.0.0:$PORT -t public`

### Python API Service

- Port: 10000
- Build: `pip install -r python/requirements.txt`
- Start: `python python/api.py`

## Quick Deploy

1. Fork/clone this repository
2. Connect to Render.com
3. Deploy using `render.yaml`
4. Services will auto-configure

## Local Development

### Windows

```bash
start-dev.bat
```

### Linux/Mac

```bash
chmod +x start-dev.sh
./start-dev.sh
```

## API Endpoints

### PHP Service

- `GET /` - Main application
- `GET /demo` - Demo page
- `GET /api/health` - Health check
- `POST /contact` - Contact form

### Python Service

- `GET /health` - Health check
- `POST /process/reviews` - Process reviews data
- `POST /process/courses` - Process courses data

## Environment Variables

- `PYTHON_API_URL` - Auto-configured by Render
- `PORT` - Auto-configured by Render

## File Structure

```
├── render.yaml          # Render configuration
├── composer.json        # PHP dependencies
├── public/              # Web root
│   ├── index.php       # Main entry point
│   ├── demo.html       # Demo page
│   ├── css/            # Stylesheets
│   └── js/             # JavaScript
├── python/             # Python API service
│   ├── api.py         # Flask API server
│   └── requirements.txt
└── src/               # PHP application code
```

Ready for production deployment on Render.com!
