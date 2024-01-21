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
        <div class="smallText part-count" id="part-count"><b>Part 1/5</b></div>
        <div class="smallText">ScentQ</div>
    </nav>

    <div class="quiz-container">

        <!-- <div class="questions">

            @foreach($quizquestions as $quizquestion)
            <form action="{{url('/add_quizresult')}}" method="POST">
                @csrf
                <div class="quiz-question">
                    <div class="question">
                        <div class="question-text">Question {{ $quizquestion->questionID }}</div>
                        <div class="desc smallText">Choose the option closest to your style</div>
                    </div>

                    <ul class="quiz-choices flex">
                        @foreach($quizchoices->where('questionID', $quizquestion->questionID) as $quizchoice)
                        <li onclick="nextQuestion('{{ $quizchoice->score }}')" class="choice" style="background-image: url('data:image/jpeg;base64,{{ base64_encode($quizchoice->picture) }}');"></li>
                        <input type="hidden" class="score" name="score_{{ $quizquestion->questionID }}" value="{{ $quizchoice->score }}">
                        @endforeach
                    </ul>
                </div>
                <input type="hidden" class="totalScore" name="totalScore" value="0">
                <div class="submit-button"><input type="submit"></div>
            </form>
            @endforeach

        </div> -->
        <form action="{{ url('/add_quizresult') }}" method="POST">
            @csrf
            <div class="questions">


                @foreach($quizquestions as $quizquestion)
                <div class="quiz-question">
                    <div class="question">
                        <div class="question-text">Question {{ $quizquestion->questionID }}</div>
                        <div class="desc smallText">Choose the option closest to your style</div>
                    </div>

                    <ul class="quiz-choices flex">
                        @foreach($quizchoices->where('questionID', $quizquestion->questionID) as $quizchoice)
                        <li onclick="nextQuestion('{{ $quizchoice->score }}', '{{ $quizquestion->questionID }}', this.closest('form'))" class="choice" style="background-image: url('data:image/jpeg;base64,{{ base64_encode($quizchoice->picture) }}');"></li>
                        <input type="hidden" class="score" name="score_{{ $quizquestion->questionID }}" value="{{ $quizchoice->score }}">
                        @endforeach
                    </ul>
                </div>
                @endforeach

                <input type="hidden" class="totalScore" name="totalScore" value="0">
                <div class="submit-button" style="visibility: hidden;"><input type="submit"></div>

            </div>
        </form>
        <!-- the original one
        <div class="questions">

            @foreach($quizquestions as $quizquestion)
            <form action="{{url('/add_quizresult')}}" method="POST">
                @csrf
                <div class="quiz-question">
                    <div class="question">
                        <div class="question-text">Question {{ $quizquestion->questionID }}</div>
                        <div class="desc smallText">Choose the option closest to your style</div>
                    </div>

                    <ul class="quiz-choices flex">
                        @foreach($quizchoices->where('questionID', $quizquestion->questionID) as $quizchoice)
                        <li onclick="nextQuestion('{{ $quizchoice->score }}', '{{ $quizquestion->questionID }}', this.closest('form'))" class="choice" style="background-image: url('data:image/jpeg;base64,{{ base64_encode($quizchoice->picture) }}');"></li>
                        <input type="hidden" class="score" name="score" value="{{ $quizchoice->score }}">
                        @endforeach
                    </ul>
                </div>
                <input type="hidden" class="totalScore" name="totalScore" value="0">
                <div class="submit-button"><input type="submit"></div>
            </form>
            @endforeach

        </div> -->


    </div>



    <div class="quiz-footer flex">
        <div class="smallText">Having trouble? <a href="#">See why I need this quiz</a></div>
        <div class="smallText">Personal Scent Quiz</div>
    </div>


</body>
<script>
    function nextQuestion(score, questionID, form) {
        // SWIPE LEFT
        var w = window.innerWidth;
        var scroll = document.querySelector('.questions');
        scroll.scrollLeft += w;

        // UPDATE PART-COUNT
        var partCount = document.querySelector('.part-count');
        var questionCount = parseInt(questionID)+1;
        partCount.innerText = "Part " + questionCount + "/5";

        // UPDATE TOTAL SCORE
        var totalScoreInput = document.querySelector(".totalScore");
        var currentTotalScore = parseInt(totalScoreInput.value);
        var choiceScore = parseInt(score);

        console.log("BEFORE CLICK currentotalscore", currentTotalScore);
        console.log("BEFORE CLICK choicescore", choiceScore);
        totalScoreInput.value = currentTotalScore + choiceScore;
        console.log("After CLICK", totalScoreInput.value);

        if (questionID == 5) {
            console.log("this is 5th question");
            form.submit();
        } else {
            
        }
    }
</script>

</html>