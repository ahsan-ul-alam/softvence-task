# 🎓 Laravel Course Management System

A clean and user-friendly **Course Management System** built using **Laravel**. This application allows instructors or admins to manage course information — including creation, editing, viewing, and deleting courses — all within a secured dashboard.

---

## 📌 Features

- 🔐 Secure authentication system (Laravel Breeze)
- 📋 Dashboard for managing courses
- ✍️ Add, edit, delete course details
- 🧾 Fields include: title, duration, and level
- ✅ Validation and error handling
- 🎨 Beautiful UI with Tailwind CSS (via Laravel Breeze or Jetstream)
- 📱 Responsive design

---

## 🚀 Technologies Used

- ⚙️ Laravel 11+
- 💾 MySQL
- 🎨 Tailwind CSS
- 🧰 Laravel Breeze 
- 🗃️ Blade Templating

---

## 🛠️ Installation Steps

1. **Clone the repository**

   ```bash
   git clone https://github.com/yourusername/laravel-course-management.git
   cd laravel-course-management
   ```
   ```bash
   composer install
   npm install && npm run dev
   ```
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

Update .env file with database credentials:

DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password

```bash
php artisan migrate
```

```bash
php artisan serve
```

#Thank You

