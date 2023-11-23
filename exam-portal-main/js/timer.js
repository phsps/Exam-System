let startTimeString = Date.parse("November 23, 2023 12  :20:00")
let finishTimeString = Date.parse("November 23, 2023 16:50:00");




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

let startBtn = document.getElementById("check_start")

let sub = startBtn.getAttribute("sub")
let short = startBtn.getAttribute("short")
startBtn.addEventListener("click", () => {
    checkCanStart(sub, short)
})