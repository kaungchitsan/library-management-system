# Library Management System

## About

The Library Management System is a web application designed to streamline library operations, including book management, borrowing, and returning processes.

## Features

- **Book Management**: Add, edit, and delete books from the library inventory.
- **User Authentication**: Secure user authentication system for accessing the system.
- **Borrowing**: Allow users to borrow books from the library.
- **Returning**: Enable users to return borrowed books to the library.
- **Fine Calculation**: Calculate fines for late returns based on predefined rules.

## Technologies Used

- **Laravel**: PHP web application framework for backend development.
- **MySQL**: Relational database management system for storing library data.
- **Bootstrap**: Frontend framework for building responsive and mobile-first web applications.

## Installation

1. **Clone the Repository**: 
    ```
    https://github.com/kaungchitsan/library-management-system.git
    ```
2. **Install Dependencies**:
    ```
    composer install
    ```
3. **Set Up Environment Variables**:
- Copy the `.env.example` file to `.env`:
  ```
  cp .env.example .env
  ```
- Generate a new application key:
  ```
  php artisan key:generate
  ```

4. **Configure Database**:
- Update the database connection settings in the `.env` file according to your environment.

5. **Run Migrations**:
```
  php artisan migrate
```


## Usage

- **Accessing the Application**:
- Open your web browser and navigate to `http://localhost:8000`.
- **User Authentication**:
### Admin
 ```
    email - admin@mail.com
    password - password
```
- **Managing Books**:
- Add, edit, or delete books from the library inventory.
- **Borrowing Books**:
- Search for available books and borrow them from the library.
- **Returning Books**:
- Return borrowed books to the library and calculate fines for late returns.
