<?php

include('includes/header.php');
?>

<h2>Simple Quiz</h2>



<script type="text/javascript">
    function checkAnswer1() {
        var answer1 = document.getElementById("answer1").value;
        if (answer1.toUpperCase() === 'BERLIN') {
            alert('Correct!');
        } else {
            alert('Incorrect! The answer is Berlin.');
        }
    }

    function checkAnswer2() {
        var answer2 = document.getElementById("answer2").value;
        if (answer2.toUpperCase() === 'PARIS') {
            alert('Correct!');
        } else {
            alert('Incorrect! The answer is Paris.');
        }
    }

    function checkAnswer3() {
        var answer3 = document.getElementById("answer3").value;
        if (answer3.toUpperCase() === 'TOKYO') {
            alert('Correct!');
        } else {
            alert('Incorrect! The answer is Tokyo.');
        }
    }
</script>

    <form action="quiz.php" method="post" >
        <div class="quiz-form">
            <p>What is the capital of Germany?</p>
            <input type="text" id="answer1" />
        </div>
        <input  onclick="checkAnswer1()" />
    </form>

    <form>
        <p>What is the capital of France?</p>
        <input type="text" id="answer2" />
        <button type="button" onclick="checkAnswer2(), checkAnswer1()">Submit Answer</button>
    </form>

    <form>
        <p>What is the capital of Japan?</p>
        <input type="text" id="answer3" />
        <button type="button" onclick="checkAnswer3()">Submit Answer</button>
    </form>
<?php
# Include footer
include('includes/footer.php');
?>