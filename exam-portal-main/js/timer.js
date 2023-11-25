let startTimeString = Date.parse("November 25, 2023 13:20:00")
let finishTimeString = Date.parse("November 25, 2023 16:50:00");




let startTime = new Date(startTimeString).getTime()
let finishTime = new Date(finishTimeString).getTime()




const checkCanStart = (sub, short) => {
    let now = new Date().getTime()
    if (startTime <= now && now <= finishTime) {
        window.location.href = `exam.html?sub=${sub}&short=${short}`;
    } else if (now < startTime) {
        swal({
            title: "Exam error",
            text: "Sorry, the page you requested isn't accessible at this time. Please try again later.",
            icon: "error",
        });
    } else if (now > finishTime) {
        swal({
            title: "Exam error",
            text: "Sorry, the exam has already ended.",
            icon: "error",
        });
    } else {
        swal({
            title: "Error",
            text: "An error occurred from our server, please try again later.",
            icon: "error",
        });
    }
}

let startBtns = document.querySelectorAll("#check_start")



startBtns.forEach(startBtn => {
    startBtn.addEventListener("click", () => {

        let sub = startBtn.getAttribute("sub")
        let short = startBtn.getAttribute("short")

        checkCanStart(sub, short)
    })
})
