# NativePHP Inventory and Sales Management System

This is a desktop application built with Laravel and NativePHP. It provides a simple interface to manage products, categories, and sales, with features for reporting and low-stock notifications.

## About The Project

This application serves as a proof-of-concept for building native desktop applications using the TALL stack (Tailwind CSS, Alpine.js, Laravel, Livewire) and NativePHP. It's a simple inventory system designed to be run locally on a user's machine.

### Features

*   **Product Management:** Create, Read, Update, and Delete products.
*   **Category Management:** Organize products into categories.
*   **Sales Tracking:** Record new sales and view sales history.
*   **Reporting:** Generate sales reports and export them to PDF.
*   **Low Stock Alerts:** A scheduled command checks for products with low stock.
*   **User Authentication:** Secure login and registration for users.

## Technologies Used

*   **Backend:** Laravel, PHP
*   **Desktop App Framework:** NativePHP
*   **Frontend:** Blade, Tailwind CSS, Livewire, Alpine.js
*   **Database:** SQLite
*   **Build Tools:** Vite, NPM
*   **Testing:** Pest/PHPUnit

## Prerequisites

Before you begin, ensure you have the following installed on your system:

*   PHP (>= 8.2)
*   Composer
*   Node.js & NPM

## Installation and Setup

Follow these steps to get the application up and running on your local machine.

1.  **Clone the repository:**
    ```bash
    git clone https://github.com/your-username/your-repository.git
    cd your-repository
    ```

2.  **Install PHP dependencies:**
    ```bash
    composer install
    ```

3.  **Install JavaScript dependencies:**
    ```bash
    npm install
    ```

4.  **Create your environment file:**
    ```bash
    cp .env.example .env
    ```

5.  **Generate an application key:**
    ```bash
    php artisan key:generate
    ```

6.  **Set up the database:**
    The application uses SQLite by default. The database files (`database.sqlite` and `nativephp.sqlite`) are included in the repository. To run the migrations, use the following command:
    ```bash
    php artisan migrate
    ```

7.  **Seed the database (Optional):**
    To populate the database with some initial data, you can run the seeder:
    ```bash
    php artisan db:seed
    ```

## Running the Application

There are two ways to run the application:

### 1. As a Web Application (for development)

This is useful for quick development and testing of the UI.

```bash
# Start the Vite development server
npm run dev

# Start the Laravel development server
php artisan serve
```

You can then access the application in your web browser at `http://127.0.0.1:8000`.

### 2. As a Native Desktop Application

This will launch the application as a standalone desktop app.

```bash
php artisan native:serve
```

## Building the Application

To build a distributable, native application for your operating system, run the following command:

```bash
php artisan native:build
```

The build artifacts will be placed in the `dist` directory.

## Running Tests

To run the automated test suite, use the following command:

```bash
php artisan test
```

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
