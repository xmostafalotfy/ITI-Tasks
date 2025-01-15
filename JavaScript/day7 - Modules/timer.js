let timer = null;
let timeLeft = 30;

export function startTimer(callback) {
    stopTimer();
    timeLeft = 30;
    document.getElementById("timer").innerText = `Time left: ${timeLeft} seconds`;

    timer = setInterval(() => {
        timeLeft--;
        document.getElementById("timer").innerText = `Time left: ${timeLeft} seconds`;

        if (timeLeft === 0) {
            clearInterval(timer);
            callback();
        }
    }, 1000);
}

export function stopTimer() {
    if (timer) clearInterval(timer);
}
