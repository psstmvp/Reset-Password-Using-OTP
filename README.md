Here's the README without the PHPMailer installation step:

---

# User Authentication System

This project is a basic user authentication system with login, password reset, and OTP (One-Time Password) validation functionalities. It supports multiple user roles such as Admin, User, Seller, Botanist, and Delivery Agent.

## Table of Contents

1. [Project Structure](#project-structure)
2. [Prerequisites](#prerequisites)
3. [Configuration](#configuration)
4. [How It Works](#how-it-works)
    - [Login](#login)
    - [Forgot Password](#forgot-password)
    - [OTP Validation](#otp-validation)
    - [Password Reset](#password-reset)
5. [Session Management](#session-management)
6. [License](#license)

## Project Structure

```
/UserAuthenticationSystem
│
├── Admin
│   └── Homepage.php
├── User
│   └── Homepage.php
├── Seller
│   └── Homepage.php
├── Botanist
│   └── Homepage.php
├── DeliveryAgent
│   └── Homepage.php
├── Assets
│   ├── Connection
│   │   └── Connection.php
│   ├── phpMail
│       └── src
│           ├── PHPMailer.php
│           ├── SMTP.php
│           └── Exception.php
├── Login.php
├── ForgetPassword.php
├── OTP_Validator.php
├── ResetPassword.php
└── Logout.php
```

## Prerequisites

- PHP 7.x or higher
- MySQL Database

## Configuration

1. **Database Connection:**

   Update the database connection details in `Assets/Connection/Connection.php`:

   ```php
   <?php
   $Con = new mysqli("your_host", "your_username", "your_password", "your_database");
   if ($Con->connect_error) {
       die("Connection failed: " . $Con->connect_error);
   }
   ?>
   ```

2. **PHPMailer Configuration:**

   Update the email credentials in `ForgetPassword.php`:

   ```php
   $mail->Username = 'yourmailid@gmail.com'; // Your Gmail ID
   $mail->Password = 'YOUR_APP_PASSWORD'; // Your Gmail App Password
   ```

   Ensure that you replace these placeholders with your actual email credentials.

## How It Works

### Login

- **File:** `Login.php`
- **Description:** Authenticates users based on their email and password. Depending on the user role, it redirects to the respective homepage.

### Forgot Password

- **File:** `ForgetPassword.php`
- **Description:** Allows users to reset their password by entering their registered email. An OTP is sent to their email for verification.

### OTP Validation

- **File:** `OTP_Validator.php`
- **Description:** Validates the OTP sent to the user's email. If the OTP is correct, the user is redirected to reset their password.

### Password Reset

- **File:** `ResetPassword.php`
- **Description:** Allows users to set a new password after OTP validation. The password is updated in the database.

## Session Management

- **Session Start:** Sessions are started at the beginning of each PHP file using `session_start()`.
- **Session Variables:** User-specific information like user ID, name, and role are stored in session variables upon successful login.
- **Logout:** The `Logout.php` script destroys the session and redirects the user to the login page.

---