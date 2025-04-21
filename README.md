Podcast Platform API
A RESTful API built with Laravel, Docker, MySQL, and Swagger for the Junior Backend Technical Assessment. The API provides endpoints to retrieve podcasts, categories, and episodes, with Swagger documentation for interactive testing.
Project Overview

Technology Stack: Laravel 11, Docker, MySQL 8.0, Swagger (L5-Swagger)
Database: MySQL (podcast database) with pre-seeded data:
10 categories
30 podcasts
150 episodes


Endpoints: See the table below for available API endpoints.
Documentation: Swagger UI at http://localhost:8080

API Endpoints
The following endpoints are available for interacting with the API:



Endpoint
Method
Description
Example URL



/api/podcasts
GET
Get all podcasts
http://localhost:8000/api/podcasts


/api/podcasts/{podcast}
GET
Get a single podcast by ID
http://localhost:8000/api/podcasts/1


/api/categories
GET
Get all categories
http://localhost:8000/api/categories


/api/categories/{category}
GET
Get a single category by ID
http://localhost:8000/api/categories/1


/api/episodes/{episode}
GET
Get a single episode by ID
http://localhost:8000/api/episodes/1


Prerequisites

Docker and Docker Compose (Docker Desktop on Windows/Mac, Docker on Linux)
Git
Internet connection (for Composer dependencies)

Setup Instructions
Follow these steps to set up and run the project locally.

Clone the Repository:
git clone https://github.com/mayor167/podcast_api
cd podcast_api


Set Up Environment:

Copy .env.example to .env:cp .env.example .env


Verify .env settings:APP_NAME="Podcast API"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=podcast
DB_USERNAME=root
DB_PASSWORD=secret

CACHE_DRIVER=file


Generate application key:docker-compose exec app php artisan key:generate




Install Dependencies:
docker-compose exec app composer install


Run Docker:
docker-compose up -d --build

This starts:

Laravel app (http://localhost:8000)
MySQL database (port 3306)
Swagger UI (http://localhost:8080)


Run Migrations and Seed:
docker-compose exec app php artisan migrate --no-interaction
docker-compose exec app php artisan db:seed --no-interaction

This creates the database schema and seeds it with 10 categories, 30 podcasts, and 150 episodes.

Generate Swagger Documentation:
docker-compose exec app php artisan l5-swagger:generate


Access the API:

Endpoints: Test using the URLs in the table above (e.g., http://localhost:8000/api/podcasts).
Swagger UI: Open http://localhost:8080 in a browser for interactive documentation.



Testing
Test Endpoints:Use curl, Postman, or a browser to test endpoints. Example:

Endpoints                      Method                      Description                          Example

/api/podcasts                   GET                        Get all podcasts                 http://localhost:8000/api/podcasts


/api/podcasts/{podcast}         GET                       Get a single podcast by ID         http://localhost:8000/api/podcasts/1


/api/categories                  GET                        Get all categories               http://localhost:8000/api/categories


/api/categories/{category}       GET                        Get a single category by ID      http://localhost:8000/api/categories/1


/api/episodes/{episode}          GET                        Get a single episode by ID       http://localhost:8000/api/episodes/1



Expected response:
[
  {
    "id": 1,
    "title": "Sample Podcast",
    "description": "...",
    ...
  },
  ...
]


Swagger UI:Navigate to http://localhost:8080 to interact with the API via Swagger’s interface.

Database Verification:Check the seeded data:
docker-compose exec db mysql -uroot -psecret -e "USE podcast; SELECT COUNT(*) FROM podcasts;"

Expected: ~ 15 podcasts.


Notes

The project is containerized with Docker, ensuring consistent setup across environments.
If Swagger UI fails, refer to api-docs/api-docs.json or openapi.yaml in the repository for manual documentation.
For Windows users, run commands in Git Bash or Command Prompt with Docker Desktop running.
Contact me @ adenijimayokun@gmail.com  for setup assistance.

Troubleshooting

Cache Issues:
docker-compose exec app php artisan cache:clear
docker-compose exec app php artisan config:clear
docker-compose exec app php artisan route:clear
docker-compose exec app php artisan optimize:clear


Permission Issues:
docker-compose exec app chown -R www-data:www-data /var/www/html
docker-compose exec app chmod -R 775 /var/www/html


Swagger Errors:
docker-compose exec app composer require darkaonline/l5-swagger
docker-compose exec app php artisan vendor:publish --provider "L5Swagger\L5SwaggerServiceProvider"
docker-compose exec app php artisan l5-swagger:generate


Database Connection Errors:Verify MySQL is running:
docker ps

Check .env settings and restart:
docker-compose restart



Submission Details
This project is submitted for the Junior Backend Technical Assessment. The GitHub repository contains all source code, Docker configurations, and documentation. Please test the API at http://localhost:8000 and Swagger UI at http://localhost:8080 after setup.
Thank you for reviewing my work!
Adeniji Oyeyemi Mayokun
adenijimayokun@gmail.com
