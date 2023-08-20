<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['textchecker'])) {
        $text = $_POST['textchecker'];
    } else {
        header("Location: index.html");
        exit();
    }

    if (!empty($text)) {
        $wordCount = countWords($text);
        $charCount = countCharacters($text);
        $sentenceCount = countSentences($text);
        $paragraphCount = countParagraphs($text);
    } else {
        echo "<p>No input provided.</p>";
    }
}

function countWords($text) {
    $words = str_word_count($text);
    return $words;
}

function countCharacters($text) {
    $characters = strlen($text);
    return $characters;
}

function countSentences($text) {
    $sentences = preg_split('/[.!?]/', $text, -1, PREG_SPLIT_NO_EMPTY);
    return count($sentences);
}

function countParagraphs($text) {
    $paragraphs = preg_split('/\n\s*\n/', $text, -1, PREG_SPLIT_NO_EMPTY);
    return count($paragraphs);
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Word Counter</title>
  </head>
  <body>
    <nav class="navbar bg-body-tertiary" style="background-color: #f5f5f5;">
  <div class="container-fluid">
    <span class="navbar-brand mb-0 h1">Word Counter App</span>
  </div>
</nav>
<br>
<center><h1 class="display-5">Text Report</h1></center>
<br>
<div class="container-fluid">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Feature</th>
                <th>Count</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Word Count</td>
                <td><?php
                echo $wordCount;
                ?></td>
            </tr>
            <tr>
                <td>Character Count</td>
                <td><?php
                echo $charCount;
                ?></td>
            </tr>
            <tr>
                <td>Sentence Count</td>
                <td><?php
                echo $sentenceCount;
                ?></td>
            </tr>
            <tr>
                <td>Paragraph Count</td>
                <td><?php
                echo$paragraphCount;
                ?></td>
            </tr>
        </tbody>
    </table>
    <hr>

  </div>
  <footer style=" background-color: #f5f5f5;position: fixed;bottom: 0; width: 100vw; padding: 20px; text-align: center;">
    Made by M KASHF
</footer>
  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>