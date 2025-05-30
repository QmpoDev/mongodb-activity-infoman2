[# Student Management API

A simple CRUD API built with PHP and MongoDB for managing student records.

## Prerequisites

- PHP 7.4 or higher
- MongoDB server running on localhost:27017
- Composer for dependency management

## Setup

1. Install dependencies:
```bash
composer install
```

2. Make sure MongoDB is running on your system

## API Endpoints

### Create Student
- **POST** `/create.php`
- **Body**:
```json
{
    "name": "John Doe",
    "student_id": "2024001",
    "course": "Computer Science"
}
```

### Read Students
- **GET** `/read.php` - Get all students
- **GET** `/read.php?student_id=2024001` - Filter by student ID
- **GET** `/read.php?course=Computer Science` - Filter by course

### Update Student
- **POST** `/update.php`
- **Body**:
```json
{
    "id": "student_document_id",
    "name": "John Doe Updated",
    "course": "Data Science"
}
```
Note: Only include fields you want to update

### Delete Student
- **POST** `/delete.php`
- **Body**:
```json
{
    "id": "student_document_id"
}
```

## Testing with Postman

1. Import the following endpoints into Postman:
   - Create: POST http://localhost/mongodb-activity/create.php
   - Read: GET http://localhost/mongodb-activity/read.php
   - Update: POST http://localhost/mongodb-activity/update.php
   - Delete: POST http://localhost/mongodb-activity/delete.php

2. Set the Content-Type header to `application/json` for all requests

3. Use the example request bodies provided above to test each endpoint

## Response Formats

All endpoints return JSON responses with appropriate HTTP status codes:

- 200: Success
- 400: Bad Request (missing or invalid parameters)
- 500: Server Error ](https://github.com/QmpoDev/mongodb-activity-infoman2/wiki)
