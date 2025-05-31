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
8.  **Link the project with Herd and serve (optional, but recommended for Herd users):**
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
