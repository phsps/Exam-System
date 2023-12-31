<?php 
$exam_tyme = 10;
?>

<script>

const searchParams = new URLSearchParams(window.location.search);

let sub = searchParams.get("sub")
let short = searchParams.get("short")
const content = document.getElementById("content");

class ExamQuestions {
    
    constructor() {
      this.data = [];
      this.currentIndex = 0;
      this.template = null;
      this.answers =  []
      this.name = ""
  
      // DOM elements
      this.content = document.getElementById('content');
      this.nextButton = document.getElementById('next');
      this.prevButton = document.getElementById('prev');
      this.submit = document.getElementById("submit");
      this.trackers = document.querySelector(".trackers")

      // Event listeners
      this.nextButton.addEventListener('click', this.nextQuestion.bind(this));
      this.prevButton.addEventListener('click', this.prevQuestion.bind(this));
      this.submit.addEventListener("click", () => {
        this.submitAnswers(sub, short, "Data Submitted", "Your answers has been submitted successfully", "success")
      });
    }

  
    async loadQuestions(sub, short) {
      try {

        const response = await fetch(`./examQuestions?sub=${sub}&short=${short}`); //api/ques?sub=${sub}&short=${short}
        this.data = await response.json();
        this.setOptionNull(this.data.length);

        if (this.data.length != 0) {
          const question = this.data[this.currentIndex];

          this.displayQuestion(question)
          this.displayTrackers()
          let allTracker = document.querySelectorAll(".box")
          allTracker.forEach(tracker => {
            tracker.addEventListener("click", (e) => {
              let quesNo = tracker.getAttribute("no")
              this.jumpToQuestion(e.target.value, quesNo)
            })
          })
        }
        
      } catch (error) {
        console.error('Error loading questions:', error);
      }
    }

   
    setOptionNull(length) {
      for(let i = 1; i <= length; i++ ) {
        localStorage.setItem(`e${i}`, null)
      }
    }
    

    setValue(key, value) {
      localStorage.setItem(key, value)
    }

    setChosenChecked(key) { //key is same with the question name
      let value = localStorage.getItem(key)
      let currentQuesOptions = document.getElementsByName(key)
      
      if(value != "null") {
        currentQuesOptions.forEach(option => {
          if (option.value == value) {
            
            option.setAttribute("checked", true)
          }
        })
      }
    }

    jumpToQuestion(value, quesNo) {
      this.currentIndex = quesNo - 1 
      const question = this.data[this.currentIndex]

      this.displayQuestion(question)
    }
  
    nextQuestion() {
      if (this.currentIndex < this.data.length - 1) {
        this.currentIndex++;
        const question = this.data[this.currentIndex];
     
        this.displayQuestion(question);
        
      }
    }
  
    prevQuestion() {
      if (this.currentIndex > 0) {
        this.currentIndex--;
        const question = this.data[this.currentIndex];
        this.displayQuestion(question);
      }
    }
  
    displayQuestion(question) {
      this.template = `
        <div class="exam__questions">
          <div><h6 class="question__number">Question ${question.tid}</h6></div>
          <p class="question__text">${question.qst}</p>
          <p class="question__passage">${question?.qst ? question.psg : ""}</p>
          <img 
            src="${question.img}" 
            alt="question-img" 
            class="${question?.img == "" ? "hidden": "shown"}" 
          />
          <hr>
          <div class="options">
            ${this.generateOptionsHTML()}
          </div>
        </div>
      `;
  
      this.content.innerHTML = this.template;
      this.name = this.data[this.currentIndex].name
      
      
      let currentQuesOptions = document.getElementsByName(`${this.name}`)
      currentQuesOptions.forEach(option => {
        
        option.addEventListener("change", this.getOption.bind(this))
      })
      this.setChosenChecked(this.name)
    }

    displayTrackers() {
      for(let i = 1; i <= this.data.length; i++) {
        this.tracker = `<button class="box" value="e${i}" id="tracker-e${i}" no="${i}">${i}</button>`
        this.trackers.innerHTML += this.tracker
      }
    }

