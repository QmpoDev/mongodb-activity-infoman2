<?php
// create.php - Create a new student
require 'db.php';

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['name'], $data['student_id'], $data['course'])) {
    $insertResult = $collection->insertOne([
        'name' => $data['name'],
        'student_id' => $data['student_id'],
        'course' => $data['course'],
        'created_at' => new MongoDB\BSON\UTCDateTime()
    ]);

    echo json_encode(['inserted_id' => $insertResult->getInsertedId()]);
} else {
    http_response_code(400);
    echo json_encode(['error' => 'Missing required fields: name, student_id, or course']);
}
?>