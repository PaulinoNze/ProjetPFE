<?php
include "../../database.php";

$selected_answers = array();
foreach ($_POST as $key => $value) {
    if (strpos($key, 'answer-') === 0) {
        $question_number = substr($key, strlen('answer-'));
        $selected_answers[$question_number] = $value;
    }
}

$coursId = $_POST['coursId'];

$ans = array();
$sql = "SELECT reponse_correcte FROM examefinale WHERE coursId = $coursId";
$result = mysqli_query($conn, $sql);

$totalMarks = 0; 
$totalQues = 0; 
if ($result) {
    $totalQues = mysqli_num_rows($result);
    while ($row = mysqli_fetch_assoc($result)) {
        $ans[] = $row['reponse_correcte'];
    }
    mysqli_free_result($result);
}

for ($i = 1; $i <= $totalQues; $i++) {
    if (isset($selected_answers[$i])) {
        if ($selected_answers[$i] == $ans[$i - 1]) {
            $totalMarks++;
        }else{
            if($ans[$i - 1] == 1){
                $letterAns = "a";
            }elseif($ans[$i - 1] == 2){
                $letterAns = "b";
            }elseif($ans[$i - 1] == 3){
                $letterAns = "c";
            }else{
                $letterAns = "d";
            }
            echo "<p style='color: red;'>Réponse incorrecte à la question $i, la bonne réponse est : " . $letterAns  . "<br>";
        }
    }
}
echo "<p>Résultat: <strong style='font-size: 1.5em;'>$totalMarks</strong>/$totalQues</p>";
?>
