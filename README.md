# Blog API with Laravel Sanctum

## Setup

1. **Clone the repository:**  
   ```sh
   git clone <repository_url>
   cd <repository_folder>
   ```  

2. **Install dependencies:**  
   ```sh
   composer install
   ```  

3. **Set up the environment:**  
   ```sh
   cp .env.example .env
   php artisan key:generate
   ```  

4. **Configure the database** in the `.env` file.  

5. **Run migrations:**  
   ```sh
   php artisan migrate
   ```  

6. **Serve the application:**  
   ```sh
   php artisan serve
   ```  

## API Endpoints  

| Method  | Endpoint          | Description |
|---------|------------------|-------------|
| **POST**   | `/api/register`     | Register a new user |
| **POST**   | `/api/login`        | Log in and receive an authentication token |
| **GET**    | `/api/posts`        | Retrieve a list of all public posts |
| **GET**    | `/api/posts/{id}`   | View details of a specific post |
| **POST**   | `/api/posts`        | Create a new post (requires authentication) |
| **PUT**    | `/api/posts/{id}`   | Update an existing post (requires authentication & ownership) |
| **DELETE** | `/api/posts/{id}`   | Delete a post (requires authentication & ownership) |

## Authentication  

This API uses Laravel Sanctum for authentication. To access protected endpoints:

- Register or log in to receive a token.
- Send the token in the `Authorization` header with `Bearer <token>`.






 
 
