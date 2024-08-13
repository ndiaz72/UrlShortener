URL Shortener Application
A simple URL shortener application built with Laravel.

Table of Contents
Prerequisites
Installation
Configuration
Running the Application
Database Migration and Seeding
Deployment
License
Prerequisites
PHP: 8.0 or higher
Composer: PHP dependency manager
MySQL or another supported database
Installation
Clone the Repository

bash
Copiar código
git clone https://github.com/ndiaz72/UrlShortener.git
cd your-repository
Install PHP Dependencies

bash
Copiar código
composer install
Install JavaScript Dependencies (if any)

bash
Copiar código
npm install
Configuration
Copy and Edit the Environment File

bash
Copiar código
cp .env.example .env
Update the .env file with your database and application settings.

Generate Application Key

bash
Copiar código
php artisan key:generate
Database Migration and Seeding
Run Migrations

To create the necessary database tables:

bash
Copiar código
php artisan migrate

Run the Seeder

To populate the database with the sample data:

bash
Copiar código
php artisan db:seed --class=UrlSeeder
Deployment
Upload Files to Your Server

Install Dependencies on the Server

bash
Copiar código
composer install --no-dev
Run Migrations

bash
Copiar código
php artisan migrate --force
Seed the Database

bash
Copiar código
php artisan db:seed --class=UrlSeeder
Set Up Environment Variables

Update the .env file on your server with production settings.


Running the Application
Start the Laravel Development Server

bash
Copiar código
php artisan serve
Your application will be available at http://localhost:8000.

License
This project is licensed under the MIT License. See the LICENSE file for details.

Summary
Prerequisites: Lists required software.
Installation: Steps to set up the project.
Configuration: How to configure the environment.
Running the Application: How to start the local server.
Database Migration and Seeding: Instructions for running migrations and seeding data.
Deployment: Basic steps for deploying the application.
This README provides a straightforward guide to getting your Laravel application up and running, including setup and deployment steps.