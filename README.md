Podcast Platform API
A RESTful API for a podcast platform built with Laravel, MySQL, and Docker. This project supports the backend for a podcast platform with features like podcast listing, category filtering, and episode details.
Requirements

Docker
Docker Compose
Git

Setup Instructions

Clone the Repository
git clone https://github.com/mayor167/podcast-api
cd podcast_api


Copy Environment File
cp .env.example .env


Start Docker Containers
docker-compose up -d


Install Dependencies
docker-compose exec app composer install


Generate Application Key
docker-compose exec app php artisan key:generate


Run Migrations and Seeders
docker-compose exec app php artisan migrate --seed


Access the API

API: http://localhost:8000/api
Swagger Documentation: http://localhost:8080



API Endpoints

GET /api/podcasts - List podcasts (supports pagination, sorting, filtering by category)
GET /api/podcasts/{id} - Get podcast details
GET /api/categories - List categories
GET /api/categories/{id} - Get category details
GET /api/episodes/{id} - Get episode details

API Documentation
Swagger UI is available at http://localhost:8080 when the containers are running.
Project Structure

app/Models - Eloquent models for Category, Podcast, Episode
app/Http/Controllers/Api - API controllers
app/Http/Resources - API resource classes for response formatting
app/Http/Requests - Form request validation
database/migrations - Database schema migrations
database/seeders - Database seeders for sample data
routes/api.php - API routes
openapi.yaml - Swagger API documentation

Notes

The API uses Laravel 10 and PHP 8.2.
MySQL is used for the database with foreign key constraints.
Pagination is set to 10 items per page.
Sorting and filtering are supported on the podcasts endpoint.

