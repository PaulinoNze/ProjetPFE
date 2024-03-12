<?php
    $sitename = 'Quiz';
    $note = 'Si vous ne cliquez sur aucune réponse, les notes correspondantes à cette question seront marquées <strong>ZÉRO</strong> et les modifications ultérieures ne pourront pas être annulées.';
?>
<!DOCTYPE html>
<html>
<head>
<title><?= $sitename; ?></title> 
<!--    meta-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    
<!--    styles-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat|PT+Serif" rel="stylesheet">
    <link rel="stylesheet" href="style.css" >
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header>
    <h1><?= $sitename; ?></h1>
    </header>
    <hr>
    
    <div id="container">
        <p><strong>Note: </strong><?= $note; ?></p>
        <form id="quizForm" method="POST">
            <ol type="1" >
                <?php
                    include "../database.php";
                    if (isset($_GET['chapitreId'])) {
                        $chapitreId = $_GET['chapitreId'];
                        $n = 0;
                        $sql = "SELECT idQuiz, question, reponse_1, reponse_2, reponse_3, num_reponse_correcte FROM quiz WHERE chapitreId = $chapitreId";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_array($result)) {
                                $n++; 
                ?>
                <div id="question-container">
                    <li><h6 class="question" id="<?php echo $n; ?>" ><?php echo $row['question'];?></h6></li>
                    <input type="radio" name="answer-<?php echo $n; ?>" value="1" ><?php echo $row['reponse_1'];?><br>
                    <input type="radio" name="answer-<?php echo $n; ?>" value="2" ><?php echo $row['reponse_2'];?><br>
                    <input type="radio" name="answer-<?php echo $n; ?>" value="3" ><?php echo $row['reponse_3'];?><br>
                    <input type="hidden" name="idQuiz" value="<?php echo $row['idQuiz'];?>">
                    <input type="hidden" name="chapireId" value="<?php echo $chapitreId;?>">
                    <br>
                </div>
                <?php
                            }
                        }
                    }
                ?>
            </ol>
        </form>
        
    </div>

    <div id="result" class="mt-4"></div>
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#submitBtn').click(function() {
                var formData = $('#quizForm').serialize();
                $.ajax({
                    url: 'result.php',
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        $('#result').html(response);
                        $('#submitBtn').prop('disabled', true);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
</body>
</html>
