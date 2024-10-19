<?php
function calculateResult($marks) {
    // Initialize total marks
    $totalMarks = 0;

    // Validate the marks range (0-100)
    foreach ($marks as $subject => $mark) {
        if ($mark < 0 || $mark > 100) {
            echo "Mark range is invalid for $subject.<br>";
            return;  // Stop further execution if invalid marks are found
        }
        $totalMarks += $mark;  // Add valid marks to total
    }

    // Check if student has failed in any subject
    foreach ($marks as $subject => $mark) {
        if ($mark < 33) {
            echo "Failed in $subject. Student has failed.<br>";
            return;  // Stop further execution if failed
        }
    }

    // Calculate total, average marks, and grade
    $averageMarks = $totalMarks / count($marks);
    $grade = getGrade($averageMarks);

    // Output the result
    echo "Total Marks: $totalMarks<br>";
    echo "Average Marks: " . number_format($averageMarks, 2) . "<br>";
    echo "Grade: $grade<br>";
}

// Function to determine the grade using a switch-case statement
function getGrade($average) {
    switch (true) {
        case ($average >= 80 && $average <= 100):
            return "A+";
        case ($average >= 70 && $average < 80):
            return "A";
        case ($average >= 60 && $average < 70):
            return "A-";
        case ($average >= 50 && $average < 60):
            return "B";
        case ($average >= 40 && $average < 50):
            return "C";
        case ($average >= 33 && $average < 40):
            return "D";
        default:
            return "F";
    }
}

// Example input: Marks for 5 subjects
$marks = [
    "Math" => 45,
    "Science" => 60,
    "English" => 50,
    "History" => 37,  
    "Geography" => 47
];

// Call the function to calculate the result
calculateResult($marks);

