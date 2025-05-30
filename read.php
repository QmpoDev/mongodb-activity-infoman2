<?php
// read.php - Read students
require 'db.php';

$filter = [];

// Handle query parameters for filtering
if (isset($_GET['student_id'])) {
    $filter['student_id'] = $_GET['student_id'];
}
if (isset($_GET['course'])) {
    $filter['course'] = $_GET['course'];
}

$students = $collection->find($filter);
$result = [];
foreach ($students as $student) {
    $student['_id'] = (string) $student['_id'];
    if (isset($student['created_at'])) {
        $student['created_at'] = $student['created_at']->toDateTime()->format('Y-m-d H:i:s');
    }
    $result[] = $student;
}

echo json_encode($result);
?>