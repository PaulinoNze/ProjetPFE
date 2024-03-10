<?php
include "../../database.php";

// Initialize score and results array
$score = 0;
$results = [];

// Loop through each question
$n = 1;
while (isset($_POST['idQuiz_' . $n])) {
    // Get the quiz ID and responses for this question
    $quizId = $_POST['idQuiz_' . $n];
    $correctResponse = $_POST['correctResponse_' . $n];
    $userResponseA = isset($_POST['responseA_' . $n]) ? $_POST['responseA_' . $n] : null;
    $userResponseB = isset($_POST['responseB_' . $n]) ? $_POST['responseB_' . $n] : null;
    $userResponseC = isset($_POST['responseC_' . $n]) ? $_POST['responseC_' . $n] : null;

    // Check if the user responses match the correct response
    $isCorrectA = $userResponseA === $correctResponse;
    $isCorrectB = $userResponseB === $correctResponse;
    $isCorrectC = $userResponseC === $correctResponse;

    // Increment score if any of the responses is correct
    if ($isCorrectA || $isCorrectB || $isCorrectC) {
        $score++;
    }

    // Store the result message for this question
    $results[$n] = [
        'question' => $quizId,
        'isCorrectA' => $isCorrectA,
        'isCorrectB' => $isCorrectB,
        'isCorrectC' => $isCorrectC
    ];

    // Increment the question counter
    $n++;
}

// Prepare the response data
$responseData = [
    'score' => $score,
    'results' => $results
];

// Encode the response data as JSON and send it back to the client-side JavaScript
echo json_encode($responseData);
?>
