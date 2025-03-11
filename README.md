# Blog API with Laravel Sanctum

## 📌 Overview
This is a **RESTful API** built with Laravel and Laravel Sanctum for authentication. It allows users to register, log in, and perform CRUD operations on blog posts.

## 🚀 Features
- User Authentication (Register, Login, Logout) with Laravel Sanctum
- Create, Read, Update, and Delete blog posts
- Protected Routes requiring authentication
- JSON API responses

## 🛠 Setup & Installation

### 1️⃣ Clone the repository
```sh
git clone <repository_url>
cd <repository_folder>
```

### 2️⃣ Install dependencies
```sh
composer install
```

### 3️⃣ Set up environment
```sh
cp .env.example .env
php artisan key:generate
```

### 4️⃣ Configure the database
Edit the `.env` file and update the database connection details.

### 5️⃣ Run migrations
```sh
php artisan migrate
```

### 6️⃣ Serve the application
```sh
php artisan serve
```

## 🔐 Authentication
This API uses Laravel Sanctum for authentication.
- After login, you'll receive an authentication token.
- Include this token in the `Authorization` header:  
  **`Authorization: Bearer <token>`**

## 📡 API Endpoints

| Method  | Endpoint          | Description |
|---------|------------------|-------------|
| **POST**   | `/api/register`     | Register a new user |
| **POST**   | `/api/login`        | Log in and receive an authentication token |
| **GET**    | `/api/posts`        | Retrieve a list of all public posts |
| **GET**    | `/api/posts/{id}`   | View details of a specific post |
| **POST**   | `/api/posts`        | Create a new post (requires authentication) |
| **PUT**    | `/api/posts/{id}`   | Update an existing post (requires authentication & ownership) |
| **DELETE** | `/api/posts/{id}`   | Delete a post (requires authentication & ownership) |

## 📄 Example API Request
### 🔹 Register a User
```sh
curl -X POST \
  http://127.0.0.1:8000/api/register \
  -H "Content-Type: application/json" \
  -d '{"name": "Tayseer", "email": "tayseer@gmail.com", "password": "123456789"}'
```

### 🔹 Authenticate & Get Token
```sh
curl -X POST \
  http://127.0.0.1:8000/api/login \
  -H "Content-Type: application/json" \
  -d '{ "email": "tayseer@gmail.com", "password": "123456789"}'
```

### 🔹 Fetch All Posts (Authenticated)
```sh
curl -X GET \
  http://127.0.0.1:8000/api/posts \
  -H "Authorization: Bearer <your_token_here>"
```


