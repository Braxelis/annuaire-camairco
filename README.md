# Annuaire Camairco

This project is an employee directory application for Camairco, consisting of a PHP backend API and an HTML/JavaScript frontend.

## Project Structure

- `backend/` - PHP API with JWT authentication
- `frontend/` - HTML/JavaScript frontend interface
- `index.html` - Main entry point for the application

## Features

- Employee directory with search functionality
- JWT-based authentication system
- Admin-only user management
- Responsive web interface

## Quick Start

### Backend Setup

1. Navigate to the backend directory:
   ```bash
   cd backend
   ```

2. Install PHP dependencies:
   ```bash
   composer install
   ```

3. Set up the database:
   ```bash
   mysql -u root -p < sql/annuaire.sql
   ```

4. Start the development server:
   ```bash
   php -S localhost:8000 -t public
   ```

### Frontend Setup

1. Open `index.html` in a web browser
2. Or serve the frontend directory using any web server

## Deployment

For production deployment, please refer to the detailed instructions in:
- [Backend Deployment Instructions](backend/DEPLOYMENT.md)

## Requirements

- PHP 7.4 or higher
- MySQL or MariaDB
- Composer for PHP dependency management
- Modern web browser for frontend

## API Documentation

For detailed API endpoints and usage, see [Backend README](backend/README.md).

## License

This project is proprietary to Camairco.
