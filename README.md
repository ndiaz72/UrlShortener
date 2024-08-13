# URL Shortener Application

This repository contains a URL shortener application built with Laravel and React.js. The application allows users to shorten long URLs and manage them easily.

## Table of Contents

1. [Prerequisites](#prerequisites)
2. [Installation](#installation)
3. [Configuration](#configuration)
4. [Running the Application](#running-the-application)
5. [Running Tests](#running-tests)
6. [Deployment](#deployment)
7. [CI/CD](#cicd)
8. [License](#license)

## Prerequisites

Before you begin, ensure you have met the following requirements:

- **PHP**: 8.0 or higher
- **Composer**: Dependency Manager for PHP
- **Node.js**: 14.x or higher
- **NPM**: Node Package Manager
- **MySQL**: Version 5.7 or higher (or another supported database)
- **Git**: Version control system

## Installation

### Clone the Repository

```bash
git clone https://github.com/ndiaz72/UrlShortener
cd your-repository
```

### Install PHP Dependencies

```bash
composer install
```

### Install JavaScript Dependencies
```bash
npm install
```

### Configuration
Environment File
Create a copy of the .env.example file and name it .env. Update the environment variables

# Generate the application key:

```bash
php artisan key:generate
```

# Database Migration
Run the database migrations:

```bash
php artisan migrate
```

## Running the Application
Local Development
Start the Laravel Development Server

```bash
php artisan serve
```
