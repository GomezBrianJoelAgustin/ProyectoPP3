<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>Add commentMore actions

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development/)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

# Road Machinery Management System

A system designed for road construction companies to efficiently manage their machinery.

## Objective

To develop a system that enables a road construction company to:

1.  **Track machinery in real-time**: Monitor the current location (job site and province) of each machine.
2.  **Manage assignments**: Maintain strict control over dates and mileage for each assignment.
3.  **Generate historical data**: Create comprehensive records for maintenance tracking and productivity analysis.

---

## Key Technologies

This project is built with:

* **Laravel**: The powerful PHP framework for the backend.
* **Laravel Breeze**: Provides robust authentication scaffolding (registration, login, password reset).
* **Alpine.js**: For lightweight and reactive frontend interactivity.
* **Tailwind CSS**: For utility-first CSS styling (often included with Breeze).
* **Laravel Herd**: Recommended local development environment (Nginx, PHP, MySQL/PostgreSQL).
* **(Optional: Mention Livewire if you chose that stack with Breeze)**
* **(Optional: Mention any other significant libraries or frameworks you use)**

---

## Getting Started

Follow these steps to set up the project locally.

1.  **Ensure you have [Laravel Herd](https://herd.laravel.com/) installed and running.**
2.  **Clone the repository:**
    ```bash
    git clone [https://github.com/GomezBrianJoelAgustin/ProyectoPP3.git](https://github.com/GomezBrianJoelAgustin/ProyectoPP3.git)
    cd ProyectoPP3
    ```
3.  **Install PHP dependencies:**
    ```bash
    composer install
    ```
4.  **Install Node.js dependencies:**
    ```bash
    npm install
    ```
5.  **Generate application key:**
    ```bash
    php artisan key:generate
    ```
6.  **Configure your .env file:**
    Copy `.env.example` to `.env` and configure your database settings.

    ```bash
    cp .env.example .env
    ```
    Then, update the `DB_CONNECTION`, `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD` variables.

7.  **Run database migrations:**
    ```bash
    php artisan migrate
    ```
8.  **Run database seeders (if applicable):**
    ```bash
    php artisan db:seed
    ```
9.  **Link the project with Herd and serve (optional, but recommended for Herd users):**
    ```bash
    herd link
    herd serve
    ```
    Alternatively, you can use Laravel's built-in server:
    ```bash
    npm run dev # To compile frontend assets and watch for changes
    php artisan serve
    ```

---

## Email Configuration (Gmail SMTP)

To enable email sending via Gmail (e.g., for password resets, notifications):

Update your `.env` file with the following:

```dotenv
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME="your_gmail_address@gmail.com"
MAIL_PASSWORD="your_gmail_app_password" # Crucial: Use an App Password!
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="your_gmail_address@gmail.com"
MAIL_FROM_NAME="${APP_NAME}"