    async submitAnswers(sub, short, title, text, icon) {
        let ans = [] // ["building", 100001, 23e3]
        for(let i = 1; i <= this.data.length; i++) {
          let value = localStorage.getItem(`e${i}`)
          ans.push(value)
        }
        try {
          const response = await fetch(`markingScript?sub=${sub}&short=${short}`, {
              method: 'POST',
              headers: {
                  'Content-Type': 'application/json',
              },
              body: JSON.stringify({answers: ans})
          });
          
          let status = await response.text()

          if (status == "ok") {
            for(let i = 1; i <= this.data.length; i++) {
              localStorage.removeItem(`e${i}`)
            }
            
            let allChecked = document.querySelectorAll(`.checked`)
            allChecked.forEach(tracker => {
              tracker.classList.remove("checked")
            })
            
            swal({
              title: title,
              text: text,
              icon: icon,
            }).then(() => {
              window.location ="./"
            })
          }
        } catch (err) {
            swal({
              title: "Error",
              text: "An error occurred from our server, hold on and try again.",
              icon: "error",
            })
        }
        
      }

    
  
    generateOptionsHTML() {
        const options = `
        <label for="option1__ques${this.data[this.currentIndex].tid}" class="option lbl__option__1">
            <span id="option1__detail">${this.data[this.currentIndex].opt1}</span> 
            <input type="radio" name="${this.data[this.currentIndex].name}" id="option1__ques${this.data[this.currentIndex].tid}" class="radio__option" value="opt1">
        </label>
        <label for="option2__ques${this.data[this.currentIndex].tid}" class="option" class="option lbl__option__2">
            <span id="option2__detail">${this.data[this.currentIndex].opt2}</span>
            <input type="radio" name="${this.data[this.currentIndex].name}" id="option2__ques${this.data[this.currentIndex].tid}" class="radio__option" value="opt2">
        </label>
        <label for="option3__ques${this.data[this.currentIndex].tid}" class="option" class="option lbl__option__3">
            <span id="option3__detail">${this.data[this.currentIndex].opt3}</span>
            <input type="radio" name="${this.data[this.currentIndex].name}" id="option3__ques${this.data[this.currentIndex].tid}" class="radio__option" value="opt3">
        </label>
        <label for="option4__ques${this.data[this.currentIndex].tid}" class="option" class="option lbl__option__4">
            <span id="optio4__detail">${this.data[this.currentIndex].opt4}</span>
            <input type="radio" name="${this.data[this.currentIndex].name}" id="option4__ques${this.data[this.currentIndex].tid}" class="radio__option" value="opt4">
        </label>
        
        `
    return options
    }



    /*
    
      0
      [1, 2,3 , 4,5, 6]
    */


    getOption(e) {
      let name = e.target.name
      let value = e.target.value   

      this.setValue(name, value)
      let tracker = document.getElementById(`tracker-${name}`)
      tracker.classList.add("checked")
    }
  }
  
  const exam = new ExamQuestions();

  exam.loadQuestions(sub, short);

  const body = document.querySelector("body");
  
  function submitAnswersOnVisibilityChange() {
      body.onkeydown = function () {
          return false
      }
      document.addEventListener("visibilitychange", async function () {
        
          if (document.visibilityState === "hidden") {
              await exam.submitAnswers(sub, short, "Security Error", "You can't access the page anymore, you data has been submitted successfully", "error")
          }
      })
  }
  submitAnswersOnVisibilityChange()

  const submitAnswersWhenTimeEnds =  (minutes) => {
    var finishTime = new Date();
    finishTime.setMinutes(finishTime.getMinutes() + minutes)

    var myFunc = setInterval(async function () {
        var now = new Date().getTime();
        var timeLeft = finishTime - now;
        var minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((timeLeft) % (1000 * 60) / 1000);
        document.getElementById("timer").innerHTML = `${minutes}:${seconds}`
        if (seconds < 10) {
            document.getElementById("timer").innerHTML = `${minutes}:0${seconds}`
        }
        if (timeLeft <= 0 ) {
        clearInterval(myFunc);
            document.getElementById("timer").innerHTML = ""
            await exam.submitAnswers(sub, short, "Hey?", "Time has elasped. Thank you.", "warning")
    }
    }, 1000)
  }

  submitAnswersWhenTimeEnds(<?=$exam_tyme?>)

</script>