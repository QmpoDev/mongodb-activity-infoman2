# Student CRUD - MongoDB CRUD Application

A simple CRUD (Create, Read, Update, Delete). This application demonstrates basic database operations using MongoDB with PHP.

## Technologies Used
- PHP 8.3.17
- MongoDB
- MongoDB PHP Driver
- Composer (Dependency Manager)

# Project Structure

```plaintext
mongodb-activity/
├── composer.json
├── composer.lock
├── db.php
├── create.php
├── read.php
├── update.php
├── delete.php
└── vendor/
```
## Prerequisites
- PHP 7.4 or higher
- MongoDB server running on localhost:27017
- Composer for dependency management
- Postman (for testing API endpoints)

## Setup Instructions
1. Clone the repository
2. Install dependencies:
   ```bash
   composer install
   ```
3. Start MongoDB service
4. Start the PHP development server:
   ```bash
   php -S localhost:80
   ```

## API Documentation

### 1. Create Student (POST /create.php)
Creates a new student record in the database.

**Request:**
- Method: POST
- URL: `http://localhost/create.php`
- Headers: 
  - Content-Type: application/json
- Body:
```json
{
    "name": "John Doe",
    "student_id": "2024001",
    "course": "Computer Science"
}
```

**Response:**
```json
{
    "inserted_id": {"$oid": "68391dc35996c453750deb62"}
}
```

### 2. Read Students (GET /read.php)
Retrieves student records from the database.

**Request:**
- Method: GET
- URL: `http://localhost/read.php`
- Optional Query Parameters:
  - student_id
  - course

**Examples:**
- Get all students: `GET /read.php`
- Filter by student ID: `GET /read.php?student_id=2024001`
- Filter by course: `GET /read.php?course=Computer Science`

### 3. Update Student (POST /update.php)
Updates an existing student record.

**Request:**
- Method: POST
- URL: `http://localhost/update.php`
- Headers:
  - Content-Type: application/json
- Body:
```json
{
    "id": "68391dc35996c453750deb62",
    "name": "John Doe Updated",
    "course": "Data Science"
}
```

**Response:**
```json
{
    "modified_count": 1,
    "matched_count": 1
}
```

### 4. Delete Student (POST /delete.php)
Removes a student record from the database.

**Request:**
- Method: POST
- URL: `http://localhost/delete.php`
- Headers:
  - Content-Type: application/json
- Body:
```json
{
    "id": "68391dc35996c453750deb62"
}
```

**Response:**
```json
{
    "deleted_count": 1,
    "success": true
}
```

## Database Structure

### Database: student_db
### Collection: students

**Document Structure:**
```json
{
    "_id": ObjectId,
    "name": String,
    "student_id": String,
    "course": String,
    "created_at": DateTime
}
```
