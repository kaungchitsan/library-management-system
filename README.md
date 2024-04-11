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
  php artisan migrate --seed
```
6. **Install Passport for API authentication**
```php artisan passport:install```


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



## API Documentation

### Authentication Endpoints

#### Register
- **URL**: `POST /api/v1/login`
- **Request Body**:
```
{
    "email": "john@example.com",
    "password": "password"
}
```

##Book Management Endpoints

EOF > api-documentation.md
## List Books

### URL: 
GET /api/v1/books

### Authorization: 
Bearer Token

### Description: 
Get a list of all books.

## Add Book

### URL: 
POST /api/v1/books

### Authorization: 
Bearer Token

### Request Body: 
```
{
    "title": "Book Title",
    "author": "Author Name",
    "genre_id": 1,
    "branch_id": 1,
    "ISBN": "1234567890",
    "description": "Book description",
    "available_quantity": 10,
    "total_quantity": 10
}
```

## Update Book

### URL: 
POST /api/v1/books/update

### Authorization: 
Bearer Token

### Request Body: 
```
{
    "id": 1,
    "title": "Updated Book Title",
    "author": "Updated Author Name",
    "genre_id": 2,
    "branch_id": 2,
    "ISBN": "0987654321",
    "description": "Updated book description",
    "available_quantity": 8,
    "total_quantity": 10
}
```

## Delete Book

### URL: 
POST /api/v1/books/delete

### Authorization: 
Bearer Token

### Request Body: 
```
{
    "id": 1
}
```

## Borrow Book

### URL: 
POST /api/v1/borrows

### Authorization: 
Bearer Token

### Request Body: 
```
{
    "book_id": 1,
    "user_id": 1
}
```

## Return Book

### URL: 
POST /api/v1/borrows/return

### Authorization: 
Bearer Token

### Request Body: 
```
{
    "book_id": 1,
    "user_id": 1
}
```

## List Branches

### URL: 
GET /api/v1/branches

### Authorization: 
Bearer Token

### Description: 
Get a list of all branches.

## Add Branch

### URL: 
POST /api/v1/branches

### Authorization: 
Bearer Token

### Request Body: 
```
{
    "name": "Branch Name",
    "address": "Branch Address"
}
```

## Update Branch

### URL: 
POST /api/v1/branches/update

### Authorization: 
Bearer Token

### Request Body: 
```
{
    "id": 1,
    "name": "Updated Branch Name",
    "address": "Updated Branch Address"
}
```

## Delete Branch

### URL: 
POST /api/v1/branches/delete

### Authorization: 
Bearer Token

### Request Body: 
```
{
    "id": 1
}
```

## List Genres

### URL: 
GET /api/v1/genres

### Authorization: 
Bearer Token

### Description: 
Get a list of all genres.

## Add Genre

### URL: 
POST /api/v1/genres

### Authorization: 
Bearer Token

### Request Body: 
```
{
    "name": "Genre Name"
}
```\`\`\````

## Update Genre

### URL: 
POST /api/v1/genres/update

### Authorization: 
Bearer Token

### Request Body: 
```json
{
    "id": 1,
    "name": "Updated Genre Name"
}
```

## Delete Genre

### URL: 
POST /api/v1/genres/delete

### Authorization: 
Bearer Token

### Request Body: 
```json
{
    "id": 1
}
```

###List Books
###URL: GET /api/v1/books
```Authorization: Bearer Token
Description: Get a list of all books.
Add Book
URL: POST /api/v1/books
Authorization: Bearer Token
Request Body:
{
    "title": "Book Title",
    "author": "Author Name",
    "genre_id": 1,
    "branch_id": 1,
    "ISBN": "1234567890",
    "description": "Book description",
    "available_quantity": 10,
    "total_quantity": 10
}
```

##Update Book
```URL: POST /api/v1/books/update
Authorization: Bearer Token```
```Request Body:```
```{
    "id": 1,
    "title": "Updated Book Title",
    "author": "Updated Author Name",
    "genre_id": 2,
    "branch_id": 2,
    "ISBN": "0987654321",
    "description": "Updated book description",
    "available_quantity": 8,
    "total_quantity": 10
}
```

##Delete Book
```URL: POST /api/v1/books/delete
Authorization: Bearer Token```
```Request Body:```
```{
    "id": 1
}
```

##Borrow Book
```URL: POST /api/v1/borrows
Authorization: Bearer Token```
###Request Body:

```{
    "book_id": 1,
    "user_id": 1
}```

###Return Book
```URL: POST /api/v1/borrows/return
Authorization: Bearer Token```
```Request Body:```
```{
    "book_id": 1,
    "user_id": 1
}```

### FlowChart

```
+---------------------+                       +----------------------+
| Start               |                       | End                  |
+---------------------+                       +----------------------+
         |                                           |
         V                                           V
  +-----------------+                       +------------------+
  | User Requests   |                       | Return Book      |
  | to Borrow Book  |                       |                  |
  +-----------------+                       +------------------+
         |                                           |
         V                                           |
  +-----------------+                                |
  | Check Book      |                                |
  | Availability    |                                |
  +-----------------+                                |
         |                                           |
         V                                           |
  +-----------------+                                |
  | Book Available? |                                |
  +-----------------+                                |
         |                                           |
         | No                                        |
         V                                           |
  +-----------------+                                |
  | Notify User     |                                |
  | Book Unavailable|                                |
  +-----------------+                                |
         |                                           |
         V                                           |
  +-----------------+                                |
  | Book Available  |                                |
  | User Requests   |                                |
  | to Borrow       |                                |
  +-----------------+                                |
         |                                           |
         V                                           |
  +-----------------+                                |
  | Record Borrowing|                                |
  | Transaction     |                                |
  +-----------------+                                |
         |                                           |
         V                                           |
  +-----------------+                                |
  | Confirm         |                                |
  | Borrowing       |                                |
  +-----------------+                                |
         |                                           |
         |                                           |
         V                                           |
  +-----------------+                                |
  | Book Returned?  |                                |
  +-----------------+                                |
         |                                           |
         | No                                        |
         V                                           |
  +-----------------+                                |
  | Notify User     |                                |
  | Book Not        |                                |
  | Returned        |                                |
  +-----------------+                                |
         |                                           |
         V                                           |
  +-----------------+                                |
  | Record Return   |                                |
  | Transaction     |                                |
  +-----------------+                                |
         |                                           |
         V                                           |
  +-----------------+                                |
  | Confirm         |                                |
  | Return          |                                |
  +-----------------+                                |
         |                                           |
         V                                           |
  +-----------------+                                |
  | End             |                                |
  +-----------------+                                |
                                                     |
                                                     |
                                                     V
                                             +--------------+
                                             | End          |
                                             +--------------+

```