# Mini CRM

A streamlined Customer Relationship Management (CRM) application for managing companies, contacts, and their interactions. Built with a focus on simplicity, speed, and a modern user experience.

## 🚀 Features

- **Company Management**: Keep track of organizations.
- **Contact Management**: Manage people associated with companies.
- **Interaction Tracking**: Record logs of meetings, calls, and emails.
- **Clean Interface**: Responsive design built with Tailwind CSS and Blade components.
- **Modern Stack**: Leverages Laravel 12, Livewire 4, and **Volt** for a smooth, reactive, single-file component architecture.

## 🛠️ Tech Stack

- **Framework**: [Laravel 12](https://laravel.com)
- **Frontend**: [Livewire](https://livewire.laravel.com), [Tailwind CSS](https://tailwindcss.com), [Alpine.js](https://alpinejs.dev)
- **Language**: PHP 8.2+
- **Database**: SQLite (default, easily configurable to MySQL/PostgreSQL)

## 💻 Getting Started

Follow these steps to get the project running locally.

### Prerequisites

Ensure you have the following installed:
- **PHP 8.2+**
- **Composer**
- **Node.js & NPM**
- **SQLite** (or your preferred database)

### Installation & Setup

1. **Clone the repository**
   ```bash
   git clone https://github.com/nabil/mini-crm.git
   cd mini-crm
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install & build frontend assets**
   ```bash
   npm install
   npm run build
   ```

4. **Environment configuration**
   ```bash
   cp .env.example .env
   ```
   *Note: By default, the app uses SQLite. Ensure `DB_CONNECTION=sqlite` is set in your `.env`.*

5. **Generate Application Key**
   ```bash
   php artisan key:generate
   ```

6. **Initialize the database**
   ```bash
   # Creates the database file and runs migrations with seed data
   touch database/database.sqlite
   php artisan migrate --seed
   ```

### Running the Application

1. **Start the local development server**
   ```bash
   php artisan serve
   ```

2. **Access the website**
   Open your browser and navigate to: `http://127.0.0.1:8000`

## 🧪 Running Tests

Verify the application's integrity by running the test suite:
```bash
php artisan test
```

## 📝 Credentials for Testing

If you ran the seeders (`--seed`), you can log in with:
- **Email**: `test@example.com`
- **Password**: `password`
