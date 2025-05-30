<?php
// delete.php - Delete a student by ID
require 'db.php';

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['id'])) {
    try {
        $deleteResult = $collection->deleteOne([
            '_id' => new MongoDB\BSON\ObjectId($data['id'])
        ]);

        echo json_encode([
            'deleted_count' => $deleteResult->getDeletedCount(),
            'success' => $deleteResult->getDeletedCount() > 0
        ]);
    } catch (MongoDB\Driver\Exception\Exception $e) {
        http_response_code(500);
        echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
    }
} else {
    http_response_code(400);
    echo json_encode(['error' => 'Missing ID']);
}
?>