<?php
// update.php - Update a student by ID
require 'db.php';

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['id'])) {
    $updateData = [];
    
    // Only update fields that are provided
    if (isset($data['name'])) $updateData['name'] = $data['name'];
    if (isset($data['student_id'])) $updateData['student_id'] = $data['student_id'];
    if (isset($data['course'])) $updateData['course'] = $data['course'];
    
    if (!empty($updateData)) {
        $updateData['updated_at'] = new MongoDB\BSON\UTCDateTime();
        
        $updateResult = $collection->updateOne(
            ['_id' => new MongoDB\BSON\ObjectId($data['id'])],
            ['$set' => $updateData]
        );

        echo json_encode([
            'modified_count' => $updateResult->getModifiedCount(),
            'matched_count' => $updateResult->getMatchedCount()
        ]);
    } else {
        http_response_code(400);
        echo json_encode(['error' => 'No fields to update provided']);
    }
} else {
    http_response_code(400);
    echo json_encode(['error' => 'Missing ID']);
}
?>