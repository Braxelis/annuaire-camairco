# Deployment Instructions

This document provides instructions for deploying the Annuaire Camairco application on a private Linux server.

## Prerequisites

1. Linux server with PHP 7.4 or higher
2. MySQL or MariaDB database server
3. Composer for PHP dependency management
4. Apache or Nginx web server

## Server Requirements

- PHP 7.4 or higher
- MySQL 5.7 or MariaDB 10.4 or higher
- Apache 2.4 or Nginx with mod_rewrite enabled
- Composer 2.0 or higher

## Installation Steps

### 1. Clone the Repository

```bash
git clone <repository-url>
cd annuaire-camairco
```

### 2. Set Up the Database

1. Create a new database:
   ```sql
   CREATE DATABASE annuaire CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
   ```

2. Import the database schema:
   ```bash
   mysql -u [username] -p annuaire < backend/sql/annuaire.sql
   ```

### 3. Configure Environment Variables

Set the following environment variables on your server:

```bash
# Database configuration
export DB_HOST="localhost"           # Your database host
export DB_PORT="3306"                # Your database port
export DB_NAME="annuaire"            # Your database name
export DB_USER="your_db_user"        # Your database user
export DB_PASS="your_db_password"    # Your database password

# JWT configuration
export JWT_SECRET="your_jwt_secret"  # Strong secret for JWT tokens

# CORS configuration
export CORS_ALLOWED="http://yourdomain.com,https://yourdomain.com"  # Allowed origins for CORS
```

Alternatively, you can set these in your web server configuration or a `.env` file if your server supports it.

### 4. Install PHP Dependencies

Navigate to the backend directory and install dependencies using Composer:

```bash
cd backend
composer install --no-dev --optimize-autoloader
```

### 5. Configure Web Server

#### Apache Configuration

Ensure your virtual host points to the `backend/public` directory:

```apache
<VirtualHost *:80>
    ServerName yourdomain.com
    DocumentRoot /path/to/annuaire-camairco/backend/public

    <Directory /path/to/annuaire-camairco/backend/public>
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

Make sure `mod_rewrite` is enabled for URL rewriting.

#### Nginx Configuration

```nginx
server {
    listen 80;
    server_name yourdomain.com;
    root /path/to/annuaire-camairco/backend/public;

    index index.php;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php7.4-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }
}
```

### 6. Set File Permissions

Ensure the web server has write permissions to the following directories (if they exist):
- `backend/storage` (if used for logs or cache)

```bash
# Example for setting permissions (adjust as needed)
sudo chown -R www-data:www-data backend/
sudo chmod -R 755 backend/
```

### 7. Test the Installation

1. Access the API endpoints to verify the installation:
   - `http://yourdomain.com/api/personnel` (should return personnel data)
   - `http://yourdomain.com/api/auth/login` (authentication endpoint)

2. Check that the frontend files in `frontend/public` can access the backend API.

## Troubleshooting

1. If you encounter database connection errors, verify your database credentials and ensure the database server is running.

2. If API endpoints return 404 errors, check your web server configuration and ensure mod_rewrite is enabled.

3. If you get permission errors, verify that the web server has the necessary permissions to read the application files.

4. For JWT-related issues, ensure your JWT_SECRET is properly set and is sufficiently complex.

## Additional Notes

- The application uses environment variables for configuration. Make sure all required variables are set.
- The database schema can be found in `backend/sql/annuaire.sql`.
- For production environments, consider using HTTPS and additional security measures.
