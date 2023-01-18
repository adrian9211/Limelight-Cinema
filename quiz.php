<?php

include('includes/header.php');
?>


    <h4 class="latest-text Limelight_latest_text mt-3">QUIZ</h4>

    <div class="container">
        <div id="quiz" class="m-3"></div>
        <button class='btn btn-primary m-4' id="submit">Get Results</button>
        <div id="results"></div>
        <div id="output-message"></div>
    </div>

<script>
    var myQuestions = [
        {
            question: "1. What animal is Alex in 'Madagascar'?",
            answers: {
                a: 'Hippo',
                b: 'Lion',
                c: 'Zebra'
            },
            correctAnswer: 'b'
        },
        {
            question: "2. In 'Finding Nemo', what nickname do the other fish in the tank give Nemo?",
            answers: {
                a: 'Scaredy Cat',
                b: 'Smallfry',
                c: 'Sharkbait'
            },
            correctAnswer: 'c'
        },
        {
            question: "3. What is Violet's superpower in 'The Incredibles'?",
            answers: {
                a: 'Invisibility',
                b: 'Super strength',
                c: 'Flying'
            },
            correctAnswer: 'a'
        },
        {
            question: "4. In 'The Simpsons Movie', what surrounds the town of Springfield?",
            answers: {
                a: 'A donut',
                b: 'A angry mob',
                c: 'A giant dome'
            },
            correctAnswer: 'c'
        },
        {
            question: "5. In the 'Ice Age' movies, what kind of animal is Manny?",
            answers: {
                a: 'A sloth',
                b: 'A mammoth',
                c: 'A saber-toothed tiger'
            },
            correctAnswer: 'b'
        },
        {
            question: "6. What is the name of the song that Hector wrote for Coco in the film 'Coco'?",
            answers: {
                a: 'Forget Me',
                b: 'Let us go',
                c: 'Remember Me'
            },
            correctAnswer: 'c'
        },
        {
            question: "7. At the end of 'Frozen', what does Elsa throw away (and is later found by Marshmallow)?",
            answers: {
                a: 'Her crown',
                b: 'Her gloves',
                c: 'Her ice powers'
            },
            correctAnswer: 'a'
        }





    ];

    var quizContainer = document.getElementById('quiz');
    var resultsContainer = document.getElementById('results');
    var submitButton = document.getElementById('submit');
    var resultsMessage = document.getElementById('output-message');

    generateQuiz(myQuestions, quizContainer, resultsContainer, submitButton, resultsMessage);

    function generateQuiz(questions, quizContainer, resultsContainer, submitButton, resultsMessage){

        function showQuestions(questions, quizContainer){
            // we'll need a place to store the output and the answer choices
            var output = [];
            var answers;

            // for each question...
            for(var i=0; i<questions.length; i++){

                // first reset the list of answers
                answers = [];

                // for each available answer...
                for(letter in questions[i].answers){

                    // ...add an html radio button
                    answers.push(
                        '<label class="ms-2">'
                        + '<input type="radio" class="m-2" name="question'+i+'" value="'+letter+'">'
                        + letter + ': '
                        + questions[i].answers[letter]
                        + '</label>'
                        + '<br>'
                    );
                }

                // add this question and its answers to the output
                output.push(
                    '<div class="question mb-2">' + questions[i].question + '</div>'
                    + '<div class="answers">' + answers.join('') + '</div>'
                );
            }

            // finally combine our output list into one string of html and put it on the page
            quizContainer.innerHTML = output.join('');
        }


        function showResults(questions, quizContainer, resultsContainer, resultsMessage){

            // gather answer containers from our quiz
            var answerContainers = quizContainer.querySelectorAll('.answers');

            // keep track of user's answers
            var userAnswer = '';
            var numCorrect = 0;

            // for each question...
            for(var i=0; i<questions.length; i++){

                // find selected answer
                userAnswer = (answerContainers[i].querySelector('input[name=question'+i+']:checked')||{}).value;

                // if answer is correct
                if(userAnswer===questions[i].correctAnswer){
                    // add to the number of correct answers
                    numCorrect++;

                    // color the answers green
                    answerContainers[i].style.color = 'lightgreen';
                }
                // if answer is wrong or blank
                else{
                    // color the answers red
                    answerContainers[i].style.color = 'red';
                }
            }

            // show number of correct answers out of total



            resultsContainer.innerHTML =' Your score is ' + numCorrect + ' out of ' + questions.length + '<br>' + '<br>';

            if (numCorrect === 7) {
                resultsMessage.innerHTML = 'You are a true Disney fan!' + '<br>' + '<br>';
                alert('You are a true Disney fan!');
            } else if (numCorrect >= 5) {
                resultsMessage.innerHTML = 'You are a Disney fan!' + '<br>' + '<br>';
                alert('You are a Disney fan!')
            } else if (numCorrect >= 3) {
                resultsMessage.innerHTML = 'Good but try to get better score!' + '<br>' + '<br>';
                alert('Good but try to get better score!')
            } else {
                resultsMessage.innerHTML = 'Sad ;( Try again!' + '<br>' + '<br>';
                alert('Sad ;( Try again!')
            }

        }

        // show questions right away
        showQuestions(questions, quizContainer);

        // on submit, show results
        submitButton.onclick = function(){
            showResults(questions, quizContainer, resultsContainer, resultsMessage);
        }

    }
</script>

<?php
# Include footer
include('includes/footer.php');
?>