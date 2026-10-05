# Tech Fest Awareness

This project is a small PHP-based event registration system for a Tech Fest activity. It includes a public registration form for participants, backend handling for saving submissions to a MySQL database, and an admin dashboard for viewing and clearing registrations.

## Features

- Participant registration form for the Tech Fest lucky draw
- Server-side validation for required fields and email format
- MySQL database integration
- Admin login and dashboard
- Ability to view all registered users and delete all records

## Project structure

```text
techfest/
├── techfest_awareness/
│   ├── admin/
│   │   ├── dashboard.css
│   │   ├── dashboard.html
│   │   ├── dashboard.js
│   │   ├── admin.css
│   │   └── index.html
│   ├── admin_api/
│   │   ├── delete_all.php
│   │   ├── login.php
│   │   └── logout.php
│   ├── api/
│   │   ├── get_users.php
│   │   └── register.php
│   ├── config/
│   │   └── db.php
│   ├── index.html
│   ├── script.js
│   └── style.css
├── DataTravel.png
├── password_hashing.png
├── phishing.png
└── README.md
```

## Prerequisites

- PHP 7.4 or newer
- MySQL or MariaDB
- A local web server such as XAMPP, WAMP, or the built-in PHP server

## Database setup

Create a database named `techfest` and a `registrations` table.

```sql
CREATE DATABASE techfest;
USE techfest;

CREATE TABLE registrations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    mobile VARCHAR(50) NOT NULL,
    place VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

Then update the database configuration in `techfest_awareness/config/db.php` if needed:

```php
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "techfest";
```

## Running the project

From the project root, start a local PHP server:

```bash
php -S localhost:8000
```

Open the public page in a browser:

```text
http://localhost:8000/techfest_awareness/index.html
```

## Admin panel

The admin interface is available at:

```text
http://localhost:8000/techfest_awareness/admin/index.html
```

Default admin credentials used by the app:

- Username: `admin`
- Password: `admin`

These values are defined in `techfest_awareness/admin_api/login.php` and should be changed in production.

## Notes

This project is intended for a local demo or educational setup. Before deploying it publicly, consider implementing stronger security measures such as:

- hashed and secure admin credentials
- environment-based database configuration
- CSRF protection
- input sanitization and validation beyond the current checks
- HTTPS in deployment environments

## Summary

This repository contains a simple event-registration web application for a Tech Fest awareness campaign. It is easy to run locally and is suitable for demonstration or learning purposes.
