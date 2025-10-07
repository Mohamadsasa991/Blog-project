# 📰 Laravel Blog Project
A simple yet powerful **Blog Application** built with **Laravel** and **Blade**. This project includes full CRUD functionality for **Posts**, **Users**, and **Tags**, along with complete **Authentication** and **Authorization** using Laravel's built-in features.

## 🚀 Features
- 🔐 User Authentication (login, register, logout)
- 🧩 Role-based Authorization (Admin, Author, Reader)
- 📝 Full CRUD for Posts, Users, and Tags
- 🎨 Clean and responsive Blade templates
- 🛡️ Protection against XSS and CSRF attacks
- ⚙️ Eloquent ORM with model relationships
- 📁 RESTful routes and organized controllers

## 🧱 Requirements
- PHP >= 8.1  
- Composer  
- MySQL or SQLite  
- Node.js & NPM  
- Laravel 10 or later

## ⚙️ Installation & Setup
```bash
# 1️⃣ Clone the repository
git clone https://github.com/yourusername/laravel-crm.git

# 2️⃣ Navigate into the project folder
cd laravel-crm

# 3️⃣ Install dependencies
composer install
npm install && npm run dev

# 4️⃣ Copy example environment file
cp .env.example .env

# 5️⃣ Generate application key
php artisan key:generate

# 6️⃣ Update your database credentials in `.env`
# DB_DATABASE=your_database_name
# DB_USERNAME=your_db_user
# DB_PASSWORD=your_db_password

# 7️⃣ Run migrations and seeders
php artisan migrate --seed

# 8️⃣ Start local development server
php artisan serve
---------------------------------------------

🧑‍💻 Developer

Mohamad Alsasa
Back-End Developer
