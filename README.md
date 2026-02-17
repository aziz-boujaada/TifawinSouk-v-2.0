# 🛒 TifawinSouk v2.0

TifawinSouk is a full-stack **Laravel e-commerce web application** designed to manage products, categories and orders with a secure authentication system and an admin dashboard.

This project was built as a practical Laravel application to demonstrate backend and frontend skills, database relationships, and real-world application structure.

---

## 📌 Project Overview

TifawinSouk allows:
- Users to browse products and place orders
- Admins to manage products, categories, and orders through a dashboard

The application focuses on clean Laravel architecture, role-based access, and CRUD operations.

---

## 🚀 Features

### 🔐 Authentication & Authorization
- User registration & login
- Secure authentication system
- Role-based access (Admin / User)
- Protected admin routes using middleware

### 🛍 Product Management
- Create, read, update, and delete products
- Product categorization
- Image upload for products
- Product listing with pagination

### 📂 Category Management
- Full CRUD for categories
- Relationship between products and categories

### 📦 Orders Management
- Users can place orders
- Admin can view and manage orders
- Order status management

### 📊 Admin Dashboard
- Manage users
- Manage products and categories
- Manage orders
- Clean and simple dashboard interface

---

## 🧱 Technical Stack

### Backend
- **PHP**
- **Laravel**
- Eloquent ORM
- MVC Architecture

### Frontend
- Blade Templates
- HTML5 / CSS3
- Tailwind CSS

### Database
- MySQL
- Migrations & Seeders
- Relationships 

### Tools
- Git & GitHub
- Composer
- NPM
- JIRA

---



## ⚙️ Installation & Setup

### 1️⃣ Clone the repository
```bash
git clone https://github.com/aziz-boujaada/TifawinSouk-v-2.0.git
cd TifawinSouk-v-2.0
```

---

### Install dependencies
```
composer install
npm install
npm run dev

```
### Environment configuration
```
php artisan key:generate
```

### Configure your database in .env
```
DB_DATABASE=your_database
DB_USERNAME=root
DB_PASSWORD= your_password
```
### Run migrations
```
php artisan migrate
```

### Start the server
```
php artisan serve
-> Visit : http://127.0.0.1:8000
```



