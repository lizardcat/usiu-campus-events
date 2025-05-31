# USIU Campus Events Platform

This is a dynamic web application built for student clubs and departments at USIU-Africa to create, manage, and display campus events. It allows students to register for events, leave comments, and receive confirmation emails upon registration.

## Tech Stack

* **Frontend**: HTML, CSS (Bootstrap), JavaScript (Fetch API, AJAX)
* **Backend**: PHP
* **Database**: MySQL
* **Mailer**: PHPMailer (SMTP)
* **Server Environment**: XAMPP

## Features

* User registration and login
* Event creation by clubs
* Event listing and detail view
* Student registration for events
* Commenting system
* Confirmation emails after event registration
* Responsive UI with USIU branding

## Folder Structure

```
usiu-campus-events/
├── api/
│   ├── create_event.php
│   ├── register_user.php
│   ├── login_user.php
│   ├── register_event.php
│   ├── post_comment.php
│   └── utils/
│       └── db.php
├── assets/
│   ├── css/
│   │   └── style.css
│   ├── img/
│   │   └── usiu-logo.png
├── includes/
│   ├── header.php
│   ├── navbar.php
│   ├── footer.php
│   └── auth_modal.php
├── js/
│   ├── main.js
│   ├── form.js
│   ├── auth.js
│   └── event.js
├── create-event.php
├── event.php
├── index.php
├── login.php
├── register.php
└── view-events.php
```

## Setup Instructions

1. Install [XAMPP](https://www.apachefriends.org/index.html)
2. Clone or extract this project into the `htdocs` directory
3. Start Apache and MySQL via XAMPP Control Panel
4. Create the MySQL database `usiu_campus_events` and import the provided schema
5. Configure `api/utils/db.php` with your DB credentials
6. Setup SMTP credentials in `register_event.php` for PHPMailer
7. Access the project at `http://localhost/usiu-campus-events`

## Testing

* Use browser DevTools Network tab to inspect AJAX calls
* Use Postman to send requests to `api/` endpoints
* Manually test UI responsiveness and form feedback messages

## Credits

Developed for USIU-Africa coursework as a student project.
