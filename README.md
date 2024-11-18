<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Student Management System

Laravel-based web application designed to efficiently manage the student records. This application provides a user-friendly interface for tasks such as adding new students, viewing a list of students, editing student information, and deleting student records. Additionally, the system includes user registration and authentication features to ensure secure access.

## Features

### User Authentication

- Register an account to access the Student Management System.
- Sign in to manage students and your account.

### Student Management

- Add new students to your database.
- View a list of all added students.
- Edit or modify existing student information.
- Delete students from your records.

## Technologies Used

- **Laravel :** The PHP framework used for backend development.
- **Vue.js :** Frontend development powered by Vue 3.
- **Inertia.js :** A library for building modern single-page applications (SPAs) with server-side rendering.
- **Tailwind CSS :** A utility-first CSS framework for building responsive and stylish interfaces.
- **Breeze :** A minimalistic, highly customizable Laravel starter kit.

<details>
  <summary style="font-size: 18px; font-weight: bold;">Student Management Screenshots</summary>
  
### List of students

  ![List of students](Screenshots/students.png)

### Student Statistics

  ![Student Statistics](Screenshots/dashboard.png)

### Add New Student

  ![Add New Student](Screenshots/create.png)

### Update Student Details

  ![Update Student Details](Screenshots/update.png)

### User Profile

  ![User Profile](Screenshots/profile.png)

### Home Page

  ![Home Page](Screenshots/home.png)

### Login Page

  ![Login Page](Screenshots/login.png)

### Registration Page

  ![Registration Page](Screenshots/register.png)

### Forgot Password Page

  ![Forgot Password Page](Screenshots/forgotPassword.png)

</details>

## Getting Started

### Prerequisites

- PHP 8.1
- Composer
- Node.js
- NPM 

### Installation

#### 1. Clone the repository

```
git clone https://github.com/Radser2001/Laravel-Student-Management-System.git
```

#### 2. Install dependencies

```
composer install
npm install
```

#### 3. Set up the environment

- Duplicate the .env.example file and rename it to .env.
- Generate the application key:

```
php artisan key:generate
```

#### 4. Migrate the database

```
php artisan migrate
```

#### 5. Compile front-end assets

```
npm run dev
```

#### 6. Start the development server

```
php artisan serve
```

#### Visit <http://localhost:8000> in your browser

### Usage

- Create a new account or sign in with existing credentials.
- Navigate to the "Students" section to manage student records.
- Use the provided features to add, view, edit, and delete student information.
