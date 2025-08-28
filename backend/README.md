# Backend Annuaire

- Login via **matricule + mot de passe** (JWT)
- **Admin seulement** peut créer des utilisateurs (mot de passe optionnel -> compte inactif tant qu'absent)
- **Logout** via blacklist de tokens
- Recherche par **poste**, **statut** (employé, stagiaire, A.S), **departement**, **service**, **ville** (+ `q`)

## Installation

For development:

```bash
cd backend
composer install
mysql -u root -p < sql/annuaire.sql
php -S localhost:8000 -t public
```

For production deployment, please refer to the detailed [Deployment Instructions](DEPLOYMENT.md).

## Configuration

The application uses environment variables for configuration. Please set the following variables:

- `DB_HOST` - Database host (default: localhost)
- `DB_PORT` - Database port (default: 3306)
- `DB_NAME` - Database name (default: annuaire)
- `DB_USER` - Database user (default: root)
- `DB_PASS` - Database password (default: empty)
- `JWT_SECRET` - Secret key for JWT tokens (default: change_this_to_a_strong_secret)
- `CORS_ALLOWED` - Comma-separated list of allowed origins for CORS (default: http://192.168.0.191)

## Endpoints

- `POST /api/login` — `{ "matricule": "...", "password": "..." }`
- `POST /api/logout` — header `Authorization: Bearer <token>`
- `GET /api/me` — voir son propre profil
- `POST /api/personnel` (**admin only**) — créer un utilisateur (mot de passe facultatif)
- `GET /api/personnel?poste=&statut=&departement=&service=&ville=&q=&limit=&offset=`

Notes:
- Un utilisateur sans `motdepasse` ne peut pas se connecter.
- `isadmin=1` requis dans le JWT pour créer un utilisateur.


