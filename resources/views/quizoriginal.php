<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Scent Quiz</title>
    <link rel="stylesheet" href="./CSS/quiz.css">
    <!-- <script src="JS/script.js"></script> -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>

    <nav class="quiz-nav flex">
        <div class="smallText">Des Vu</div>
        <div class="smallText part-count" id="part-count"><b>Part 1/6</b></div>
        <div class="smallText">ScentQ</div>
    </nav>

    <div class="quiz-container">

        <div class="questions">

            @foreach($quizquestions as $quizquestion)
            <div class="quiz-question">
                <div class="question">
                    <div class="question-text">Question {{ $quizquestion->questionID }}</div>
                    <div class="desc smallText">Choose the option closest to your style</div>
                </div>

                <ul class="quiz-choices flex">
                    @foreach($quizchoices->where('questionID', $quizquestion->questionID) as $quizchoice)
                    <li onclick=nextQuestion() class="choice" style="background-image: url('data:image/jpeg;base64,{{ base64_encode($quizchoice->picture) }}');"></li>
                    <input type="hidden" class="score" name="score" value="{{ $quizchoice->score }}">
                    @endforeach
                </ul>
            </div>
            @endforeach

            <!-- <div class="quiz-question">
                <div class="question">
                    <div class="question-text">Question 2</div>
                    <div class="desc smallText">Choose the option closest to your style</div>
                </div>

                <div class="quiz-choices flex">
                    <div class="choice" style="background-image: url('IMG/athalia.png');">
                        <div class="normalText">A. CHOICE A</div>
                    </div>

                    <div class="choice" style="background-image: url('IMG/valaya.png');">
                        <div class="normalText">A. CHOICE A</div>
                    </div>

                    <div class="choice" style="background-image: url('IMG/delina.png');">
                        <div class="normalText">A. CHOICE A</div>
                    </div>

                    <div class="choice" style="background-image: url('IMG/oriana.png');">
                        <div class="normalText">A. CHOICE A</div>
                    </div>
                </div>
            </div> -->

        </div>




    </div>



    <div class="quiz-footer flex">
        <div class="smallText">Having trouble? <a href="#">See why I need this quiz</a></div>
        <div class="smallText">Personal Scent Quiz</div>
    </div>


</body>
<script>
    function nextQuestion() {

        var w = window.innerWidth;

        var scroll = document.querySelector('.questions');
        scroll.scrollLeft += w;

    }
</script>

</html>