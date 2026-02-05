# Product Management Application – Laravel

A CRUD (Create, Read, Update, Delete) application for product management with status and category filtering features, built using Laravel, Bootstrap, and PostgreSQL.

## Features

- CRUD Products (Create, Read, Update, Delete)
- Smart Filters by product status (sellable / not sellable) and category
- Statistics Dashboard for products and categories
- Responsive design for desktop and mobile
- Real-time filtering without page reload
- Interactive notifications using SweetAlert2
- Data tables with sorting and pagination using DataTables

## Technology Stack

- Backend: Laravel 10.x
- Database: PostgreSQL
- Frontend: Bootstrap 5, DataTables, SweetAlert2
- Server: PHP 8.1+, Nginx or Apache

## Installation and Setup

### Prerequisites

- PHP 8.1 or higher
- Composer
- PostgreSQL

### Step 1: Clone Repository

```bash
git clone https://github.com/username/product-management-app.git
cd product-management-app
```

### Step 2: Install Dependencies

```bash
composer install
```

### Step 3: Environment Configuration

Copy .env.example to .env:

```bash
cp .env.example .env
```

Edit .env and configure your database:

```bash
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=database_name
DB_USERNAME=username
DB_PASSWORD=password
```

### Step 4: Generate Application Key

```bash
php artisan key:generate
```

### Step 5: Database Setup

1. Create the PostgreSQL database:

```bash
CREATE DATABASE database_name;
```

2. Run migrations and seeders:

```bash
php artisan migrate --seed

```

### Step 6: Run Development Server

```bash
php artisan serve
```

Access app at:

```bash
http://localhost:8000
```

## Application Pages

### Dashboard

1. Total products, Sellable products, Non-sellable products, Total categories

### Produk:

1. Filter by status, Filter by category, Product search, Pagination, Column sorting

2. Basic CRUD

3. CORS Middleware

4. Input Validation

5. Server-side validation

6. Client-side HTML5 validation

7. SQL Injection protection

8. CSRF protection

## Screenshots Demo

### Dashboard

| Desktop                                                       | Mobile                                                     |
| ------------------------------------------------------------- | ---------------------------------------------------------- |
| ![Dashboard Desktop](screenshoots-demo/dashboard-desktop.png) | ![Dashboard Mobile](screenshoots-demo/dashboard-phone.png) |

### Product List

| Desktop                                                  | Mobile                                                |
| -------------------------------------------------------- | ----------------------------------------------------- |
| ![Product Desktop](screenshoots-demo/produk-desktop.png) | ![Product Mobile](screenshoots-demo/produk-phone.png) |

### Add New Product

| Desktop                                                          | Mobile                                                        |
| ---------------------------------------------------------------- | ------------------------------------------------------------- |
| ![Add Product Desktop](screenshoots-demo/new-produk-desktop.png) | ![Add Product Mobile](screenshoots-demo/new-produk-phone.png) |

### Update Product

| Desktop                                                                | Mobile                                                              |
| ---------------------------------------------------------------------- | ------------------------------------------------------------------- |
| ![Update Product Desktop](screenshoots-demo/update-produk-desktop.png) | ![Update Product Mobile](screenshoots-demo/update-produk-phone.png) |

### Delete Confirmation

| Desktop                                                             | Mobile                                                           |
| ------------------------------------------------------------------- | ---------------------------------------------------------------- |
| ![Delete Alert Desktop](screenshoots-demo/delete-alert-desktop.png) | ![Delete Alert Mobile](screenshoots-demo/delete-alert-phone.png) |
