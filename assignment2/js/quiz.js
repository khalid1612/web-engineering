
var timer;
var second = 0;

var quizQuestion = 1;//default question
var totalQuestion = questions.length;

//default and max question place holder
document.getElementById('quizQuestion').placeholder = "Default "+quizQuestion+" | Max "+totalQuestion;

//set question position randomly
var questionPosition = [];

//random genarator
function randomGenarator() {
  return Math.floor(Math.random() * (totalQuestion));
}

function storeRandomPosition(max) {
  for(var i = 0;  i < max;){
    var num = randomGenarator();
    console.log(num+" ");

    if (questionPosition.includes(num)) {

    }else{
      questionPosition.push(num);
      i++;
    }
  }
}

//click start quiz
$("#continue").click(function(){
    //set  QUESTION:
    if (document.getElementById('quizQuestion').value != "") {
      if (document.getElementById('quizQuestion').value > totalQuestion || document.getElementById('quizQuestion').value <= 0) {
        alert("Sorry!\nNumber of question invalid");
        return;
      }else{
        quizQuestion = document.getElementById('quizQuestion').value;
      }
    }

    storeRandomPosition(quizQuestion);


   $("#infoPart").hide(500);
   $("#questionPart").show(500);

   //set name
   document.getElementById('userName').textContent = document.getElementById('name').value;

   loadQuestions(questionPosition[currentQuestion]);
   timer = setInterval(countDown,1000);
});

//timer
function countDown() {
  document.getElementById("time").innerHTML = "00:"+second;
  second++;
}


//quiz part

//click next button
$("#nextBtn").click(function(){
  loadNxtQuestion();
});


var currentQuestion = 0;
var correctAns = 0;


var questionEl = document.getElementById('question');
var op1 = document.getElementById('op1');
var op2 = document.getElementById('op2');
var op3 = document.getElementById('op3');
var op4 = document.getElementById('op4');
var score = document.getElementById('score');
var progress = document.getElementById('progress');

var nextBtn = document.getElementById('nextBtn');

function loadQuestions(questionIndex) {
  var q = questions[questionIndex];

  questionEl.textContent = (currentQuestion + 1) + '. '+q.ques;
  op1.textContent  = q.op1;
  op2.textContent  = q.op2;
  op3.textContent  = q.op3;
  op4.textContent  = q.op4;

  if (currentQuestion == quizQuestion - 1) {
    nextBtn.textContent = "finish";
  }
}

function loadNxtQuestion() {
  var selectedOption = document.querySelector('input[type=radio]:checked');

  if (!selectedOption) {
    alert("please select your answer!");
    return;
  }


  var answer = selectedOption.value;
  if (questions[questionPosition[currentQuestion]].ans == answer) {
    correctAns++;
  }

  selectedOption.checked = false;
  currentQuestion++;

  //updare progress
  var complete = (currentQuestion / questionPosition.length) * 100;
  progress.style.width = complete + '%';
  progress.textContent = Math.round(complete) + '% complete';

  if (currentQuestion == quizQuestion - 1) {
    nextBtn.textContent = "finish";
  }

  if (currentQuestion == quizQuestion) {
    $("#result").show(500);
    $("#perQuestion").hide(500);
    $("#nextBtn").hide(500);
    score.textContent = correctAns;
    clearInterval(timer);
  }

  loadQuestions(currentQuestion);

}
